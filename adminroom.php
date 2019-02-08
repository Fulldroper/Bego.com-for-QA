<?
include'bd.php';
include'lib.php';
selectBD($bd_name,$bd_host,$bd_username,$bd_user_pass);
echo '
<style>
body{
	background:url(img/st.png) left,fixed url(img/header.jpg) center top no-repeat;
	background-size:10px,cover;
	height:100%;
}
table{
	margin:auto;
	background-color:white;
	border-radius:20px 20px 20px 20px;
	border-collapse: collapse;
	border:none;
}
table td{
	text-align:center;
	border-bottom:1px solid black;
	margin: 0 auto;
	padding: 0.5px 5px;
}
input{
	display:inline-block;
	z-index:1000;
	margin:auto;
	color: #fff;
	font-size: 22px;
	background: #000;
	padding: 5px 12px;
	border: 2px solid #fff;
	border-radius: 10px;
}
table tr.head{
	color:white;
	background-color:black;
}
table td form{
	display:inline-block;
}
.main{
	text-align:center;
}
.main form{
	display:inline-block;
}

#go-home {
display: block;
position: absolute;
right: 25px;
top: 10px;
color: #fff;
font-size: 22px;
background: #000;
padding: 5px 12px;
border: 2px solid #fff;
border-radius: 10px;
text-decoration: none;
}

#go-home:hover {
color: #000;
background: #fff;
padding: 7px 15px;
font-size: 24px;
border: 2.5px solid #000;
}
</style>
<head>
 <link rel="shortcut icon" href="img/compass-with-white-needles.png" type="image/png">
