<?php
session_start();
 if(!isset($_SESSION['login']) || !$_SESSION['login']==1){
   header('Location:login.php');
 }
 $id = $_SESSION['user_id']; 
 include('db/connect.php');
 $query = "SELECT * FROM users WHERE id='$id'";
$result = mysqli_query($conn,$query);
$data = mysqli_fetch_assoc($result);

$goalQuery="SELECT * FROM goal WHERE user_id = '$id'";
$goalResult = mysqli_query($conn , $goalQuery);


?>
<!DOCTYPE html>
<html>

<head>
    <title>Goals</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style/goal.css">
</head>

<body style="height:600px">
    <div class="overlay"></div>
    <!-- this is navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="home.php">Home</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link  active" aria-current="page" href="goal.php">Goals</a>
                    </li>



                </ul>
                <form class="d-flex" action="db/logout.php">

                    <button class="btn btn-outline-danger" type="submit">logout</button>
                </form>
            </div>
        </div>
    </nav>
    <!-- navbar end -->
    <div class="container">
        <div class="row d-flex justify-content-center">

            <div class="col-md-8">
                <table class="table">
                    <th>Goal Title</th>
                    <th>Description</th>
                    <th>Goal Accomplish Date</th>
                    <th>Status</th>
                    <th>Action</th>
                    <?php while($row = mysqli_fetch_assoc($goalResult)){ ?>
                    <tr>
                        <td><?php echo $row['goalTitle']; ?></td>
                        <td><?php echo $row['description']; ?></td>
                        <td><?php echo $row['goalAccomplishDate']; ?></td>
                        <td><?php echo $row['status']; ?></td>
                        <td>
                            <a onclick="deleteConfirmation(<?php echo $row['id']; ?>)">
                                <i class="fas fa-trash-alt" style="color:red;"></i>
                            </a>|
                            <a href="update.php?id= <?php echo $row['id'] ?>">
                                <i class="fa-solid fa-pen-to-square" style="color:blue"></i>
                            </a>
                        </td>
                    </tr>

                    <?php } ?>

                </table>
            </div>
        </div>
    </div>



</body>
<!-- jquery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<!-- bootstrap js -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
</script>
<!-- fontawesome -->
<script src="https://kit.fontawesome.com/6f38b1151d.js" crossorigin="anonymous"></script>
<!-- bootbox cdn -->
<script src="js/bootbox.min.js"></script>

<script>
function deleteConfirmation(id) {
    bootbox.confirm({
        closeButton: false,
        message: "Are you sure",
        buttons: {
            confirm: {
                label: 'Yes',
                className: 'btn-success'
            },
            cancel: {
                label: 'No',
                className: 'btn-danger'
            }
        },
        callback: function(result) {
            if (result) {
                //delete code

                window.location = 'db/delete.php?id=' + id;
            }

        }
    });

}
</script>

</html>