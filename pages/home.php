<?php
session_start();
if (isset($_SESSION['username']) && $_SESSION['username'] != "") {
} else {
    header("Location:../index.php");
}
$username = $_SESSION['username'];
$userid = $_SESSION['user_Id'];

?>
<html>

<head>
    <title></title>

    <!--Custom CSS-->
    <link rel="stylesheet" type="text/css" href="../css/global.css">
    <!--Bootstrap CSS-->
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
    <!--Script-->
    <script src="../js/jquery.js"></script>
    <script src="../js/jquery.min.js"></script>
    <script src="..js/bootstrap.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</head>

<body>
    <!-- Navigation -->
    <nav class="navbar  myNav">
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








    <div class="container">
        <h4>Latest Discussion</h4>
        <div class="container">
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#form">
                Add post
            </button>
        </div>
        <hr>
        <?php include "../functions/db.php";

        $sel = $con->prepare("SELECT * from category");
        $sel->execute();
        $sel->setFetchMode(PDO::FETCH_ASSOC);
        while ($row = $sel->fetch()) {
            extract($row);
            echo '<div class="panel panel-primary">
                    <div class="panel-heading">
                    <h3 class="panel-title">' . $category . '</h3>
                    </div> 
                    <div class="panel-body">
                    <table class="table table-stripped">
                    <tr>
                    <th>Post Title</th>
                    <th>Posted On</th>
                    <th></th>
                    </tr>';
            $sel1 = $con->prepare("SELECT * from tblpost where cat_id=:cat_id ");
            $sel1->bindParam(":cat_id", $cat_id);
            $sel1->execute();
            $sel1->setFetchMode(PDO::FETCH_ASSOC);
            while ($row1 = $sel1->fetch()) {
                extract($row1);
                echo '<tr>';
                echo '<td>' . $title . '</td>';
                echo '<td>' . $datetime . '</td>';
                echo '<td><a href="content.php?post_id=' . $post_Id . '"><button class="btn btn-success">Read</button></td>';
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
                        <h2 class="modal-title" id="exampleModalLabel"><b>Start a new Discussion </b> </h2>
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