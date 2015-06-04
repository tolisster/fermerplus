<?php   
    if(!defined('IRB_KEY'))
    {
       header("HTTP/1.1 404 Not Found");      
       exit(file_get_contents('../../404.html'));
    } 
//////////////////////////////////////////////////////////
 
include './libs/mysql.php'; 
include './bbcode/irb_bbdecoder.php';
   
  
   if(!empty($_SERVER['HTTP_REFERER']) 
	    && trim($_SERVER['HTTP_REFERER'], '/') !== trim(IRB_HOST, '/') 
	    && strpos($_SERVER['HTTP_REFERER'], 'main') === true)
	{
        $GET['news'] = 'all';
    }	


	$tpl = getTpl('fertilizers-products/row');
    $products = '';
    
 
	
            $res = mysqlQuery("SELECT 
	                               `id`, 
	                               `public`,
	                               `images`,
	                               `rutitle`,
								   `entitle`,
								   `rudesc`,
								   `endesc`,
								   `mneto`,
								   `price`
								   	
	                FROM `fertilizers_products` WHERE  `public` = 1  ORDER BY `id` DESC ");   
	 
                          
                       if(mysql_num_rows($res) > 0)
                          {
                               while ($row = mysql_fetch_assoc($res))
                                  {
		                              $row['title'] = htmlspecialchars($row[''. $GET['lang']  . 'title']);
		                              $row['desc'] = ($row[''. $GET['lang']  . 'desc']);
									  $row['desc'] = ($row[''. $GET['lang']  . 'desc']);
                                      $row['url'] = href('news=' . $row['id']);
                                      $products .= parseTpl($tpl, $row);
									  
			
									  
									  
									  
									  
                                  }
			  
                          }
		 
                        else
                          {
                                $products = DEXIST_A;
                          }
						  


	  
	  

				
				


    
	 

	
      
  if ( $GET['news']  == 'all')  {  $page_title = FERTILIZERS_PRODUCTS; }    else  {  $page_title = FERTILIZERS_PRODUCTS; } ;
//   $title = '' . MAIN_TITLE . ' - ' . TITLE_ABOUT . '' ;  