<?php    

/** 
* Newsroom Admin (Controller) 
* Блок новостей. Админка.(контроллер) 
* @author IT studio IRBIS-team 
* @copyright © 2009 IRBIS-team 
*/
/////////////////////////////////////////////////////////

/**
* Generation of page of an error at access out of system
* Генерация страницы ошибки при доступе вне системы
*/
    if(!defined('IRB_KEY'))
    {
	
       header("HTTP/1.1 404 Not Found");      
       exit(file_get_contents('../../404.html'));
    } 
//////////////////////////////////////////////////////////

/**
* We connect a file of the MySQL functions
* Подключаем файл функций MySQL
*/  
   include IRB_ROOT .'/libs/mysql.php';
   
   
   

error_reporting(0);

$change="";
$abc="";


 define ("MAX_SIZE","1000");
 function getExtension($str) {
         $i = strrpos($str,".");
         if (!$i) { return ""; }
         $l = strlen($str) - $i;
         $ext = substr($str,$i+1,$l);
         return $ext;
 }

 $errors=0;
  
 if($_SERVER["REQUEST_METHOD"] == "POST")
 {
 	$image =$_FILES["file"]["name"];


	
	
	
	$uploadedfile = $_FILES['file']['tmp_name'];
     
 
 	if ($image) 
 	{
 	
 		$filename = time().'.'.stripslashes($_FILES['file']['name']);
		
		
 	
  		$extension = getExtension($filename);
 		$extension = strtolower($extension);
		
		
 if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif")) 
 		{
		
 $change='<span class="msg_span">Format ne cunoscut</span> ';
 			$errors=1;
 		}
 		else
 		{

 $size=filesize($_FILES['file']['tmp_name']);


if ($size > MAX_SIZE*1024)
{
	$change='<div class="msgdiv">You have exceeded the size limit!</div> ';
	$errors=1;
}

$image_name=time().'.'.$extension;
$newname="images/".$image_name;

if($extension=="jpg" || $extension=="jpeg" )
{
$uploadedfile = $_FILES['file']['tmp_name'];
$src = imagecreatefromjpeg($uploadedfile);

}
else if($extension=="png")
{
$uploadedfile = $_FILES['file']['tmp_name'];
$src = imagecreatefrompng($uploadedfile);

}
else 
{
$src = imagecreatefromgif($uploadedfile);
}

echo $scr;

list($width,$height)=getimagesize($uploadedfile);


$newwidth=800;
$newheight=($height/$width)*$newwidth;
$tmp=imagecreatetruecolor($newwidth,$newheight);


$newwidth1=200;
$newheight1=($height/$width)*$newwidth1;
$tmp1=imagecreatetruecolor($newwidth1,$newheight1);


$newwidth2=100;
$newheight2=($height/$width)*$newwidth2;
$tmp2=imagecreatetruecolor($newwidth2,$newheight2);



imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$width,$height);

imagecopyresampled($tmp1,$src,0,0,0,0,$newwidth1,$newheight1,$width,$height);

imagecopyresampled($tmp2,$src,0,0,0,0,$newwidth2,$newheight2,$width,$height);






$filename = "../uploads/big/". $_FILES['file']['name']; 

$filename1 = "../uploads/". $_FILES['file']['name'];

$filename2 = "../uploads/small/". $_FILES['file']['name'];

$fname =  $_FILES['file']['name'];



imagejpeg($tmp,$filename,100);

imagejpeg($tmp1,$filename1,100);

imagejpeg($tmp2,$filename2,100);

imagedestroy($src);
imagedestroy($tmp);
imagedestroy($tmp1);
imagedestroy($tmp2);
}}

}

//If no errors registred, print the success message
 if(isset($_POST['Submit']) && !$errors) 
 {
 
   // mysql_query("update {$prefix}users set img='$big',img_small='$small' where user_id='$user'");
 	$change='
	
	<div class="upload_result">
Можете использовать ссылку: <input size="40" value="'. $fname .'"/><img style="margin-left:20px;" width="16" src="/skins/images/admin/led_green.gif">
</div>
	
	
	
	';
 }
 