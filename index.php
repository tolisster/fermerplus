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
        
      
    switch($GET['page'])  
    {  
        case 'main':
		include './modules/main_controller.php';
		include './modules/engine.php';
		include './modules/main/router.php';
        break;
		
		
		case 'about':
		include './modules/about_controller.php';
		include './modules/engine.php';
		include './modules/about/router.php';
        break;
		
		case 'services':
		include './modules/services_controller.php';
		include './modules/engine.php';
		include './modules/services/router.php';
        break;
		
		case 'contacts':
		include './modules/contacts_controller.php';
		include './modules/engine.php';
		include './modules/contacts/router.php';
        break;
		
		case 'seeds':
		 include './modules/seeds_controller.php';
		
			  include './modules/engine.php';
			 
			  include './modules/seeds/router.php';  
        break;
     
	 	case 'all-seeds':
		include './modules/all-seeds_controller.php';
			  include './modules/engine.php';
			  
			  include './modules/all-seeds/router.php';  
        break;
		
		case 'seeds-disease':
		include './modules/seeds-disease_controller.php';
		include './modules/engine.php';
		include './modules/seeds-disease/router.php';  
        break;
		
		case 'seeds-biology':
		 include './modules/seeds-biology_controller.php';
	     include './modules/engine.php';
		 include './modules/seeds-biology/router.php';  
        break;
		
		case 'fertilizers':
		      include './modules/fertilizers_controller.php';
			  include './modules/engine.php';
			  include './modules/fertilizers/router.php';  
        break;
		
		case 'all-fertilizers':
			  include './modules/all-fertilizers_controller.php';
			  include './modules/engine.php';

			  include './modules/all-fertilizers/router.php';  
        break;
		
		case 'fertilizers-products':
		include './modules/fertilizers-products_controller.php';
			  include './modules/engine.php';
			  
			  include './modules/fertilizers-products/router.php';  
        break;
		
		case 'peat':
		 include './modules/peat_controller.php';
			  include './modules/engine.php';
			 
			  include './modules/peat/router.php';  
        break;
		
		
		
		case 'news':
			 
			  include './modules/news_controller.php';
			   include './modules/engine.php';
			  include './modules/news/router.php';  
        break;
		
		
		
		
		case 'pellicle':
		include './modules/pellicle_controller.php';
			  include './modules/engine.php';
			  
			  include './modules/pellicle/router.php';  
        break;
		
		case 'articles':
		 include './modules/articles_controller.php';
			  include './modules/engine.php';
			 
			  include './modules/articles/router.php';  
        break;
		
		
		case 'contacts':
		include './modules/contacts_controller.php';
			  include './modules/engine.php';
			  
			  include './modules/contacts/router.php';  
              
        break;
		
		
		case 'search':
		      include './modules/search_controller.php';
			  include './modules/engine.php';
              include './modules/search/router.php';  
        break;
		


		



     default: 
           include './modules/main/router.php';  
        break;     
    }          
           
    $content = ob_get_contents();    
    ob_end_clean();
	
	include './skins/tpl/index.tpl';
 
   