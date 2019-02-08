<?
include'bd.php';
include'lib.php';

$uid=null;
if($_GET['logout'] == 'me'){
	$_POST['nickname']=null;
	$_POST['password']=null;
	$_POST['do']=null;
	$_POST['uid']=null;
}
if($_POST['uid'] != null and $_POST['tid'] != null and $_POST['do2']=="addreq2"){
date_default_timezone_set('UTC+2');
selectBD($bd_name,$bd_host,$bd_username,$bd_user_pass);
$temp = reqSQL("INSERT INTO `tour_request`(`tour_id`, `spaces`, `days`, `user_id`,`request_date`) VALUES (".$_POST['tid'].",".$_POST['spaces'].",".$_POST['days'].",".$_POST['uid'].",'".date("Y-m-d H:i:s")."')",null);
mysql_close();
}
if($_POST['uid'] != null and $_POST['tid'] != null and $_GET['do']=="addreq"){
	echo '<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Tourism</title>
</head>
<style>
@font-face {
font-family: "bestfont";src: url("img/KumarOneOutline-Regular.ttf");
}
</style>
<body style="background-image: url(img/st.png), url(img/header.jpg);background-size:10px,100%;" >
	<form style="width:30%;background-color:white;padding:15px;border-radius: 20px 20px 20px 20px;position:fixed;top:10%;left:35%;"  id="req" action="index.php" method="post">
	<p><h1 style="font-family: bestfont, Arial, sans-serif;" >Запрос</h1></p>
	<p><input required placeholder="Мест" form="req" name="spaces"  /></p>
	<p><input required placeholder="Дней" form="req" name="days" /></p>
	<p><input form="req" type="hidden" name="do" value="login2" /></p>
	<p><input form="req" type="hidden" name="do" value="login2" /></p>
	<p><input form=tourlist type=hidden name=password value='.$_POST['password'].' ></p>
	<p><input form=tourlist type=hidden name=nickname value='.$_POST['nickname'].' ></p>
	<p><input form="req" type="hidden" name="do" value="login2" /></p>
	<p><input form="req" type="hidden" name="do2" value="addreq2" /></p>
	<p><input form="req" type="hidden" name="tid" value="'.$_POST['tid'].'" /></p>
	<p><input form="req" type="hidden" name="uid" value="'.$_POST['uid'].'" /></p>
	<p><input form="req" style="margin-left:5;" type="submit"></p>
	</form></body></html>';
}
if($_POST['uid'] != null and $_POST['do']=="tourlist"){
selectBD($bd_name,$bd_host,$bd_username,$bd_user_pass);
echo '<body style="background-image: url(img/st.png), url(img/header.jpg);background-size: 10px,cover;background-position: center top;background-attachment: fixed;height: 100vh;" ><style>.block{color:#E2E2E2;background:rgba(255,245,215,.4);margin:10px;font-weight:500;padding:10px;border-radius:20px 20px 20px 20px;width:250px;}form{display:block;margin:0 auto;text-align:center;}input{
	
	bottom:10px;
 margin-right: 20px;
 color: #fff;
 font-size: 22px;
 background: #000;
 padding: 5px 12px;
 border: 2px solid #fff;
 border-radius: 10px;
}
.block {
	text-shadow: 
		-0   -1px 0   #000000,
		 0   -1px 0   #000000,
		-0    1px 0   #000000,
		 0    1px 0   #000000,
		-1px -0   0   #000000,
		 1px -0   0   #000000,
		-1px  0   0   #000000,
		 1px  0   0   #000000,
		-1px -1px 0   #000000,
		 1px -1px 0   #000000,
		-1px  1px 0   #000000,
		 1px  1px 0   #000000,
		-1px -1px 0   #000000,
		 1px -1px 0   #000000,
		-1px  1px 0   #000000,
		 1px  1px 0   #000000;
}
</style><div id="tour_list" style="display: flex;justify-content: flex-start; flex-wrap: wrap; margin: 10px;" >';
$num = reqSQL("SELECT COUNT(*) FROM `tour_list`","err 65");
$size_tour_list = $num[0];
for($i = 1;$i <=$size_tour_list;$i++){
	$temp = reqSQL("SELECT `tour_id`,`address`,`title`,`email`,`tags`,`imgs`,`phone_number`,`price`,`spaces` FROM `tour_list` WHERE `tour_id`=".$i,"err 69");
	if($temp['imgs']!="null"){$imgs = $temp['imgs'];}else{$imgs = "img\default.png";}
	echo "<div id=el-".$temp['tour_id']." class=block >
	<img style=".'"'."margin:0 auto;display:block;text-align:center;border-radius:20px;".'"'." width=220px height=180px src=".$imgs." ></img> 
	<div style=width:220px; >
		<p>Title: ".$temp['title']."</p>
		<p>Address: ".$temp['address']."</p>
		<p>Email: ".$temp['email']."</p>
		<p>Price: ".$temp['price']."</p>
		<p>Space: ".$temp['spaces']."</p>
		<p><form action=?do=addreq method=post  id=tour-form-".$temp['tour_id']." >
			<input form=tour-form-".$temp['tour_id']." type=submit value=Request ></input>
			<p><input form=tourlist type=hidden name=uid value=".$_POST['password']." ></p>
			<p><input form=tourlist type=hidden name=password value=".$_POST['password']." ></p>
			<p><input form=tourlist type=hidden name=nickname value=".$_POST['nickname']." ></p>	
			<input form=tour-form-".$temp['tour_id']." name=tid value=".$temp['tour_id']." type=hidden ></input>
			<input form=tour-form-".$temp['tour_id']." name=uid value=".$_POST['uid']." type=hidden ></input>
		</form></p>
	</div>
</div></br>";
}
echo '</div></body>';
mysql_close();
}
if($uid == null and $_GET['do']==null){
	if($_POST['do']!="login2"){
		$register = '
		<a href=?do=reg >Register</a>
		<a href=?do=login >Login</a>
		';
	}else{
		$register = '
		<p><span style="text-shadow: 3px 3px 2px #000;font-size:35px; color:white; margin-right:10px;" >Welcome '.$_POST['nickname'].'</span><a href=?logout=me >Logout</a></p>
		';
	}
	echo '
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Tourism</title>
	<link rel="stylesheet" href="css/style.css">
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
	<link rel="shortcut icon" href="img/compass-with-white-needles.png" type="image/png">
</head>
<body>
	<header id="heading">
	<div class="register">
		'.$register.'
		</div>
		<nav>
			<ul class="menu">
				<li><a href="#main">Главная</a></li>
				<li><a href="#tourism">О туризме</a></li>
				<li><a href="#info">Контакты</a></li>
				<li><a href="#pansion">Добавить базу отдыха</a></li>
				<li><a href="#list">Список базз</a></li>
			</ul>
		</nav>
		<div class="heading__main">
			<h1>Bego - не просто увлечение<br> 
				или мода. Это жизненная потребность<br> 
				большинства людей.
			</h1>
			<img src="https://cdn.discordapp.com/attachments/509761567529631754/519257944878219274/picfgfgghgdgd01.png" alt="">
		</div>
		<a href="#down" class="arrow"><img src="img/arr.png" alt=""></a>
	</header>
	<main id="down">
		<!-- 1)Главная -->
		<section id="main" class="pages main">
			<div class="main__bg">
				<div class="main__item">
					<h2>Хороший отдых начинается с планирования.</h2>
					<p>А планирование требует времени, знаний и опыта.</p>
					<p>Мы гарантируем вам удовольствие не только от отдыха, но еще и от процесса его планирования.</p>
				</div>
			</div>
		</section>
		
		<section id="list" class="pages main">
			<div class="catalog__bg">
				<div class="catalog__item">
					<iframe style=border-radius:30px; src=list.php frameBorder="0" width=95% height=750px ></iframe>
				</div>
			</div>
		</section>
		
		<section id="pansion" class="pages main">
			<div class="catalog__bg">
				<div class="catalog__item">
					<iframe style=border-radius:30px; src=?do=pansion frameBorder="0" width=95% height=750px ></iframe>
				</div>
			</div>
		</section>		
		
		<section id="info" class="pages main">
			<div class="catalog__bg">
				<div class="catalog__item">
					
					<p><h1>Контакты</h1></p>
					<p>Email: BeGo@gmail.com</p>
					<p>Телефон: +380 96 552 1715</p>
					<p>Адрес: Харьков, ул. Сумская 8</p>
					<p>При поддержке команды: Bego</p>
					
					
				</div>
			</div>
		</section>
		
		<!-- 4)О туризме -->
		<section id="tourism" class="pages main">
			<div class="tourism__bg">
				<div class="tourism__item">
					<h2>Туризм в понимании компании </h2>
					<p>В понимании компании Туризм - не просто увлечение или мода.</p><p> Это жизненная потребность большинства нормальных людей который мы можем предоставить.</p><p> В разные времена и эпохи примерно одно и то же привлекало их в туризме: романтика путешествий, а значит, бегство от обыденного, да еще возможность неформального общения.</p><p> Каждый  наш участник таких путешествий начинает чувствовать себя открывателем и землепроходцем.</p><p> Благодаря нашему агентству все новые возможности туризма  делает жизнь интересней, наполняет ее неожиданными открытиями в природе и в обществе. </p>
				</div>
			</div>
		</section>
	</main>
	<script src="js/main.js"></script>
	<footer>
		<a href="#heading" class="top"><i class="fa fa-level-up"></i></a>
		<div class="footer">
			<ul>
				<li></li>
				<li><a href="#"><i class="fa fa-vk"></i></a></li>
				<li><a href="#"><i class="fa fa-facebook"></i></a></li>
				<li><a href="#"><i class="fa fa-twitter"></i></a></li>
				<li><a href="#"><i class="fa fa-instagram"></i></a></li>
				<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
			</ul>
		</div>
	</footer>
