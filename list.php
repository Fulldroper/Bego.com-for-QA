<?
include'bd.php';
include'lib.php';
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
		
	</div>
</div></br>";
}
echo '</div></body>';
mysql_close();
?>