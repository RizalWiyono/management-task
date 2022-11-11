<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login</title>

	<!-- Favicon -->
	<link rel="icon" type="image/x-icon" href="../../src/images/favicon.png">

	<!-- Bootstrap -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

	<!-- Style -->
	<link rel="stylesheet" type="text/css" href="../../src/css/style.css">

</head>
<body style="height: 100%; position:absolute; overflow: hidden; width: 100%; background: #191A19;">
	<img src="../../src/images/assets-2.png" alt="" style="position: absolute;
    bottom: -300px;
    left: -250px;">
	<img src="../../src/images/assets-2.png" alt="" style="position: absolute;
    top: -300px;
    right: -250px;">
	<div class="card-auth">
		<div class="left-auth-section">
			<h1>Login</h1>
			<p>Welcome to Project Management Dashboard</p>
			<a href="signup.php">Sign up</a>

			<form action="fetch/login.php" method="post">
				<div class="mb-3 mt-4">
					<label for="exampleInputEmail1" class="form-label">Email address</label>
					<input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
					<div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
				</div>
				<div class="mb-3 mt-4">
					<label for="exampleInputPassword1" class="form-label">Password</label>
					<input type="password" name="password" class="form-control" id="exampleInputPassword1">
				</div>
				<button type="submit" class="btn btn-primary btn-cta w-100 mt-5">Login now</button>
			</form>
		</div>
			<img src="../../src/images/auth-image.png" alt="">
	</div>
</body>
</html>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
	var getUrlParameter = function getUrlParameter(sParam) {
		var sPageURL = window.location.search.substring(1),
			sURLVariables = sPageURL.split('&'),
			sParameterName,
			i;

		for (i = 0; i < sURLVariables.length; i++) {
			sParameterName = sURLVariables[i].split('=');

			if (sParameterName[0] === sParam) {
				return sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
			}
		}
	};

	var param = getUrlParameter('process');
	console.log(param)
	if(param === "success"){
		Swal.fire({
			position: 'top-end',
			icon: 'success',
			title: 'Data Anda Sudah Disimpan!',
			showConfirmButton: false,
			timer: 1500
		})
	}else if(param === "failed"){
		Swal.fire({
			position: 'top-end',
			icon: 'warning',
			title: 'Email atau Password Salah!',
			showConfirmButton: false,
			timer: 1500
		})
	}
</script>