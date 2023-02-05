<?php
    include '../../../src/connection/connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>SM || Send Report</title>

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
            <a class="nav-link d-flex align-items-center" href="../target">
              <span class="mr-3" data-feather="users"></span>
              Target Point
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link d-flex align-items-center" href="../boards/">
              <span class="mr-3" data-feather="bar-chart-2"></span>
              Boards
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link active d-flex align-items-center" href="#">
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

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4" style="min-height: 100vh;">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Send Report</h1>
      </div>
      <div class="parent-card-send-report">
        <img src="../../../src/images/assets-1.png" alt="">
        <div class="card-send-report p-4" style="padding-right: 200px !important;">
          <h1>Fill in the email address to send an alert.</h1>
          <form action="fetch/email-script.php" method="post">
            <div class="form-group">
              <label for="exampleInputEmail1">Email address</label>
              <?= error_reporting(0); ?>
              <input readonly type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp" value="<?=$_GET['email']?>">
              <input type="hidden" name="idaccount" value="<?=$_GET['idaccount']?>">
              <input type="hidden" name="date" value="<?=$_GET['date']?>">
              <input type="hidden" name="value" value="<?=$_GET['value']?>">
              <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <button type="submit" data-toggle="modal" data-target="#exampleModal" class="btn-linear-primary p-2" >Send</button>
          </form>
        </div>
      </div>

      <table class="table" style="margin-top: 50px;">
        <thead>
          <tr>
            <th scope="col">No.</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Date</th>
            <th scope="col">Role</th>
            <th scope="col">Type Value</th>
            <th scope="col">Total Value</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $no = 1;
          $queryAccount  = mysqli_query($connect, "SELECT SUM(total_value_earned) as total, tb_wallet.idaccount, idwallet, name, tb_wallet.date, email, type_value, role FROM `tb_wallet` INNER JOIN tb_account ON tb_wallet.idaccount = tb_account.idaccount GROUP BY YEAR(date), MONTH(date), tb_wallet.idaccount");
          while($row = mysqli_fetch_array($queryAccount)){?>
          <tr>
            <th scope="row"><?=$no?></th>
            <td><?=$row['name']?></td>
            <td><?=$row['email']?></td>
            <td><?=$row['date']?></td>
            <td><?=$row['role']?></td>
            <td><?=$row['type_value']?></td>
            <td><?=$row['total']?></td>
            <td>
              <a href="?idaccount=<?=$row['idaccount']?>&&date=<?=$row['date']?>&&email=<?=$row['email']?>&&value=<?=$row['total']?>">
                <button class="btn btn-primary">
                  Send Report
                </button>
              </a>
            </td>
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

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
<script>
  const radioButtons = document.querySelectorAll('input[name="type_value"]');
  if(document.getElementById('inlineRadio5').checked) {
    document.getElementById('inp_point').style.display = 'none'
  }else if(document.getElementById('inlineRadio6').checked) {

  }

  function handleChange(val) {
    if(val.value === 'Point'){
      document.getElementById('inp_point').style.display = 'block'
      document.getElementById('inp_salary').style.display = 'none'
    }else if(val.value === 'Salary'){
      document.getElementById('inp_point').style.display = 'none'
      document.getElementById('inp_salary').style.display = 'block'
    }else{
      document.getElementById('inp_point').style.display = 'none'
      document.getElementById('inp_salary').style.display = 'none'
    }
  }
</script>