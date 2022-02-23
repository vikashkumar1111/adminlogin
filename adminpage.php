<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header('location:login.php');
}


$search = isset($_GET['search']) ? $_GET['search'] : "";

?>
<?php
              $order = isset($_GET['o']) ? $_GET['o'] : "";
              $field = isset($_GET['f']) ? $_GET['f'] : "";
              if ($order == "asc") {
                $order = "desc";
              } else if ($order == "desc") {
                $order = "asc";
              } else {

                $order = "asc";
                $field = "id";
              }
                ?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

    <link rel="stylesheet" href="style.css">

    <style>
        /* #admin{
            background-color: red ;
            width: 50%;
        } */
        .cd {
            /* overflow: scroll; */
            width: min-content;
            /* margin-left: -50px;
            margin-right: -120px; */
            margin-bottom: 250px;
            margin-top: 0px;
        }

        .search {
            width: 20rem;
            margin-top: 2rem;
            margin-bottom: 4px;
        }
    </style>

    <title>Admin page</title>
</head>

<body>
    <div class="nan">
        <nav class="navbar navbar-expand-lg text-white bg-dark">
            <a class="img" href="#">
                <img src="BL_logo.jpg" width="250" height="40" alt="logo">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse col-6" id="navbarNavAltMarkup">
                <div class="navbar-nav nav ">
                    <a class="nav-item nav-link active nav-items-c" href="#">Home <span class="sr-only">(current)</span></a>
                    <a class="nav-item nav-link active nav-items-c" href="#">About us <span class="sr-only">(current)</span></a>
                    <a class="nav-item nav-link active nav-items-c" href="#">Services <span class="sr-only">(current)</span></a>
                    <a class="nav-item nav-link active nav-items-c" href="#">Blog <span class="sr-only">(current)</span></a>
                    <a class="nav-item nav-link active nav-items-c" href="contact.php">Contact <span class="sr-only">(current)</span></a>

                </div>

                <div class="logout"><a href="logout.php"> <i class="bi bi-box-arrow-right"></i>Lougout</a></div>
            </div>
        </nav>
    </div>
    <div class="container">
        <div class="search">
        <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" method= GET>
            <div class="input-group">
                <input type="text" value="<?php echo $search; ?>" name="search" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="submit">
                        <i class="fas fa-search fa-sm"></i>
                    </button>
                </div>
            </div>
        </form>
        </div>
        <!-- search -->
        

        <div class="card cd">

            <div class="card-title d-flex bg-dark " style="width: 100%;">
                <button class="btn btn-success " id="admin"><?php echo $_SESSION['admin']; ?></button>
                <b class="text-primary">Contact Details:) </b>
            </div>
            <table class="table table-striped text-center">
                <thead>
                    <tr>
                    <th scope="col">Id<a href="adminpage.php?o=<?php echo $order; ?>&f=id"><i class="fa fa-sort"></i></a></th>
                        <th scope="col">Name<a href="adminpage.php?o=<?php echo $order; ?>&f=Name"><i class="fa fa-sort"></i></a></th>
                        <th scope="col">Email<a href="adminpage.php?o=<?php echo $order; ?>&f=email"><i class="fa fa-sort"></i></a></th>
                        <th scope="col">Phone</th>
                        <th scope="col">Subject</th>
                        <th scope="col">image</th>
                        <th scope="col">Message</th>
                        <th scope="col" colspan="6">Action</th>
                    </tr>
                </thead>
                <?php
                include "db.php";

                $pageno=isset($_GET['pageno'])?$_GET['pageno']:1;

                $sq = "select * from contact where name like '%$search%' or email like '%$search%' order by " . $field . " " . $order . "";
                $que = mysqli_query($conn, $sq);
                $count = mysqli_num_rows($que);
                //echo $count;

                $total = 2;
                $totalpage=ceil($count/2) ;
                //echo $totalpage;
                $start=($pageno-1)*$total;
               //echo $start;
               // exit;
                $sql = "select * from contact where name like '%$search%' or email like '%$search%' order by " . $field . " " . $order . " limit $start,".$total;
               // echo $sql;
                $qu = mysqli_query($conn, $sql);
                $count = mysqli_num_rows($qu);
                if ($count > 0) {










                ?>
                    <tbody>
                        <tr>
                            <?php
                            while ($row = mysqli_fetch_assoc($qu)) {
                            ?>
                                <th scope="row"><?php echo $row['id'] ?></th>
                                <td><?php echo $row['name'] ?> </td>
                                <td><?php echo $row['email'] ?></td>
                                <td><?php echo $row['phone'] ?></td>
                                <td><?php echo $row['subject'] ?></td>
                                <td>
                                    <image src="<?php echo $row['image'] ?>" alt="img" height="60px" width="60px">
                                </td>
                                <td><?php echo $row['message'] ?></td>
                                <td class="text"> <button class="btn btn-primary"> <a href="mailto:<?php echo $row['email'] ?>" class="text-white ">Send email</a></button></td>

                        </tr>
                    <?php
                            }

                    ?>


                    </tbody>
                <?php
                }
                ?>
            </table>
            <div> <ul class="pagination">
    <?php


for($i=1; $i<=$totalpage; $i++){

    $class="";
    if($pageno==$i){
        $class="active";
    }

    if($i==1){
        ?>

        <li class="page-item <?php echo $class; ?>"><a class="page-link <?php echo $class; ?>" href="adminpage.php?pageno=<?Php echo $i;?>">First</a></li>
        <?php
    
    }
    elseif($i==$totalpage){
        ?>
        <li class="page-item <?php echo $class; ?>"><a class="page-link <?php echo $class; ?>" href="adminpage.php?pageno=<?Php echo $i;?>">Last</a></li>
        <?php
    }
    else{
     
    
?>

<li class="page-item <?php echo $class; ?>"><a class="page-link <?php echo $class; ?>" href="adminpage.php?pageno=<?Php echo $i;?>"><?Php echo $i;?></a></li>
<?php
}
}

?>
<!--    <li class="page-item"><a class="page-link" href="#">Previous</a></li>
    <li class="page-item"><a class="page-link" href="#">1</a></li>
    <li class="page-item active"><a class="page-link" href="#">2</a></li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item"><a class="page-link" href="#">Next</a></li>
-->
  </ul></div>
        </div>





    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


</body>

</html>