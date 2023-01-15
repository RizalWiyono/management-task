<?php
    include '../../../src/connection/connection.php';
    session_start();
    $idOrganization = $_SESSION['idorganization'];
    $idboards = $_GET['id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>SM || Task Validation</title>

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
          <li class="nav-item">
            <a class="nav-link active d-flex align-items-center" href="../boards">
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
          <!-- <li class="nav-item">
            <a class="nav-link d-flex align-items-center" href="../note/">
              <span class="mr-3" data-feather="file"></span>
              Note
            </a>
          </li> -->
        </ul>
      </div>
    </nav>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4" style="height: 100vh;">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Task Validation Boards</h1>
        <a href="../task/?id=<?=$_GET['id']?>">
          <button class="ml-4" style="background: #FF7F3F; border: 0; border-radius: 10px; z-index: 2;">Back</button>
        </a>
      </div>
      <div class="row">
      <?php
        $queryTaskContrib  = mysqli_query($connect, "SELECT * FROM tb_task INNER JOIN tb_contribution ON tb_task.idtask = tb_contribution.idtask INNER JOIN tb_account ON tb_account.idaccount=tb_contribution.idaccount INNER JOIN tb_value ON tb_value.idtask = tb_task.idtask WHERE tb_task.status='Verification' AND idboards=$idboards");
        while($row = mysqli_fetch_array($queryTaskContrib)){?>
        <div class="col-md-4">
          <div class="col-md-12" style="padding: 0;">
            <div class="card" style="border: 0; border-radius: 20px;">
              <div class="card-body" style="background-color: #242424; border-radius: 10px;">
                <h5 class="card-title"><?=$row['title']?></h5>
                <span class="badge badge-info mb-2"><?=$row['name']?></span>
                <p class="card-text"><?=$row['description']?></p>
                <?php
                echo '<form action="fetch/validationTask.php" method="post" style="z-index: 2;">
                  <input type="hidden" value="'.$idboards.'" name="paramId">
                  <input type="hidden" value="'.$row['idaccount'].'" name="paramIdAccount">
                  <input type="hidden" value="'.$row['idtask'].'" name="param">
                  <input type="hidden" value="'.$row['type_value'].'" name="paramTypeValue">
                  <input type="hidden" value="'.$row['value'].'" name="paramValue">
                  <input type="hidden" value="'.$row['idvalue'].'" name="paramValueId">
                  <button type="submit" style="background: #38F378; border: 0; padding: 6px 12px; border-radius: 10px; z-index: 2; height: 100%;">Done</button>
                </form>';
                ?>
              </div>
            </div>
          </div>
        </div>
      <?php } ?>
      </div>
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
  function flow_task_done(evt) {
    var checkBox = document.getElementById('customSwitch1');
    if(checkBox.checked === true) {
      document.getElementById('select_flow').style.display = 'block'
    }else{
      document.getElementById('select_flow').style.display = 'none'
    }
  }

  function addFlow(evt) {
    const taskOld = document.getElementById('area_task').value
    var array = JSON.parse("[" + taskOld + "]");
    array.push(evt.value)
    document.getElementById('area_task').value = array
    const task = document.getElementById('area_task').value
  }

  $(function () {
    $('[data-toggle="tooltip"]').tooltip()
  })

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