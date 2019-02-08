<?
function selectBD($bd,$host,$username,$pass){
 $link = mysql_connect($host, $username, $pass);if (!$link) {die('oшибка соединени¤: ' . mysql_error());}mysql_select_db($bd) or die('Не удалось выбрать базу данных selectBD('.$bd.')');}
function encryptIt( $q ) {
    $cryptKey  = 'qJB0rGtIn5UB1xG03efyCp';
    $qEncoded      = base64_encode( mcrypt_encrypt( MCRYPT_RIJNDAEL_256, md5( $cryptKey ), $q, MCRYPT_MODE_CBC, md5( md5( $cryptKey ) ) ) );
    return( $qEncoded );
}
function decryptIt( $q ) {
    $cryptKey  = 'qJB0rGtIn5UB1xG03efyCp';
    $qDecoded      = rtrim( mcrypt_decrypt( MCRYPT_RIJNDAEL_256, md5( $cryptKey ), base64_decode( $q ), MCRYPT_MODE_CBC, md5( md5( $cryptKey ) ) ), "\0");
    return( $qDecoded );
}
function reqSQL($string,$err){
	if($string != null){
		$result = mysql_query($string) or die($err.mysql_error());
		if($err != null){
			$line = mysql_fetch_array($result, MYSQL_BOTH);
			return $line;
		}
	}else{return "lib.reqSQL:empty args";}
}
function isAdmin($id){
	$line = reqSQL("SELECT `acsses` FROM `user_list` WHERE `user_id`=".$id,"err 785");
	if($line['acsses'] == 1){return true;}else{return false;}
}
function isModer($id){
	$line = reqSQL("SELECT `acsses` FROM `user_list` WHERE `user_id`=".$id,"err 785");
	if($line['acsses'] == 2){return true;}else{return false;}
}
function haveAcsses($id){
	$line = reqSQL("SELECT `acsses` FROM `user_list` WHERE `user_id`=".$id,"err 785");
	if($line['acsses'] == 2 or $line['acsses'] == 1){return true;}else{return false;}
}
function updateOnline($uid){
	date_default_timezone_set('UTC+2');
	reqSQL("UPDATE `user_list` SET `last_login`='".date("Y-m-d H:i:s")."' WHERE `user_id` = '".$uid."'",null);
}
function tableSize($string){
	$num = reqSQL("SELECT COUNT(*) FROM `".$string."`","err 64");
	return $num[0];
}
?>