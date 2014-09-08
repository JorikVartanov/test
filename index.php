<!DOCTYPE html>
<html lang="en">
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>test</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Bootstrap -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	</head>
		<body>
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-4">
						<h6>Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст </h6>
					</div>
					<div class="col-md-4">
						<h6>Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст </h6>
					</div>
					<div class="col-md-4">
						<h6>Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст Текст </h6>
					</div>
				</div>
				<a href="phpinfo.php">phpinfo</a></p>
				<div class="row">
					<div class="col-md-4">
						<form method="post" class="form-horizontal" role="form">
							<div class="form-group">
								<label for="inputText" class="col-sm-3 control-label">Text</label>
								<div class="col-sm-9">
									<textarea class="form-control" name="comment" id="inputComment" placeholder="Comment" rows="3"></textarea>
								</div>
							</div>
							<div class="form-group">
								<label for="inputName" class="col-sm-3 control-label">Name</label>
								<div class="col-sm-9">
									<input type="text" name="username" class="form-control" id="inputName" placeholder="Name">
								</div>
							</div>
							<div class="form-group">
								<label for="inputEmail" class="col-sm-3 control-label">Email</label>
								<div class="col-sm-9">
									<input type="email" name="email" class="form-control" id="inputEmail" placeholder="Email">
								</div>
							</div>
							<div class="form-group">
								<label for="inputHomepage" class="col-sm-3 control-label">Homepage</label>
								<div class="col-sm-9">
									<input type="text" name="homepage" class="form-control" id="inputHomepage" placeholder="Homepage">
								</div>
							</div>
							<div class="form-group">
								<label for="inputPassword" class="col-sm-3 control-label">Password</label>
								<div class="col-sm-9">
									<input type="password" name="password" class="form-control" id="inputPassword" placeholder="Password">
								</div>
							</div>
							<div class="form-group">
								<label for="InputFile" class="col-sm-3 control-label">File input</label>
								<div class="col-sm-9">
									<input type="file" name="file" id="InputFile" placeholder="File">
									<p class="help-block">Example block-level help text here.</p>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-offset-3 col-sm-9">
									<div class="checkbox">
										<label>
											<input type="checkbox"> Remember me
										</label>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-offset-3 col-sm-9">
									<button type="submit" class="btn btn-default">Submit</button>
								</div>
							</div>
						</form>
					</div>
					<div class="col-md-4">
						
					</div>
					<div class="col-md-4">
						
					</div>
					
					
					
					
					
					
					
				</div>
	
	
				<?php
					if ($_SERVER['REQUEST_METHOD'] == 'POST') {
						//Filter for $username
						if ($_POST['username'] == '' OR !preg_match('/^[a-zA-Z0-9]+$/', $_POST['username'])){ //The filter should allow names with quotes and dashes. For example: Shaquille O'Neal or Anastasiya Sokolova-Rosha
							$username = 'Invalid Name';
						}
						else{
							$username = $_POST['username'];
						}
						if ($_POST['email'] != '' OR filter_var($_POST['email'], FILTER_SANITIZE_EMAIL)){
							$email = $_POST['email'];
						}
						else{
							$email = 'Invalid email';
						}
						if ($_POST['homepage'] == '' OR !filter_var($_POST['homepage'], FILTER_VALIDATE_URL)){
							$homepage = 'Invalid homepage';
						}
						else{
							$homepage = $_POST['homepage'];
						}
						if ($_POST['comment'] != ''){						
							$comment = filter_var($_POST['comment'], FILTER_SANITIZE_STRING);
						}
						else{
							$comment = 'Insert comment';
						}
						if ($_POST['password'] != ''){
							$password = $_POST['password'];
						}
						else{
							$password = 'Insert password';
						}
						echo "Привет, $username </p>";
						echo "Твое мыло: $email </p>";
						echo "Твоя страница: $homepage </p>";
						echo "Твой комментарий: $comment </p>";
						echo "Твой пароль: $password </p>";
						echo "REMOTE_ADDR";
					}
				?>
			</div>
	  
			<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
			<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>  -->
			<script src="http://code.jquery.com/jquery-2.1.0.min.js" type="text/javascript"></script>
			<!-- Include all compiled plugins (below), or include individual files as needed -->
			<!-- <script src="js/bootstrap.js"></script>  --> 
			<script src="js/bootstrap.js" type="text/javascript"></script>
		</body>
</html>