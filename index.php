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


  $fermer = array('main','about','services','contacts','seeds','all-seeds','seeds-disease','seeds-biology','fertilizers','all-fertilizers','fertilizers-products','peat','news','pellicle','articles','contacts','search');
        
           
  if(!in_array($page,$fermer)) { include './modules/main/router.php'; break;}
        
    foreach($fermer as $ferm)  {  
           
  if($page == $ferm){
   		 
             include './modules/'.$ferm.'_controller.php';
             include './modules/engine.php';
             include './modules/'.$ferm.'/router.php';  
             break;
    
 }
}
 
  $content = ob_get_contents();  
  
    ob_end_clean();

	
	include './skins/tpl/index.tpl';
 
   
