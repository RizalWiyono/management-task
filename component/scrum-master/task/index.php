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

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4" style="height: 100vh;">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Task Boards</h1>
        <a href="../taskValidation/?id=<?=$_GET['id']?>">
          <button class="ml-4" style="background: #FF7F3F; border: 0; border-radius: 10px; z-index: 2;">Task Validation</button>
        </a>
      </div>
      <?php
        $no = 1;
        $queryTask  = mysqli_query($connect, "SELECT * FROM tb_task INNER JOIN tb_priority_master ON tb_task.idpriority = tb_priority_master.idpriority WHERE idboards=$idboards");
        while($row = mysqli_fetch_array($queryTask)){?>
        <div class="card-task p-4 mt-2">
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

          <div class="d-flex">
            <div class="component">
              <h2>Member</h2>
              <div class="d-flex align-items-center">
                <button type="button" style="background-color: transparent; border: 0; outline: none;" data-toggle="modal" data-target="#modalAssigne<?=$row['idtask']?>">
                  <svg data-toggle="modal" data-target="#doing<?=$rowDoing["idlistTask"]?>" width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M6.99984 7.00033H4.6665M6.99984 4.66699V7.00033V4.66699ZM6.99984 7.00033V9.33366V7.00033ZM6.99984 7.00033H9.33317H6.99984Z" stroke="#CDCDCD" stroke-linecap="round"/>
                      <path d="M6.99984 12.8337C10.2215 12.8337 12.8332 10.222 12.8332 7.00033C12.8332 3.77866 10.2215 1.16699 6.99984 1.16699C3.77818 1.16699 1.1665 3.77866 1.1665 7.00033C1.1665 10.222 3.77818 12.8337 6.99984 12.8337Z" stroke="#CDCDCD"/>
                  </svg>
                </button>
                <?php
                $no = 1;
                $idTask = $row['idtask'];
                $queryContributon  = mysqli_query($connect, "SELECT * FROM tb_contribution INNER JOIN tb_account ON tb_contribution.idaccount = tb_account.idaccount WHERE idtask = $idTask;");
                while($rowContributon = mysqli_fetch_array($queryContributon)){?>
                <div class="mr-2">
                  <img data-toggle="tooltip" data-placement="left" data-html="true" title="<em><?=$rowContributon['name']?></em>"
                  style="
                  width: 14px;
                  height: 14px;
                  object-fit: cover;
                  border-radius: 100px;" src="https://upload.wikimedia.org/wikipedia/commons/thumb/4/48/No_image_%28male%29.svg/450px-No_image_%28male%29.svg.png" alt="" srcset="">
                </div>
                <?php } ?>
              </div>
            </div>
          </div>

          <!-- Modal -->
          <div class="modal fade" id="modalAssigne<?=$row['idtask']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form action="fetch/addMember.php" method="POST">
                    <?php
                    $no = 1;
                    $queryEmployee  = mysqli_query($connect, "SELECT * FROM tb_account WHERE idorganization=$idOrganization AND role!='Admin'");
                    $no = 0;
                    while($rowEmployee = mysqli_fetch_array($queryEmployee)){?>
                      <label for="contribution<?=$rowEmployee['idaccount']?>" class="d-flex align-items-center">
                        <input type="checkbox" id="contribution<?=$rowEmployee['idaccount']?>" value="<?=$rowEmployee['idaccount']?>" name="idaccount[<?=$no?>]" class="mr-2">
                        <img data-toggle="tooltip" data-placement="top" data-html="true" title="<em><?=$rowEmployee['name']?></em>"
                        style="
                        width: 25px;
                        height: 25px;
                        object-fit: cover;
                        border-radius: 100px;" src="https://upload.wikimedia.org/wikipedia/commons/thumb/4/48/No_image_%28male%29.svg/450px-No_image_%28male%29.svg.png" alt="" srcset="">
                        <span class="ml-2"><?=$rowEmployee['name']?></span>
                      </label>
                    <?php $no++; } ?>

                    <input type="hidden" value="<?=$idTask?>" name="idtask">
                    <input type="hidden" value="<?=$_GET['id']?>" name="idpage">

                    <button type="submit" class="btn btn-primary mt-4">Tambahkan</button>
                  </form>
                </div>
              </div>
            </div>
          </div>

          <div class="d-flex right-side-car">
            <div class="component">
              <h2>Startdate</h2>
              <span style="color: #548CFF;"><?=$row['start_date']?></span>
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
            <?php if($row['status'] === 'Date Extention'){
              echo '<button class="ml-4 btn-warning" data-toggle="modal" data-target="#updateDate'.$row['idtask'].'" style="border: 0; border-radius: 10px; z-index: 2;">Update Date</button>';
            } ?>
          </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="updateDate<?=$row['idtask']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Date</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form action="fetch/updateDate.php" method="POST">
                <input type="hidden" name="idboards" class="form-control" value="<?=$idboards?>">
                <input type="hidden" name="id" class="form-control" value="<?=$row['idtask']?>">
                <div class="modal-body">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="exampleInputEmail1">Plan Date</label>
                            <input type="date" name="plan_date" class="form-control" id="exampleFormControlInput1" placeholder="Title task here...">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="exampleInputEmail1">End Date</label>
                            <input type="date" name="end_date" class="form-control" id="exampleFormControlInput1" placeholder="Title task here...">
                          </div>
                        </div>
                      </div>
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
              <textarea name="desc" id="" class="form-control" rows="3"></textarea>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Plan Date</label>
                      <input type="date" name="startdate" class="form-control" id="exampleFormControlInput1" value="<?=date("Y-m-d")?>" readonly placeholder="Title task here...">
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
            <!-- <div class="row">
              <div class="col-md-12">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Plan Date</label>
                      <input type="date" name="plan_date" class="form-control" id="exampleFormControlInput1" placeholder="Title task here...">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="exampleInputEmail1">End Date</label>
                      <input type="date" name="end_date" class="form-control" id="exampleFormControlInput1" placeholder="Title task here...">
                    </div>
                  </div>
                </div>
              </div>
            </div> -->
            <div class="form-group">
              <label for="exampleInputEmail1">Priority</label>
              <div class="d-flex">
                <?php $queryPriority  = mysqli_query($connect, "SELECT * FROM `tb_priority_master`");
                while($row = mysqli_fetch_array($queryPriority)){ ?>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="type_priority" id="<?=$row['idpriority']?>" value="<?=$row['idpriority']?>">
                    <label class="form-check-label" for="<?=$row['idpriority']?>"><?=$row['priority']?></label>
                  </div>
                <?php } ?>
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
            <div class="form-group">
              <label for="exampleInputEmail1">Use Flow Task</label>
              <div class="custom-control custom-switch">
                <input type="checkbox" onclick="flow_task_done(this)" name="flowTask" class="custom-control-input" id="customSwitch1">
                <label class="custom-control-label" for="customSwitch1">Flow Task</label>
              </div>
              <textarea style="display: none;" name="flow_arr" id="area_task" cols="30" rows="10"></textarea>
              <select class="form-control mt-3" id="select_flow" style="display: none;" onchange="addFlow(this)">
                <?php 
                $id = $_GET['id'];
                $queryTask  = mysqli_query($connect, "SELECT * FROM `tb_task` WHERE idboards = $id");
                while($row = mysqli_fetch_array($queryTask)){ ?>
                  <option value="<?=$row['idtask']?>"><?=$row['title']?></option>
                <?php } ?>
              </select>
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