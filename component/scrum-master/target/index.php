<?php
    include '../../../src/connection/connection.php';
    session_start();
    $idOrganization = $_SESSION['idorganization'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>SM || Target</title>

	<!-- Favicon -->
	<link rel="icon" type="image/x-icon" href="../../../src/images/favicon.png">

	<!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	<!-- Style -->
	<link rel="stylesheet" type="text/css" href="../../../src/css/style.css">
    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/dashboard/">

    <!-- Bootstrap core CSS -->
    <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
    .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }

    @media (min-width: 768px) {
        .bd-placeholder-img-lg {
        font-size: 3.5rem;
        }
    }
    </style>
    <!-- Custom styles for this template -->
    <link href="../../../src/css/dashboard.css" rel="stylesheet">
</head>

<body>
<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block sidebar collapse">
      <div class="sidebar-sticky">
        <h1 class="title-logo mb-4">TaskManager.</h1>
        <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link d-flex align-items-center" href="../home/">
              <span class="mr-3" data-feather="home"></span>
              Home
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link active d-flex align-items-center" href="../target">
              <span class="mr-3" data-feather="users"></span>
              Target
            </a>
          <li class="nav-item">
            <a class="nav-link d-flex align-items-center" href="../boards">
              <span class="mr-3" data-feather="bar-chart-2"></span>
              Boards
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link d-flex align-items-center" href="../send-report/">
              <span class="mr-3" data-feather="send"></span>
              Send Report
            </a>
          </li>
          <li class="nav-item" style="position: absolute; bottom: 15px;">
            <a class="nav-link d-flex align-items-center" href="../../auth/logout.php">
              Logout
            </a>
          </li>
          <!-- <li class="nav-item">
            <a class="nav-link d-flex align-items-center" href="../note/">
              <span class="mr-3" data-feather="file"></span>
              Note
            </a>
          </li> -->
        </ul>
      </div>
    </nav>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Input Employee</h1>
      </div>

      <form action="fetch/addTargetPoint.php" method="POST">
        <div class="row">
          <form action="fetch/addTargetPoint.php" method="post">
            <div class="form-group col-md-4">
              <input type="number" name="point" class="form-control" id="exampleFormControlInput1" placeholder="Target point here..">
            </div>
            <div class="form-group col-md-4">
              <select class="form-control" name="account" id="">
              <?php
              $queryAccount  = mysqli_query($connect, "SELECT * FROM tb_account WHERE idorganization=$idOrganization AND role != 'Admin'");
              while($row = mysqli_fetch_array($queryAccount)){?>
                <option value="<?=$row['idaccount']?>"><?=$row['name']?></option>
              <?php } ?>
              </select>
            </div>
            <div class="form-group col-md-2">
              <input type="month" name="date" class="form-control" id="exampleFormControlInput1">
            </div>
            <div class="form-group col-md-2">
              <button type="submit" class="btn-linear-primary p-2" style="width: 100%;">Daftarkan</button>
            </div>
          </form>
        </div>
      </form>  
      
      <table class="table">
        <thead>
          <tr>
            <th scope="col">No.</th>
            <th scope="col">Name</th>
            <th scope="col">Target Point</th>
            <th scope="col">Date</th>
            <th scope="col">Status</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $no = 1;
          $queryAccount  = mysqli_query($connect, "SELECT * FROM tb_target INNER JOIN tb_account ON tb_target.idaccount = tb_account.idaccount WHERE idorganization=$idOrganization");
          while($row = mysqli_fetch_array($queryAccount)){?>
          <tr>
            <th scope="row"><?=$no?></th>
            <td><?=$row['name']?></td>
            <td><?=$row['total_target']?></td>
            <td><?=$row['date']?></td>
            <td><?=$row['status']?></td>
          </tr>
          <?php $no++;
          } ?> 
        </tbody>
      </table>
    </main>
  </div>
</div>
</body>
</html>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="../assets/js/vendor/jquery.slim.min.js"><\/script>')</script><script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
<script src="../../../src/js/dashboard.js"></script>