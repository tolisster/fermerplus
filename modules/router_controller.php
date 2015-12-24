<?php 
    if(!defined('IRB_KEY')) {header("HTTP/1.1 404 Not Found");  exit(file_get_contents('../../404.html'));}    

class Router {
  
  public function readPages($isPage){
    
    global $GET;
    
    if($isPage != 'none'){
      
     $pageInArray = $isPage;
      
      $POST = htmlChars($POST); 
      
      include './modules/'.$pageInArray .'_controller.php';
      include './skins/tpl/'.$pageInArray .'/show.tpl';
    }
    else
	{
       header("HTTP/1.1 404 Not Found");      
       exit(file_get_contents('./404.html'));	
	}
    
    return $pageInArray;
  }
  
 
}

