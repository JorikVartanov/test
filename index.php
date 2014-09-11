<!DOCTYPE html>
<html lang="en">
<?php
session_start();
include('functions.php');
?>
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
					<div class="col-md-12">
						<h1>КАКАЯ-ТО ТЕМА ДЛЯ ОБСУЖДЕНИЙ :-)</h1>
					</div>
				</div>
				<p><a href="phpinfo.php">phpinfo</a></p>
			
				<?php
					if ($_SERVER['REQUEST_METHOD'] == 'GET') {
						form();
						echo "</br> Comes with GET </br>";
					}else{
						
						if ($_POST['inputCaptcha'] == '' AND $_POST['username'] == '' AND $_POST['email'] =='' AND $_POST['homepage'] == '' AND $_POST['comment'] == '' AND $_POST['password'] == '') {
							header("Location:".$_SERVER['HTTP_REFERER']);
							exit;
						}
						form();
						if ($_POST['inputCaptcha'] != '' AND $_POST['inputCaptcha'] == $_SESSION['code']){
							$code = 'Код введен верно';
							unset($_SESSION['code']);
							//session_destroy();
						}
						else{
							$code = 'Insert code';
							session_destroy();
							//header("Location:".$_SERVER['HTTP_REFERER']);
						}
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
							$comment = 'Invalid comment';
						}

						$commentDate = date("Y.m.d, H:i:s");
						$ip_user = $_SERVER['REMOTE_ADDR'];
						
						echo "Привет, $username </p>";
						echo "Твое мыло: $email </p>";
						echo "Твоя страница: $homepage </p>";
						echo "Твой комментарий: $comment </p>";
						echo "Результат кода: $code </p>";
						echo $ip_user.'</p>';
						echo "$commentDate </br>";
						
						if(strstr($_SERVER['HTTP_USER_AGENT'], 'MSIE'))
						$browser = 'Internet explorer';
						elseif(strstr($_SERVER['HTTP_USER_AGENT'], 'Trident'))
						$browser = 'Internet explorer';
						elseif(strstr($_SERVER['HTTP_USER_AGENT'], 'Firefox'))
						$browser = 'Mozilla Firefox';
						elseif(strstr($_SERVER['HTTP_USER_AGENT'], 'Chrome'))
						$browser = 'Google Chrome';
						elseif(strstr($_SERVER['HTTP_USER_AGENT'], 'Opera'))
						$browser = "Opera";
						elseif(strstr($_SERVER['HTTP_USER_AGENT'], 'Safari'))
						$browser = "Safari";
						else {
							$browser = "Mozilla Firefox";
						}
						echo $browser;
						/*
						mysql_connect('localhost', 'root', 'root') or die('Ошибка соединения с MySQL!');
						mysql_select_db('gestbook') or die ('Ошибка соединения с базой данных MySQL!');
						mysql_set_charset('utf8'); // выставляем кодировку базы данных
						mysql_query("INSERT INTO `comments` (`user_name`, `email`,`homepage`,`text`,`date`,`browser`,`ip_user`) VALUES ('".$username."', '".$email."', '".$homepage."', '".$comment."', '".$commentDate."', '".$browser."', '".$ip_user."')");
						echo 'Вы успешно зарегистрированы!'; 
						exit();
						*/
						
						header("Location:".$_SERVER['HTTP_REFERER']);
						die;
					}
				?>
			</div>
	  
			<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
			<script src="http://code.jquery.com/jquery-2.1.0.min.js" type="text/javascript"></script>
			<!-- Include all compiled plugins (below), or include individual files as needed -->
			<!-- <script src="js/bootstrap.js"></script>  --> 
			<script src="js/bootstrap.js" type="text/javascript"></script>
		</body>
</html>