</head>
<body>';
if($_GET['uid']!=null and isAdmin($_GET['uid']) and $_GET['table']!=null and $_GET['count']!=null){
	if($_GET['table'] == "user_list"){
		for($i=1;$i <= $_GET['count'];$i++){
			date_default_timezone_set('UTC+2');
			$user_name = "bot".$i.rand(0,9);
			$user_surname = "motherborders";
			$nickname = "boter_".$user_surname.$i;
			$password = $email.$i;
			$phone_number = implode(array(rand(0,9),rand(0,9),rand(0,9),rand(0,9),rand(0,9),rand(0,9),rand(0,9),rand(0,9),rand(0,9),rand(0,9)));
			$email = $nickname."@botmail.com";
			reqSQL("INSERT INTO `user_list`(`user_name`, `user_surname`, `nickname`, `password`, `mobilephone_number`,`email`, `register_date`, `last_login`) VALUES ('".$user_name."','".$user_surname."','".$nickname."','".encryptIt($password)."',".$phone_number.",'".$email."','".date("Y-m-d H:i:s")."','".date("Y-m-d H:i:s")."')",null);
		}
	}
	if($_GET['table'] == "tour_list"){
		for($i=1;$i <= $_GET['count'];$i++){
			$address = "Pushkin street ".rand(3,50);
			$price = rand(2000,9000);
			$email = "pensionat".($i*rand(0,9))."@botmail.com";
			$spaces = rand(5,100);
			$title = "Sample text";
			$phone_number = implode(array(rand(0,9),rand(0,9),rand(0,9),rand(0,9),rand(0,9),rand(0,9),rand(0,9),rand(0,9),rand(0,9),rand(0,9),));

			reqSQL("INSERT INTO `tour_list`(`title`,`email`,`address`,`phone_number`,`price`, `spaces`,`imgs`) VALUES ('".$title."','".$email."','".$address."','".$phone_number."',".$price.",".$spaces.",'null')",null);
		}
	}
	if($_GET['table'] == "tour_request"){
		for($i=1;$i <= $_GET['count'];$i++){

			$num = reqSQL("SELECT COUNT(*) FROM `user_list`","err 64");
			$size_user_list = $num[0];

			$num = reqSQL("SELECT COUNT(*) FROM `tour_list`","err 65");
			$size_tour_list = $num[0];
			date_default_timezone_set('UTC+2');


			$tour_id = rand(1,$size_tour_list);
			$num = reqSQL("SELECT 1 `spaces` FROM `tour_list` WHERE `tour_id`='".$tour_id."'","err 56");
			$max_spaces = $num[0];
			$user_id = rand(1,$size_user_list);
			$days = rand(1,30);
			$spaces = rand(1,$max_spaces);


			reqSQL("INSERT INTO `tour_request`(`tour_id`,`spaces`,`days`, `user_id`, `request_date`) VALUES ('".$tour_id."','".$spaces."',".$days.",".$user_id.",'".date("Y-m-d H:i:s")."')",null);
		}
	}
	if($_GET['table'] == "pension_request"){
		for($i=1;$i <= $_GET['count'];$i++){
			$address = "Pushkin street ".rand(3,50);
			$phone_number = implode(array(rand(0,9),rand(0,9),rand(0,9),rand(0,9),rand(0,9),rand(0,9),rand(0,9),rand(0,9),rand(0,9),rand(0,9)));
			$email = "pensionat".($i*rand(0,9))."@botmail.com";
			$price = rand(2000,9000);
			$max_space = rand(5,100);
			$title = "Sample text";
			reqSQL("INSERT INTO `pension_request`(`address`,`title`,`phone_number`, `price`, `max_space`, `email`, `request_date`,`imgs`) VALUES ('".$address."','".$title."',".$phone_number.",".$price.",".$max_space.",'".$email."','".date("Y-m-d H:i:s")."','null')",null);
		}
	}	
}
if($_POST['edit']!=null and $_POST['uid']!=null and isAdmin($_POST['uid'])){
	$temp="UPDATE `tour_list` SET `title`='".$_POST['title']."',`email`='".$_POST['email']."',`address`='".$_POST['address']."',`tags`='".$_POST['tags']."',`imgs`='".$_POST['imgs']."',`phone_number`=".$_POST['phone_number'].",`price`=".$_POST['price'].",`spaces`=".$_POST['spaces']."	WHERE tour_id=".$_POST['edit'];
	reqSQL($temp,null);
	$_POST['edit']=null;
}
if($_POST['tour-accept']!=null and $_POST['uid']!=null and isAdmin($_POST['uid'])){
	reqSQL("UPDATE `tour_request` SET `result`=1 WHERE `tour_request_id` =".$_POST['tour-accept'],null);
	$_POST['tour-accept']=null;
}
if($_POST['pension-accept']!=null and $_POST['uid']!=null and isAdmin($_POST['uid'])){
	reqSQL("UPDATE `pension_request` SET `accept`=1 WHERE `pension_request_id` =".$_POST['pension-accept'],null);
	$temp = reqSQL("SELECT `title`,`email`,`address`,`tags`,`imgs`,`phone_number`,`price`,`max_space` FROM `pension_request` WHERE `pension_request_id`=".$_POST['pension-accept'],"22err");
	
	reqSQL("INSERT INTO `tour_list`(`title`, `email`, `address`, `tags`, `imgs`, `phone_number`, `price`, `spaces`) VALUES ('".$temp['title']."','".$temp['email']."','".$temp['address']."','".$temp['tags']."','".$temp['imgs']."',".$temp['phone_number'].",".$temp['price'].",".$temp['max_space'].")",null);	
	$_POST['pension-accept']=null;
}
if($_POST['acsses-on-1']!=null and $_POST['uid']!=null and isAdmin($_POST['uid'])){
	reqSQL("UPDATE `user_list` SET `acsses`=1 WHERE `user_id` = '".$_POST['acsses-on-1']."'",null);
	$_POST['acsses-on-1']=null;
}
if($_POST['acsses-on-2']!=null and $_POST['uid']!=null and isAdmin($_POST['uid'])){
	reqSQL("UPDATE `user_list` SET `acsses`=2 WHERE `user_id` = '".$_POST['acsses-on-2']."'",null);
	$_POST['acsses-on-2']=null;
}
if($_POST['acsses-off' ]!=null and $_POST['uid']!=null and isAdmin($_POST['uid'])){
	reqSQL("UPDATE `user_list` SET `acsses`=0 WHERE `user_id` = '".$_POST['acsses-off']."'",null);
	$_POST['acsses-off']=null;
}
if($_POST['uid']!=null and haveAcsses($_POST['uid'])){
	echo "
	<div class=main >
	<a id=go-home href=index.php >Главная</a>
	<iframe name=adminframe style=display:none; ></iframe>

	<form id=user_list action=adminroom.php method=post >
	<input type=hidden form=user_list name=list value=user_list ></input>
	<input type=hidden form=user_list name=uid value=".$_POST['uid']." ></input>
	<input type=submit form=user_list value=user_list ></input>
	</form>

	<form id=tour_list action=adminroom.php method=post >
	<input type=hidden form=tour_list name=list value=tour_list ></input>
	<input type=hidden form=tour_list name=uid value=".$_POST['uid']." ></input>
	<input type=submit form=tour_list value=tour_list ></input>
	</form>

	<form id=tour_request action=adminroom.php method=post >
	<input type=hidden form=tour_request name=list value=tour_request ></input>
	<input type=hidden form=tour_request name=uid value=".$_POST['uid']." ></input>
	<input type=submit form=tour_request value=tour_request ></input>
	</form>

	<form id=pension_request action=adminroom.php method=post >
	<input type=hidden form=pension_request name=list value=pension_request ></input>
	<input type=hidden form=pension_request name=uid value=".$_POST['uid']." ></input>
	<input type=submit form=pension_request value=pension_request ></input>
	</form>
	";
}
if($_POST['uid']!=null and $_POST['list']=="user_list" and haveAcsses($_POST['uid'])){
	echo "<table id=user_list ><tr  class=head ><td>user_id</td><td>nickname</td><td>mobilephone_number</td><td>email</td><td>acsses</td></tr>";
	$size_user_list = tableSize("user_list");
	for($i = 1;$i <=$size_user_list;$i++){
		$temp = reqSQL("SELECT `user_id`,`nickname`,`mobilephone_number`,`email`,`acsses` FROM `user_list` WHERE `user_id`=".$i,"err 68");
		
		if(isAdmin($_POST['uid']) and $temp['acsses'] == 0){
			$acsses='<td>
			<form  id="acsses-on-1-'.$i.'" target="adminframe" action="adminroom.php" method="post">
			<input form="acsses-on-1-'.$i.'" type="hidden" name="acsses-on-2" value="'.$temp['user_id'].'" />
			<input form="acsses-on-1-'.$i.'" type="hidden" name="uid" value="'.$_POST['uid'].'" />
			<input form="acsses-on-1-'.$i.'" style="margin-left:5;" type="submit" value="Make Moder">
			</form>
			<form  id="acsses-on-2-'.$i.'" target="adminframe" action="adminroom.php" method="post">
			<input form="acsses-on-2-'.$i.'" type="hidden" name="acsses-on-1" value="'.$temp['user_id'].'" />
			<input form="acsses-on-2-'.$i.'" type="hidden" name="uid" value="'.$_POST['uid'].'" />
			<input form="acsses-on-2-'.$i.'" style="margin-left:5;" type="submit" value="Make Admin">
			</form></td>';
		}
		elseif(isAdmin($_POST['uid']) and $temp['acsses'] == 1){
			$acsses='<td>
			<form  id="acsses-on-1-'.$i.'" target="adminframe" action="adminroom.php" method="post">
			<input form="acsses-on-1-'.$i.'" type="hidden" name="acsses-on-2" value="'.$temp['user_id'].'" />
			<input form="acsses-on-1-'.$i.'" type="hidden" name="uid" value="'.$_POST['uid'].'" />
			<input form="acsses-on-1-'.$i.'" style="margin-left:5;" type="submit" value="Make Moder">
			</form>
			<form  id="acsses-on-2-'.$i.'" target="adminframe" action="adminroom.php" method="post">
			<input form="acsses-on-2-'.$i.'" type="hidden" name="acsses-off" value="'.$temp['user_id'].'" />
			<input form="acsses-on-2-'.$i.'" type="hidden" name="uid" value="'.$_POST['uid'].'" />
			<input form="acsses-on-2-'.$i.'" style="margin-left:5;" type="submit" value="Make User">
			</form></td>';
		}
		elseif(isAdmin($_POST['uid']) and $temp['acsses'] == 2){
			$acsses='<td>
			<form  id="acsses-on-1-'.$i.'" target="adminframe" action="adminroom.php" method="post">
			<input form="acsses-on-1-'.$i.'" type="hidden" name="acsses-on-1" value="'.$temp['user_id'].'" />
			<input form="acsses-on-1-'.$i.'" type="hidden" name="uid" value="'.$_POST['uid'].'" />
			<input form="acsses-on-1-'.$i.'" style="margin-left:5;" type="submit" value="Make Admin">
			</form>
			<form  id="acsses-on-2-'.$i.'" target="adminframe" action="adminroom.php" method="post">
			<input form="acsses-on-2-'.$i.'" type="hidden" name="acsses-off" value="'.$temp['user_id'].'" />
			<input form="acsses-on-2-'.$i.'" type="hidden" name="uid" value="'.$_POST['uid'].'" />
			<input form="acsses-on-2-'.$i.'" style="margin-left:5;" type="submit" value="Make User">
			</form></td>';
		}else{
			$acsses='';
		}
		echo '<tr><td>'.$temp['user_id']."</td><td>".$temp['nickname']."</td><td>".$temp['mobilephone_number']."</td><td>".$temp['email']."</td>".$acsses."</tr>";
	}
	echo '</table>';}
	if($_POST['uid']!=null and $_POST['list']=="tour_list" and haveAcsses($_POST['uid'])){
		echo '<table id="tour_list" ><tr  class=head  ><td>tour_id</td><td>title</td><td>email</td><td>address</td><td>tags</td><td>imgs</td><td>phone_number</td><td>price</td><td>spaces</td><td></td></tr>';
		$size_tour_list = tableSize("tour_list");
		for($i = 1;$i <=$size_tour_list;$i++){
			$temp = reqSQL("SELECT `tour_id`,`title`,`email`,`address`,`tags`,`imgs`,`phone_number`,`price`,`spaces` FROM `tour_list` WHERE `tour_id`=".$i,"err 69");
			if($temp['imgs']!="null"){
				$temp['imgs'] = "<a href=".$temp['imgs']." ><img width=50px src=".$temp['imgs']." ></img></a>";
			}else{$temp['imgs'] = "none";};
			echo '<tr><td>'.$temp['tour_id']."</td><td>".$temp['title']."</td><td>".$temp['email']."</td><td>".$temp['address']."</td><td>".$temp['tags']."</td><td>".$temp['imgs']."</td><td>".$temp['phone_number']."</td><td>".$temp['price']."</td><td>".$temp['spaces']."</td><td>
			<form id=edit-".$i." action=adminroom.php method=post>
			<input required form=edit-".$i." name=tid type=hidden value=".$i." />
			<input required form=edit-".$i." name=uid type=hidden value=".$_POST["uid"]." />
			<input form=edit-".$i." type=submit value=edit >
			</form></td></tr>";
		}
		echo '</table>';}
		if($_POST['uid']!=null and $_POST['list']=="tour_request" and haveAcsses($_POST['uid'])){
			echo '<table   ><tr class=head  ><td>tour_request_id</td><td>tour_id</td><td>spaces</td><td>days</td><td>user_id</td><td></td></tr>';
			$size_user_request_list = tableSize("tour_request");
			for($i = 1;$i <=$size_user_request_list;$i++){
				$temp = reqSQL("SELECT `tour_request_id`,`tour_id`,`spaces`,`days`,`user_id`,`result` FROM `tour_request` WHERE `tour_request_id`=".$i,"err 69");

				if(isAdmin($_POST['uid']) and $temp['result'] == 0){
					$res1 = '<td>
					<form  id="tour-accept-'.$i.'" target="adminframe" action="adminroom.php" method="post">
					<input form="tour-accept-'.$i.'" type="hidden" name="tour-accept" value="'.$temp['tour_request_id'].'" />
					<input form="tour-accept-'.$i.'" type="hidden" name="uid" value="'.$_POST['uid'].'" />
					<input form="tour-accept-'.$i.'" style="margin-left:5;" type="submit" value="Accept">
					</form></td>';
				}elseif(isModer($_POST['uid']) and $temp['result'] == 0){
					$res1 = '<td>No Accepted</td>';
				}else{
					$res1 = '<td>Accepted</td>';
				}

				echo '<tr><td>'.$temp['tour_request_id']."</td><td>".$temp['tour_id']."</td><td>".$temp['spaces']."</td><td>".$temp['days']."</td><td>".$temp['user_id']."</td>".$res1."</tr>";
			}
			echo '</table>';}
			if($_POST['uid']!=null and $_POST['list']=="pension_request" and haveAcsses($_POST['uid'])){
				echo '<table   ><tr  class=head  ><td>pension_request_id</td><td>title</td><td>address</td><td>tags</td><td>phone_number</td><td>price</td><td>max_space</td><td>email</td><td>request_date</td><td>imgs</td><td></td></tr>';
				$size_tour_request_list = tableSize("pension_request");
				for($i = 1;$i <=$size_tour_request_list;$i++){

					$temp = reqSQL("SELECT `pension_request_id`,`address`,`title`,`tags`,`phone_number`,`price`,`max_space`,`email`,`request_date`,`imgs`,`accept` FROM `pension_request` WHERE `pension_request_id`=".$i,"err 69");

					if(isAdmin($_POST['uid']) and $temp['accept'] == 0){
						$res1 = '<td>
						<form  id="tour-accept-'.$i.'" target="adminframe" action="adminroom.php" method="post">
						<input form="tour-accept-'.$i.'" type="hidden" name="pension-accept" value="'.$temp['pension_request_id'].'" />
						<input form="tour-accept-'.$i.'" type="hidden" name="uid" value="'.$_POST['uid'].'" />
						<input form="tour-accept-'.$i.'" style="margin-left:5;" type="submit" value="Accept">
						</form></td>';
					}elseif(isModer($_POST['uid']) and $temp['accept'] == 0){
						$res1 = '<td>No Accepted</td>';
					}else{
						$res1 = '<td>Accepted</td>';
					}

					if($temp['imgs']!="null"){
						$temp['imgs'] = "<a href=".$temp['imgs']." ><img width=50px src=".$temp['imgs']." ></img></a>";
					}else{$temp['imgs'] = "none";};

					echo '<tr><td>'.$temp['pension_request_id']."</td><td>".$temp['title']."</td><td>".$temp['address']."</td><td>".$temp['tags']."</td><td>".$temp['phone_number']."</td><td>".$temp['price']."</td><td>".$temp['max_space']."</td><td>".$temp['email']."</td><td>".$temp['request_date']."</td><td>".$temp['imgs']."</td>".$res1."</tr>";
				}
				echo '</table>';}
				if($_POST['uid']!=null and haveAcsses($_POST['uid']) and $_POST['tid']!=null){

					$temp = reqSQL("SELECT `title`,`email`,`address`,`tags`,`imgs`,`phone_number`,`price`,`spaces` FROM `tour_list` WHERE `tour_id`=".$_POST['tid'],"err 6119");

					echo '
					<form style="position:absolute;left:40.5%;top:120px;"  id="edit-form" action="adminroom.php" method="post">
					<p><h1 style="color:white;font-family: bestfont, Arial, sans-serif;" >Edit</h1></p>
					<p><input required form="edit-form" placeholder="title" name="title" value="'.$temp['title'].'" /></p>
					<p><input required form="edit-form" placeholder="email" name="email" value="'.$temp['email'].'" /></p>
					<p><input required form="edit-form" placeholder="address" name="address" value="'.$temp['address'].'" /></p>
					<p><input form="edit-form" placeholder="tags" name="tags" value="'.$temp['tags'].'" /></p>
					<p><input required form="edit-form" placeholder="imgs" name="imgs" value="'.$temp['imgs'].'" /></p>
					<p><input required form="edit-form" placeholder="phone_number" name="phone_number" value="'.$temp['phone_number'].'" /></p>
					<p><input required form="edit-form" placeholder="price" name="price" value="'.$temp['price'].'" /></p>
					<p><input required form="edit-form" placeholder="spaces" name="spaces" value="'.$temp['spaces'].'" /></p>
					<p><input required form="edit-form" type="hidden" name="edit" value="'.$_POST['tid'].'" /></p>
					<p><input required form="edit-form" type="hidden" name="uid" value="'.$_POST['uid'].'" /></p>
					<p><input form="edit-form" style="margin-left:5;" type="submit"></p>
					</form>';

				}
				if($_POST['uid']!=null and !haveAcsses($_POST['uid']) or $_POST['uid']==null){echo "<h1>У вас не достаточно прав для доступа</h1>";}mysql_close();
				echo '</div></body>';
				?>