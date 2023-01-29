<?php
    include '../../../src/connection/connection.php';
    $idboards = $_GET['id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>User || Task</title>

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
            <a class="nav-link d-flex align-items-center" href="#">
              <span class="mr-3" data-feather="home"></span>
              Home
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link active d-flex align-items-center" href="../boards/">
              <span class="mr-3" data-feather="bar-chart-2"></span>
              Boards
            </a>
          </li>
          <!-- <li class="nav-item">
            <a class="nav-link d-flex align-items-center" href="../note/">
              <span class="mr-3" data-feather="file"></span>
              Note
            </a>
          </li> -->
          <li class="nav-item" style="position: absolute; bottom: 15px;">
            <a class="nav-link d-flex align-items-center" href="../../auth/logout.php">
              Logout
            </a>
          </li>
        </ul>
      </div>
    </nav>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4" style="height: 100vh;">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Task Boards</h1>
      </div>
      <?php
        $no = 1;
        $queryTask  = mysqli_query($connect, "SELECT * FROM tb_task INNER JOIN tb_priority_master ON tb_task.idpriority = tb_priority_master.idpriority WHERE idboards=$idboards");
        while($row = mysqli_fetch_array($queryTask)){?>
        <div class="card-task p-4 mb-3">
          <div class="component-left-decoration">
            
          </div>
          <div class="component-right-decoration">
            
          </div>
          <div class="left-side-car">
            <h1>
            <?=$row['title']?>
            </h1>
            <div class="d-flex align-items-center">
              <?php
              $idTask = $row['idtask'];
              $queryPoint  = mysqli_query($connect, "SELECT * FROM tb_value WHERE idtask=$idTask");
              while($rowPoint = mysqli_fetch_array($queryPoint)){
                if($rowPoint['type_value'] === 'Point'){
                  echo "<h3 style='float: left; margin: 0;'>".$rowPoint['value']."</h3><h2 style='float: left; margin: 0; margin-top: 12px; margin-left: 5px;'>Point</h2>";
                }elseif($rowPoint['type_value'] === 'Salary'){
                  echo "<h3 style='float: left; margin: 0;'>Rp. ".$rowPoint['value']."</h3><h2 style='float: left; margin: 0; margin-top: 12px; margin-left: 5px;'>.00</h2>";
                }else{}
              }
              ?>
            </div>
          </div>
          <div class="d-flex right-side-car align-items-center">
            <div class="component">
              <h2>Startdate</h2>
              <span style="color: #548CFF;"><?=$row['start_date']?></span>
            </div>
            <div class="ml-4 component">
              <?php
              error_reporting(0);
              $date = date("Y-m-d");
              if($date < $row['end_date']){ ?>
              <h2>Deadline</h2>
              <?php }
              $date = date("Y-m-d");
              if($date > $row['deadline'] && $date < $row['end_date']){
                ?> <span style="color: #F33838 !important;"><?=$row['end_date']?></span> <?php
              }else if($date > $row['end_date'] && $date > $row['deadline']){
                ?> <span style="color: #F33838 !important;"></span> <?php
              }else{ 
                ?> <span style="color: #F33838 !important;"><?=$row['deadline']?></span> <?php
              }
              ?>
            </div>
            <div class="ml-4 component">
              <h2>Note</h2>
              <?php
              $date = date("Y-m-d");
              if($date > $row['deadline'] && $date < $row['end_date']){
                ?> <span style="color: #F33838 !important;">Late!</span> <?php
              }else if($date > $row['end_date'] && $date > $row['deadline']){
                ?> <span style="color: #38F378 !important;">Not Active! Confirmation to your PM for give new deadline.</span> <?php
              }else{ 
                ?> <span style="color: #38F378 !important;">Active</span> <?php
              }
              ?>
            </div>
            <div class="ml-4 component">
              <h2>Priority</h2>
              <?php
              if($row['priority'] === 'Low'){
                echo "<span style='color: #38F378;'>Low</span>";
              }elseif($row['priority'] === 'Medium'){
                echo "<span style='color: #E3C629;'>Medium</span>";
              }else{
                echo "<span style='color: #F33838;'>Hard</span>";
              }
              ?>
            </div>
            <?php
            
            $flowCode = $row['flow']-1;
            $flowStatus = 'Done';
            $queryFlowStatus  = mysqli_query($connect, "SELECT * FROM tb_task WHERE flow=$flowCode AND idboards=$idboards");
            $no = 0;
            while($rowFlowStatus = mysqli_fetch_array($queryFlowStatus)){
              $flowStatus = $rowFlowStatus['status'];
              $titleTask = $rowFlowStatus['title'];
              $no++;
            }
            ?> 

              <?php if(isset($titleTask)) {?>
                <div class="ml-4 component">
                  <h2>Status Previous Tasks</h2>
                    <span style='color: #E3C629;'><?=$titleTask?></span>
                    <?php if($flowStatus === 'Done') { ?>
                      <span >: Done</span>
                    <?php }elseif($flowStatus === 'Date Extention') {?>
                      <span >: Date Extention</span>
                    <?php }else{ ?>
                      <span style='color: #F33838;'>: Not finished yet</span>
                    <?php } ?>
                </div>
              <?php } ?>

            <?php

            $date = date("Y-m-d");
            if($date <= $row['end_date'] ){
              if($row['status'] === 'Publish'){
                if($flowStatus === 'Done'){
                  echo '<form action="fetch/validationTask.php" method="post" style="z-index: 2;">
                    <input type="hidden" value="'.$idboards.'" name="paramId">
                    <input type="hidden" value="'.$row['idtask'].'" name="param">
                    <button type="submit" class="ml-4" style="background: #FF7F3F; border: 0; border-radius: 10px; z-index: 2; height: 100%;">></button>
                  </form>';
                }
              }elseif($row['status'] === 'Verification'){
                echo '<button class="ml-4" style="background: #E3C629; border: 0; border-radius: 10px; z-index: 2; height: 100%;">Validation</button>';
              }elseif($row['status'] === 'Done'){
                echo '<button class="ml-4" style="background: #38F378; border: 0; border-radius: 10px; z-index: 2; height: 100%;">Done</button>';
              }
            }elseif($date > $row['deadline'] && $row['end_date'] === '0000-00-00'){
              if($row['status'] === 'Date Extention') {
                echo '<button class="ml-4 btn-info" style=" border: 0; border-radius: 10px; z-index: 2; height: 100%;">Pending</button>';
              }else{
                echo '<form action="fetch/statusTask.php" method="post" style="z-index: 2;">
                  <input type="hidden" value="'.$idboards.'" name="paramId">
                  <input type="hidden" value="'.$row['idtask'].'" name="param">
                  <button type="submit" class="ml-4 btn-warning" style=" border: 0; border-radius: 10px; z-index: 2; height: 100%;">Date Extention</button>
                </form>';
              }
            }
            ?>
          </div>
        </div>
      <?php $no++;
      } ?> 
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