</body>
</html>
';
}
if( $_GET['do']=="reg"){
	echo '
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Tourism</title>
</head>
<style>
@font-face {
font-family: "bestfont";src: url("img/KumarOneOutline-Regular.ttf");
}
</style>
<body style="background-image: url(img/st.png), url(img/header.jpg);background-size:10px,100%;" >
<form style="background-image: url(img/register-clipart.png);background-repeat:no-repeat;background-position:right top;background-size:40%;width:30%;background-color:white;padding:15px;border-radius: 20px 20px 20px 20px;position:fixed;top:10%;left:35%;" id="register" action="index.php" method="post">
	<p><h1 style="font-family: bestfont, Arial, sans-serif;" >Register</h1></p>
	<p><input required placeholder="Имя" form="register" type="text" name="user_name"  /></p>
	<p><input required placeholder="Фамилия" form="register" type="text" name="user_surname" /></p>
	<p><input required placeholder="Никнейм" form="register" type="text" name="nickname" /></p>
	<p><input required placeholder="Пароль" form="register" type="password" name="password" /></p>
	<p><input required placeholder="Повторите пароль" form="register" type="password" name="password2" /></p>
	<p><input required placeholder="example@mail.com" form="register" type="text" name="email" /></p>
	<p><input form="register" type="hidden" name="do" value="regtobd" /></p>
	<p><input required placeholder="Номер телефона" form="register" type="text" name="phone_number" /></p>
	<input form="register" type="reset"><input form="register" style="margin-left:5;" type="submit">
	</form></body></html>';
}
if( $_GET['do']=="login"){
	echo '
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Tourism</title>
</head>
<style>
@font-face {
font-family: "bestfont";src: url("img/KumarOneOutline-Regular.ttf");
}
</style>
<body style="background-image: url(img/st.png), url(img/header.jpg);background-size:10px,100%;" >
	<form style="background-image: url(img/register-clipart.png);background-repeat:no-repeat;background-position:right top;background-size:40%;width:30%;background-color:white;padding:15px;border-radius: 20px 20px 20px 20px;position:fixed;top:10%;left:35%;"  id="login" action="index.php" method="post">
	<p><h1 style="font-family: bestfont, Arial, sans-serif;" >Login</h1></p>
	<p><input required placeholder="Никнейм" form="login" type="text" name="nickname" /></p>
	<p><input required placeholder="Пароль" form="login" type="password" name="password" /></p>
	<p><input form="login" type="hidden" name="do" value="login2" /></p>
	<p><a href="?do=forgotpass">Забыл пароль</a> <input form="login" style="margin-left:5;" type="submit"></p>
	</form></body></html>';
}
if( $_GET['do']=="forgotpass"){
	echo '<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Tourism</title>
</head>
<style>
@font-face {
font-family: "bestfont";src: url("img/KumarOneOutline-Regular.ttf");
}
</style>
<body style="background-image: url(img/st.png), url(img/header.jpg);background-size:10px,100%;" >
	<form style="width:30%;background-color:white;padding:15px;border-radius: 20px 20px 20px 20px;position:fixed;top:10%;left:35%;"   id="forgotpass" action="?do=forgotpassword" method="post">
	<p><h1 style="font-family: bestfont, Arial, sans-serif;" >Recover Password</h1></p>
	<p><input required placeholder="Никнейм" form="forgotpass" type="text" name="nickname" /></p>
	<p><input required placeholder="Номер телефона" form="forgotpass" type="text" name="mobilephone_number" /></p>
	<p><input required placeholder="Email" form="forgotpass" type="text" name="email" /></p>
	<p><input form="forgotpass" type="hidden" name="do" value="forgotpass2" /></p>
	<input form="forgotpass" type="reset"><input form="forgotpass" style="margin-left:5;" type="submit">
	</form></body></html>';
}
if( $_GET['do']=="pansion"){
	echo '<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Tourism</title>
</head>
<style>
@font-face {
font-family: "bestfont";src: url("img/KumarOneOutline-Regular.ttf");
}
</style>
<body style="background-image: url(img/st.png), url(img/pic02.jpg);background-size:10px,100%;" >
	<form style="width:30%;background-color:white;padding:15px;border-radius: 20px 20px 20px 20px;position:fixed;top:10%;left:35%;" id="pension" action="?do=pansion2" method="post">
	<p><h1 style="font-family: bestfont, Arial, sans-serif;" >Register pension</h1></p>
	<p><input required placeholder="title" form="pension" type="text" name="title" /></p>
	<p><input required placeholder="address" form="pension" type="text" name="address" /></p>
	<p><input required placeholder="phone_number" form="pension" type="text" name="phone_number" /></p>
	<p><input required placeholder="price" form="pension" type="text" name="price" /></p>
	<p><input required placeholder="max_space" form="pension" type="text" name="max_space" /></p>
	<p><input required placeholder="email" form="pension" type="text" name="email" /></p>
	<p><input required placeholder="imgs" form="pension" type="text" name="imgs" /></p>
	
	
	
	<p><input form="pension" type="hidden" name="do" value="pansion2" /></p>
	<input form="pension" type="reset"><input form="pension" style="margin-left:5;" type="submit">
	</form></body></html>';
}
if( $_POST['do']=="pansion2"){
		selectBD($bd_name,$bd_host,$bd_username,$bd_user_pass);
		reqSQL("INSERT INTO `pension_request`(`address`,`title`,`phone_number`, `price`, `max_space`, `email`, `request_date`,`imgs`) VALUES ('".$_POST['address']."','".$_POST['title']."',".$_POST['phone_number'].",".$_POST['price'].",".$_POST['max_space'].",'".$_POST['email']."','".date("Y-m-d H:i:s")."','".$_POST['imgs']."')",null);mysql_close();
		echo '<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Tourism</title>
</head>
<style>
@font-face {
font-family: "bestfont";src: url("img/KumarOneOutline-Regular.ttf");
}
</style>
<body style="background-image: url(img/st.png), url(img/header.jpg);background-size:10px,100%;" >
<p><h1 style="color:white;font-family: bestfont, Arial, sans-serif;" >Request sending...</h1></p>
<p><h1 style="color:white;font-family: bestfont, Arial, sans-serif;" >Wait answer...</h1></p>
';
}
if($_POST['do']=="forgotpass2"){
	selectBD($bd_name,$bd_host,$bd_username,$bd_user_pass);
	$line = reqSQL("SELECT 1 `nickname`,`mobilephone_number`,`email`,`user_id` FROM `user_list` WHERE `nickname`='".$_POST['nickname']."' LIMIT 0 , 30;","err 989");
	mysql_close();
	if($_POST['mobilephone_number'] == $line['mobilephone_number'] and $_POST['email'] == $line['email']){
		echo '
	<form  id="restorepass" action="index.php" method="post">
	<p><input required placeholder="Новый пароль" form="restorepass" type="password" name="password" /></p>
	<p><input required placeholder="Повтор пароля" form="restorepass" type="password" /></p>
	<p><input form="restorepass" type="hidden" name="uid" value="'.$line['user_id'].'" /></p>
	<p><input form="restorepass" type="hidden" name="do" value="forgotpass3" /></p>
	<input form="restorepass" type="reset"><input form="restorepass" style="margin-left:5;" type="submit">
	</form>
		';
	}
}
if($_POST['do']=="forgotpass3"){
	selectBD($bd_name,$bd_host,$bd_username,$bd_user_pass);
	reqSQL("UPDATE `user_list` SET `password`='".encryptIt($_POST['password'])."' WHERE `user_id` = '".$_POST['uid']."'",null);
	mysql_close();
}
if($_POST['do']=="regtobd"){
	selectBD($bd_name,$bd_host,$bd_username,$bd_user_pass);
	$line = reqSQL("SELECT 1 `user_id` FROM `user_list` WHERE `nickname`='".$_POST['nickname']."' LIMIT 0 , 30;","err 983");
	if($line['user_id'] == null){
		date_default_timezone_set('UTC+2');
		$query = "INSERT INTO `user_list`(`user_name`, `user_surname`, `nickname`, `password`, `mobilephone_number`,`email`, `register_date`, `last_login`) VALUES ('".$_POST['user_name']."','".$_POST['user_surname']."','".$_POST['nickname']."','".encryptIt($_POST['password'])."',".$_POST['phone_number'].",'".$_POST['email']."','".date("Y-m-d H:i:s")."','".date("Y-m-d H:i:s")."')";
		$result = mysql_query($query) or die('Запрос не удался code-34: ' . mysql_error());
	}else{
		echo "nickname already exists";
	}
	mysql_close();
}
if($_POST['do']=="login2"){
	selectBD($bd_name,$bd_host,$bd_username,$bd_user_pass);
	$line = reqSQL("SELECT `password`,`user_id` FROM `user_list` WHERE `nickname`='".$_POST['nickname']."'","err 37");
	if($line['user_id'] == null){
		echo '<p id=error ><i style=margin-right:10px; class="fa fa-times-circle"></i>Wrong nickname or password</p>';
	}else{		
		if(decryptIt($line['password']) == $_POST['password']){
			$uid= $line['user_id'];
			updateOnline($uid);			
			echo "<form class=in-line-input method=post action=?do=tourlist id=tourlist ><input form=tourlist type=hidden name=do value=tourlist ><input form=tourlist type=hidden name=uid value=".$uid." ><input form=tourlist type=hidden name=password value=".$_POST['password']." ><input form=tourlist type=hidden name=nickname value=".$_POST['nickname']." ><input id='respawn' style='position: absolute; right: 12px; top: 80px; bottom: auto; left: auto;' form=tourlist  type=submit value='Каталог туров'></form>";
			if(haveAcsses($uid)){
				$line = reqSQL("SELECT `acsses` FROM `user_list` WHERE `user_id`='".$uid."' LIMIT 0 , 30;","err 42");
				if($line['acsses'] == 1){
					echo '
					<form class=in-line-input method="post" id="adminPanel" action="adminroom.php"><input form="adminPanel" type="hidden" name="uid" value="'.$uid.'"><input  style="left:10px;" type="submit" form="adminPanel" value="adminPanel"></form>';
				}
			}
		}else{
			echo '<p id=error ><i style=margin-right:10px; class="fa fa-times-circle"></i>Wrong nickname or password.</p>';
		}
	
	}
mysql_close();//
}
?>