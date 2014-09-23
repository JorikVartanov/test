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
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<!-- <link rel="stylesheet" type="text/css" href="themes/blue/style.css"> -->
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script type="text/javascript" src="http://code.jquery.com/jquery-2.1.0.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
	<!-- <script type="text/javascript" src="js/jquery.tablesorter.min.js"></script> -->
	<script type="text/javascript" src="js/my_script.js"></script>
	<script>
		window.onload = function()
		{
		    document.getElementById('sort-by-alphabet-alt').onclick = function()
		    {
			$("#tbl").load("tesa.txt");
		    }
		}
		function sortNameByAlphabet(){
			$("#tbl-body").load("aindex.php #tbl-body");
		}
		function setLocation(curLoc){
			try {
				history.pushState(null, null, curLoc);
				return;
			} catch(e) {}
			location.hash = curLoc;
		}
	</script>
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
						echo session_id().'</br>';
					}else{
						if ($_POST['inputCaptcha'] == '' AND $_POST['username'] == '' AND $_POST['email'] =='' AND $_POST['homepage'] == '' AND $_POST['comment'] == '' AND $_POST['password'] == '') {
							header("Location:".$_SERVER['HTTP_REFERER']);
							exit;
						}
						form();
						if ($_POST['inputCaptcha'] != '' AND $_POST['inputCaptcha'] == $_SESSION['code']){
							$code = 'Код введен верно';
							unset($_SESSION['code']);
						}
						else{
							$code = 'Insert code';
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
							$homepage = NULL;
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
						mysqlSetData($username, $email, $homepage, $comment, $commentDate, $browser, $ip_user);
					}
					mysqlGetData();
					if ($_SESSION['allCommentsFromBase']) {
						pagination();
						?><table id="tbl" class="table table-bordered">
							<thead>
								<tr>
									<th> <?php echo 'Name '; ?><button type="button" class="glyphicon glyphicon-sort-by-alphabet" onclick="sortNameByAlphabet()"><button type="button" id="sort-by-alphabet-alt" class="glyphicon glyphicon-sort-by-alphabet-alt"></th>
									<th> <?php echo 'Text '; ?></th>
									<th> <?php echo 'Email '; ?><button type="button" class="glyphicon glyphicon-sort-by-alphabet"><button type="button" class="glyphicon glyphicon-sort-by-alphabet-alt"></th>
									<th> <?php echo 'Homepage '; ?></th>
									<th> <?php echo 'Date '; ?><button type="button" class="glyphicon glyphicon-sort-by-order"><button type="button" class="glyphicon glyphicon-sort-by-order-alt"></th>
								</tr>
							</thead>
							<tbody id="tbl-body">
						<?php		while ($dataBaseArray = $_SESSION['allCommentsFromBase']->fetch_assoc()) {
						?>			<tr>
						<?php			foreach ($dataBaseArray as $key => $value){
										if ($key == 'id_comments')
											continue;
										else
						?>					<td><?php echo "$value"; ?></td>
						<?php			}
						?>			</tr>
						<?php		}
						?>	</tbody>
						</table>
					<?php
					pagination();
					}
				?>
			</div>
		</body>
</html>