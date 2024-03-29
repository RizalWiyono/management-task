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
	<title>SM || Boards</title>

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

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4" style="min-height: 100vh;">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Boards</h1>
      </div>
      <?php
        $no = 1;
        $queryTask  = mysqli_query($connect, "SELECT * FROM tb_boards INNER JOIN tb_client ON tb_boards.idclient = tb_client.idclient");
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
                <a href="../gantt-chart?id=<?=$row['idboards']?>">
                  <button class="px-2 py-1 btn-info" type="submit" style="border-radius: 8px; border: 0; color: #FFF; font-weight: 600;">Gantt Chart</button>
                </a>
              </div>
              <?php if($row['status'] !== 'Done') { ?>
                <form action="fetch/statusBoards.php" method="post">
                  <input type="hidden" name="id" value="<?=$row['idboards']?>">
                  <button class="px-2 py-1 btn-success" type="submit" style="position: absolute; bottom: 15%; border-radius: 8px; border: 0; color: #FFF; font-weight: 600;">Done</button>
                </form>
              <?php } ?>

              <?php if($row['status'] === 'Draft') { ?>
                <form action="fetch/statusBoardsPublish.php" method="post">
                  <input type="hidden" name="id" value="<?=$row['idboards']?>">
                  <button class="px-2 py-1 btn-info" type="submit" style="position: absolute; bottom: 15%; left: 9%; border-radius: 8px; border: 0; color: #FFF; font-weight: 600;">Publish</button>
                </form>  
              <?php } ?>

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
                <h2>Plan Date</h2>
                <span style="color: #E3C629;"><?=$row['plan_date']?></span>
              </div>
              <div class="component ml-4" style="text-align: left;">
                <h2>Startdate</h2>
                <span style="color: #E3C629;"><?=$row['start_date']?></span>
              </div>
              <div class="component ml-4" style="text-align: left;">
                <h2>Status</h2>
                <span style="color: #E3C629;"><?=$row['status']?></span>
              </div>
              <div class="component ml-4" style="text-align: left;">
                <h2>Deadline</h2>
                <span style="color: #F33838;"><?=$row['deadline']?></span>
              </div>
              <div class="component ml-4" style="text-align: left;">
                <h2>End Date</h2>
                <span style="color: #F33838;"><?=$row['end_date']?></span>
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
                <span style="color: #548CFF;">Rp. <?=$row['project_price']?></span>
                <!-- <span style="color: #548CFF;"><?=rupiah($row['project_price'])?></span> -->
              </div>
            </div>
          </div>
        </div>
      <?php $no++;
      } ?> 
    </main>

    <button type="button" data-toggle="modal" data-target="#exampleModal" class="btn-linear-primary p-2 btn-fixed-bottom" >+ New Boards</button>
    
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">New Boards</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="fetch/inputData.php" method="POST">
          <div class="modal-body">
            <div class="form-group">
              <label for="exampleInputEmail1">Owner</label>
              <input type="text" name="owner" class="form-control" id="exampleFormControlInput1" placeholder="Owner name here...">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Company Name</label>
              <input type="text" name="company" class="form-control" id="exampleFormControlInput1" placeholder="Company name here...">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">No. Telp</label>
              <input type="number" name="no_telp" class="form-control" id="exampleFormControlInput1" placeholder="No telp here...">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Address</label>
              <textarea name="address" id="" class="form-control" cols="30" rows="3"></textarea>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Email</label>
              <input type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="Owner email here...">
            </div>
            <hr>
            <div class="form-group">
              <label for="exampleInputEmail1">Pay Status</label>
              <select name="pay_status" id="" class="form-control">
                <option value="Lunas">Lunas</option>
                <option value="Belum Lunas">Belum Lunas</option>
              </select>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Price</label>"
              <input type="number" name="price" class="form-control" id="price" onkeypress="if(this.value.length == 16) return false;" placeholder="Price task here...">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Title</label>
              <input type="text" name="title" class="form-control" id="exampleFormControlInput1" placeholder="Title task here...">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Description</label>
              <textarea name="desc" id="" class="form-control" rows="3">Task description here...
              </textarea>
            </div>
            <!-- <div class="form-group">
              <label for="exampleInputEmail1">Deadline</label>
              <input type="date" name="deadline" class="form-control" id="exampleFormControlInput1">
            </div> -->
            <div class="row">
              <div class="col-md-12">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Plan Date</label>
                      <input type="date" name="plan_date" class="form-control" id="exampleFormControlInput1">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Deadline</label>
                      <input type="date" name="deadline" class="form-control" id="exampleFormControlInput1">
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
                      <input type="date" name="plan_date" class="form-control" id="exampleFormControlInput1">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="exampleInputEmail1">End Date</label>
                      <input type="date" name="end_date" class="form-control" id="exampleFormControlInput1">
                    </div>
                  </div>
                </div>
              </div>
            </div> -->
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
  var price = document.getElementById('price');
    price.addEventListener('keyup', function(e)
    {
        price.value = formatRupiah(this.value);
        console.log(formatRupiah(this.value))
    });

    function formatRupiah(angka, prefix)
    {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split    = number_string.split(','),
            sisa     = split[0].length % 3,
            rupiah     = split[0].substr(0, sisa),
            ribuan     = split[0].substr(sisa).match(/\d{3}/gi);
            
        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }
        
        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }

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