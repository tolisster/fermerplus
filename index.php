<?php  
/**  
* @author Grigorii Simion
* @copyright © 2011 Grigorii Simion
*/ 



    header("Content-Type: text/html; charset=utf-8"); 
    error_reporting(E_ALL); 
 
    ob_start();     
    session_start();
	

   define('IRB_TRACE', true);    
   include './debug.php'; 
   

   define('IRB_KEY', true); 


    include './config.php'; 
	
    include './variables.php'; 

  
    include './libs/default.php'; 
    
  
    include './libs/view.php';
	
	
		if($GET['lang'] && file_exists('./language/'. $GET['lang'] .'.php'))
        include './language/'. $GET['lang']  .'.php';
    else
	{
       header("HTTP/1.1 404 Not Found");      
       exit(file_get_contents('./404.html'));	
	}
	
   $page = $GET['page'];


  $fermer = array('main'=>'main','about'=>'about','services'=>'services','contacts'=>'contacts','seeds'=>'seeds','all-seeds'=>'all-seeds','seeds-disease'=>'seeds-disease','seeds-biology'=>'seeds-biology','fertilizers'=>'fertilizers','all-fertilizers'=>'all-fertilizers','fertilizers-products'=>'fertilizers-products','peat'=>'peat','news'=>'news','pellicle'=>'pellicle','articles'=>'articles','contacts'=>'contacts','search'=>'search');

if(in_array("main",$fermer)) $isPage = $page; else $isPage = 'none';  
           
require_once("./modules/router_controller.php");

$router = new Router();
$router->readPages($isPage); 
 
  $content = ob_get_contents();  
  
    ob_end_clean();

	
	include './skins/tpl/index.tpl';
 
   
