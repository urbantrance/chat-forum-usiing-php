<?php
session_start();
if (isset($_SESSION['username'])&&$_SESSION['username']!=""){
}
else
{
    header("Location:../index.php");
}
$username=$_SESSION['username'];
$userid = $_SESSION['user_Id'];
$_SESSION['pchatstate']=0;

?>
<html>
<head>
    <title></title>

    <!--Custom CSS-->
    <link rel="stylesheet" type="text/css" href="../css/global.css">
    <!--Bootstrap CSS-->
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">

    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
    <!--Script-->
    <script src="../js/jquery.js"></script>
    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script>
        function add()
        {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("chat").innerHTML = document.getElementById("chat").innerHTML + this.responseText;
                }
            };
            xhttp.open("GET", "../functions/recipient.php", true);
            xhttp.send();
        }
    </script>
    <script>
        function send_recipient(str) {
            /*console.log("xxx");
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    window.location.href=this.responseText;
                }
            };
            xhttp.open("GET", "../functions/pindex.php?recipient="+str, true);
            xhttp.send();*/
            $.ajax({
                type: 'POST',
                url: '../functions/pindex.php',
                data: {recipient : str},
                success: function() {
                    window.location="../functions/pindex.php";
                }
            });
        }
    </script>
</head>
<body>
<!-- Navigation -->
    <nav class="navbar myNav">
        <div class="container-fluid">

            <!-- Brand/logo -->
            <div class="navbar-header ">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#example-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="home.php">Chat room</a>
            </div>

            <!-- Collapsible Navbar -->
            <div class="collapse navbar-collapse " id="example-1">
                <ul class="nav navbar-nav navbar-left">
                    <li><a href="#form" data-toggle="modal" data-target="#form"> Post a Question</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="profile.php"><span class="glyphicon glyphicon-user"></span> <?php echo $username; ?></a></li>
                    <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>

                </ul>

            </div>

        </div>
    </nav>
<div class="container" >
    <?php include "../functions/db.php";

    $query = $con->prepare("SELECT * from tbluser WHERE user_Id=:user_Id");
    $query->bindParam(":user_Id", $userid);
    $query->execute();
    $result = $query->fetch();
        extract($result);
    echo "<h3>Personal Info</h3><br>";
    echo "<h4><b>Name :&nbsp</b></h4>".$fname."&nbsp".$lname;
    echo "<h4><b>Gender :&nbsp</b></h4>".$gender;
    $query1 = $con->prepare("SELECT count(post_Id) as `no_posts` from tblpost WHERE user_Id=:user_Id");
    $query1->bindParam(":user_Id", $userid);
    $query1->execute();
    $result1 = $query1->fetch();
    echo "<h4><b>Total posts :&nbsp</b></h4>".strval($result1['no_posts']);
    $query2 = $con->prepare("SELECT count(post_Id) as `no_posts_liked` from tbllikepost WHERE user_Id=:user_Id");
    $query2->bindParam(":user_Id", $userid);
    $query2->execute();
    $result2 = $query2->fetch();
    echo "<h4><b>Total posts liked :&nbsp</b></h4>".strval($result2['no_posts_liked']);
    $query3 = $con->prepare("SELECT count(*) as `no_comments_liked` from tbllikecomment WHERE user_Id=:user_Id");
    $query3->bindParam(":user_Id", $userid);
    $query3->execute();
    $result3 = $query3->fetch();
    echo "<h4><b>Total comments liked :&nbsp</b></h4>".strval($result3['no_comments_liked']);
    ?>
</div>
<div class="container" style="margin:7% auto;">
    <h4>Your Posts</h4>
    <hr>
    <?php  include "../functions/db.php";

    $sel = $con->prepare("SELECT * from category");
    $sel->execute();
    $sel->setFetchMode(PDO::FETCH_ASSOC);
    while($row=$sel->fetch()){
        extract($row);
        echo '<div class="panel panel-primary">
                    <div class="panel-heading">
                    <h3 class="panel-title">'.$category.'</h3>
                    </div> 
                    <div class="panel-body">
                    <table class="table table-stripped">
                    <tr>
                    <th>Topic title</th>
                    <th>Action</th>
                    </tr>';
        $sel1 = $con->prepare("SELECT * from tblpost where cat_id=:cat_id and user_Id=:userid");
        $sel1->bindParam(":cat_id", $cat_id);
        $sel1->bindParam(":userid", $userid);
        $sel1->execute();
        $sel1->setFetchMode(PDO::FETCH_ASSOC);
        while($row1=$sel1->fetch()){
            extract($row1);
            echo '<tr>';
            echo '<td>'.$title.'</td>';
            echo '<td><a href="content.php?post_id='.$post_Id.'"><button class="btn btn-primary">View</button></td>';
            echo '</tr>';
        }


        echo '</table>
                    </div>
                </div>';
    }
    ?>
    <div class="modal fade" id="form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header border-bottom-0">
                        <h5 class="modal-title" id="exampleModalLabel">Start a new Discussion</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="POST" action="question-function.php">
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Category</label>
                                <select name="category" class="form-control">
                                    <option></option>
                                    <?php $sel = $con->prepare("SELECT * from category");
                                    $res = $sel->execute();
                                    $sel->setFetchMode(PDO::FETCH_ASSOC);

                                    if ($res == true) {
                                        while ($row = $sel->fetch()) {
                                            extract($row);
                                            echo '<option value=' . $cat_id . '>' . $category . '</option>';
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Topic Title</label>
                                <input type="text" class="form-control" name="title" required>
                            </div>
                            <div class="form-group">
                                <label>Content</label>
                                <textarea name="content" class="form-control">
                        </textarea>

                            </div>
                            <br>
                            <input type="hidden" name="userid" value=<?php echo $userid; ?>>
                            <small id="" class="form-text text-muted">Please follow community guidelines.</small>
                        </div>
                        <div class="modal-footer border-top-0 d-flex justify-content-center">
                            <a href=""><button type="submit" class="btn btn-success" value="Post">Submit</button></a>
                        </div>
                    </form>
                </div>
            </div>
        </div>


</body>
</html>