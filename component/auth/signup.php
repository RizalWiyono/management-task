<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Signup</title>

	<!-- Favicon -->
	<link rel="icon" type="image/x-icon" href="../../src/images/favicon.png">

	<!-- Bootstrap -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

	<!-- Style -->
	<link rel="stylesheet" type="text/css" href="../../src/css/style.css">

</head>
<body style="overflow-x: hidden; width: 100%; background: #191A19;">
	<div class="card-auth">
		<div class="left-auth-section">
			<h1>Register</h1>
			<p>Welcome to Project Management Dashboard</p>

			<form action="fetch/signup.php" method="post">
				<div class="row">
					<div class="col-md-6">
						<div class="mb-3 mt-4">
							<label for="exampleInputEmail1" class="form-label">Email</label>
							<input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
						</div>
					</div>
					<div class="col-md-6">
						<div class="mb-3 mt-4">
							<label for="exampleInputEmail1" class="form-label">Username</label>
							<input type="text" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
						</div>
					</div>
				</div>
				<div class="mb-3 mt-2">
					<label for="exampleInputEmail1" class="form-label">Password</label>
					<input type="password" name="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
				</div>
				<div class="row">
					<div class="col-md-6">
						<label for="exampleInputEmail1" class="form-label">Company Name</label>
						<input type="text" name="company_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
					</div>
					<div class="col-md-6">
						<label for="exampleInputEmail1" class="form-label">Company Service</label>
						<select class="form-control" name="company_service_type" id="">
							<option value="Product">Product</option>
							<option value="Service">Service</option>
						</select>
					</div>
				</div>
				<div class="mb-3 mt-4">
					<label for="exampleInputEmail1" class="form-label">Address</label>
					<textarea name="address" id="" cols="30" rows="5" class="form-control"></textarea>
				</div>
				<div class="mb-3 mt-4">
					<label for="exampleInputEmail1" class="form-label">No. Telp</label>
					<input type="number" name="no_telp" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
				</div>
				<div class="mb-3 mt-4">
					<label for="exampleInputEmail1" class="form-label">Website</label>
					<input type="text" name="website" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
				</div>
				<button type="submit" class="btn btn-primary btn-cta w-100 mt-5">Register now</button>
			</form>
		</div>
		<img src="../../src/images/auth-image.png" alt="">
	</div>
</body>
</html>
