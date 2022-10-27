<?php
    include '../../../src/connection/connection.php';
    $idboards = $_GET['id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>SM || Task</title>

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
            <a class="nav-link" href="#">
              <span data-feather="home"></span>
              Home
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="#">
              <span data-feather="bar-chart-2"></span>
              Boards
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file"></span>
              Note
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
        $queryTask  = mysqli_query($connect, "SELECT * FROM tb_task WHERE idboards=$idboards");
        while($row = mysqli_fetch_array($queryTask)){?>
        <div class="card-task p-4">
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
              if($row['point'] !== 0){
                echo "<h3 style='float: left; margin: 0;'>".$row['point']."</h3><h2 style='float: left; margin: 0; margin-top: 12px; margin-left: 5px;'>Point</h2>";
              }elseif($row['salary'] !== 'Medium'){
                echo "<h3 style='float: left; margin: 0;'>".$row['salary']."</h3><h2 style='float: left; margin: 0; margin-top: 12px; margin-left: 5px;'>.00</h2>";
              }else{}
              ?>
            </div>
          </div>
          <div class="d-flex right-side-car">
            <div class="component">
              <h2>Startdate</h2>
              <span style="color: #548CFF;"><?=$row['startdate']?></span>
            </div>
            <div class="ml-4 component">
              <h2>Deadline</h2>
              <span style="color: #F33838 !important;"><?=$row['deadline']?></span>
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
            if($row['status'] === 'Publish'){
              echo '<button class="ml-4" style="background: #FF7F3F; border: 0; border-radius: 10px; z-index: 2;">Progress</button>';
            }elseif($row['status'] === 'Verification'){
              echo '<button class="ml-4" style="background: #38F378; border: 0; border-radius: 10px; z-index: 2;">Done</button>';
            }
            ?>
          </div>
        </div>
      <?php $no++;
      } ?> 
    </main>

    <button type="button" data-toggle="modal" data-target="#exampleModal" class="btn-linear-primary p-2 btn-fixed-bottom" >+ New task</button>
    
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">New task</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="fetch/inputData.php" method="POST">
          <input type="hidden" name="idboards" class="form-control" value="<?=$idboards?>">
          <div class="modal-body">
            <div class="form-group">
              <label for="exampleInputEmail1">Title</label>
              <input type="text" name="title" class="form-control" id="exampleFormControlInput1" placeholder="Title task here...">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Description</label>
              <textarea name="desc" id="" class="form-control" rows="3">Task description here...
              </textarea>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Startdate</label>
                      <input type="date" name="startdate" class="form-control" id="exampleFormControlInput1" placeholder="Title task here...">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Deadline</label>
                      <input type="date" name="deadline" class="form-control" id="exampleFormControlInput1" placeholder="Title task here...">
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Priority</label>
              <div class="d-flex">
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="type_priority" id="inlineRadio1" value="Low">
                  <label class="form-check-label" for="inlineRadio1">Low</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="type_priority" id="inlineRadio2" value="Medium">
                  <label class="form-check-label" for="inlineRadio2">Medium</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="type_priority" id="inlineRadio3" value="Hard">
                  <label class="form-check-label" for="inlineRadio3">Hard</label>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Value</label>
              <div class="d-flex">
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="type_value" onchange="handleChange(this);" id="inlineRadio4" value="None">
                  <label class="form-check-label" for="inlineRadio4">None</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="type_value" onchange="handleChange(this);" id="inlineRadio5" value="Point">
                  <label class="form-check-label" for="inlineRadio5">Point</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="type_value" onchange="handleChange(this);" id="inlineRadio6" value="Salary">
                  <label class="form-check-label" for="inlineRadio6">Salary</label>
                </div>
              </div>
              <div class="form-group mt-2" style="display: none;" id="inp_point">
                <input type="number" name="point_value" class="form-control" id="exampleFormControlInput1">
              </div>
              <div class="form-group mt-2" style="display: none;" id="inp_salary">
                <input type="number" name="salary_value" class="form-control" id="exampleFormControlInput1">
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
          </div>
          </form>
        </div>
      </div>
    </div>
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