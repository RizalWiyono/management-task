<?php
    include '../../../src/connection/connection.php';
    function rupiah($angka){
	
      $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
      return $hasil_rupiah;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>User || Boards</title>

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
            <a class="nav-link d-flex align-items-center" href="../home">
              <span class="mr-3" data-feather="home"></span>
              Home
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link active d-flex align-items-center" href="#">
              <span class="mr-3" data-feather="bar-chart-2"></span>
              Boards
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
        <h1 class="h2">Boards</h1>
      </div>
      <?php
        $no = 1;
        $queryTask  = mysqli_query($connect, "SELECT * FROM tb_boards INNER JOIN tb_client ON tb_boards.idclient = tb_client.idclient WHERE tb_boards.status!='Draft'");
        while($row = mysqli_fetch_array($queryTask)){?>
        <div class="card-task d-block p-4 mb-3">
          <div class="component-left-decoration" style="background: #ED3C3C;">
            
          </div>
          <div class="component-right-decoration" style="background: linear-gradient(151deg, rgba(255, 0, 0, 0.4) 7.37%, rgba(255, 110, 48, 0.4) 41.97%, rgba(255, 240, 105, 0.4) 71.76%);">
            
          </div>
          
          <div class="d-flex align-items-center justify-content-between" style="width: 100%;">
            <div class="left-side-card">
              <h1>
              <?=$row['title']?>
              </h1>
              <h3 style='margin: 0; color: #FFF069;'><?=$row['status']?></h3>
              <div>
                <a href="../task?id=<?=$row['idboards']?>">
                  <button class="px-2 py-1 mt-2" style="background: #FF7F3F; border-radius: 8px; border: 0; color: #FFF; font-weight: 600;">See Task</button>
                </a>
                <button data-toggle="modal" data-target="#detailClient<?=$row['idboards']?>" class="px-2 py-1" style="background: #FF7F3F; border-radius: 8px; border: 0; color: #FFF; font-weight: 600;">Detail Owner</button>
              </div>

              <!-- Modal -->
              <div class="modal fade" id="detailClient<?=$row['idboards']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Detail Owner Product "<?=$row['title']?>"</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <div class="d-flex justify-content-between">
                        <p>Owner</p>
                        <p><?=$row['owner_name']?></p>
                      </div>
                      <div class="d-flex justify-content-between">
                        <p>Company</p>
                        <p><?=$row['company_name']?></p>
                      </div>
                      <div class="d-flex justify-content-between">
                        <p>Address</p>
                        <p><?=$row['address']?></p>
                      </div>
                      <div class="d-flex justify-content-between">
                        <p>No. Telp</p>
                        <p><?=$row['no_telp']?></p>
                      </div>
                      <div class="d-flex justify-content-between">
                        <p>Email</p>
                        <p><?=$row['email']?></p>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="center-side-card d-flex">
              <div class="component" style="text-align: left;">
                  <h2>Description</h2>
                  <span style="color: #548CFF;"><?=$row['description']?></span>
              </div>
            </div>
            <div class="d-flex right-side-card">
              <div class="component ml-4" style="text-align: left;">
                <h2>Startdate</h2>
                <span style="color: #E3C629;"><?=$row['start_date']?></span>
              </div>
              <div class="component ml-4" style="text-align: left;">
                <h2>Deadline</h2>
                <span style="color: #F33838;"><?=$row['deadline']?></span>
              </div>
            </div>
          </div>
          <div class="d-flex align-items-center justify-content-between" style="width: 100%;">
            <div class="left-side-card">
              <h3 style='float: left; margin: 0; color: transparent;'><?=$row['status']?></h3>
            </div>
            <div class="d-flex right-side-card">
              <div class="component ml-4" style="text-align: left;">
                <h2 style="color: transparent;">Pay Status</h2>
                <span style="color: transparent;"><?=$row['pay_status']?></span>
              </div>
              <div class="component ml-4" style="text-align: left;">
                <h2>Pay Status</h2>
                <span style="color: #548CFF;"><?=$row['pay_status']?></span>
              </div>
              <div class="component ml-4" style="text-align: left;">
                <h2>Price</h2>
                <span style="color: #548CFF;"><?=rupiah($row['project_price'])?></span>
              </div>
            </div>
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