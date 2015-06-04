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


	$tpl = getTpl('all-seeds/row');
	$tpl2  = getTpl('all-seeds/fullrow');
    $allseeds = '';
	$blablabla = '';
	$category_title = '';
    

	if(is_numeric($GET['news']))
	{
       $res = mysqlQuery("SELECT 
	           `id`, 
	           `public`,
	           `category`,
			   `images`,
	           `" . $GET['lang']  . "title`,
	           `" . $GET['lang']  . "desc`
  	           
			   FROM `seeds`  WHERE `public` = 1 AND `category` = " . (int)$GET['sel'] ."    AND `id` = " . (int)$GET['news']);
   
               if (mysql_num_rows($res) > 0)
                       {
                             $row = mysql_fetch_assoc($res);
           
		                              $row['title'] = htmlspecialchars($row[''. $GET['lang']  . 'title']);
		                              $row['content'] = ($row[''. $GET['lang']  . 'desc']);
									  $blablabla = htmlspecialchars($row['category']);
						  
			                 $page_menu = ''; 
                             $allseeds = parseTpl($tpl2, $row);
							 
							 
							 
							 
							 

                       }
               else
                       {
                             header("HTTP/1.1 404 Not Found");
                             exit(file_get_contents(IRB_ROOT . '/404.html'));
                       } 

    }
	else
	{	 
	    
	   include './libs/irb_paginator.php';   
       $paginator = new IRB_Paginator($GET['num'], IRB_NUM_POSTS);  
	
            $res = $paginator -> countQuery("SELECT 
	                               `id`, 
	                               `public`,
	                               `category`,
								   `images`,
	                               `rutitle`,
								   `entitle`,
	                                SUBSTRING_INDEX(`" . $GET['lang']  . "desc`,' ','40') AS `" . $GET['lang']  . "desc`
	
	                                 FROM `seeds` WHERE  `public` = 1 AND `category` = '". $GET['sel']  ."'  ORDER BY `id` DESC ");   
	 
                $page_menu = $paginator -> createMenu();                    
                       if(mysql_num_rows($res) > 0)
                          {
                               while ($row = mysql_fetch_assoc($res))
                                  {
		                              $row['title'] = htmlspecialchars($row[''. $GET['lang']  . 'title']);
		                              $row['content'] = ($row[''. $GET['lang']  . 'desc']. '....');
                                      $row['url'] = href('news=' . $row['id']);
                                      $allseeds .= parseTpl($tpl, $row);
									  
									  
                                      $blablabla = htmlspecialchars($row['category']);
									  
									  
									  
									  
                                  }
			  
                          }
		 
                        else
                          {
                                $allseeds = DEXIST_A;
                          }
						  
						  
						  
						  

      }
	  

	  
	  
	  
	  

						 
				
				
				$res = mysqlQuery ("SELECT  `id` , `". $GET['lang']  ."title`,maincat
                                    FROM `seeds_subcats` WHERE `id` = '". $blablabla  ."'");   
	 
                 if(mysql_num_rows($res) > 0)
                          {
                               while ($row = mysql_fetch_assoc($res))
                                  {
		                              $subcat_title = ( RQAT .' '.  $row[''. $GET['lang']  . 'title']);
									  $maincategory = $row['maincat'];
									               
												   
												   
$res = mysqlQuery ("SELECT  `id` , `". $GET['lang']  ."title` FROM `seeds_cats` WHERE `id` = '".  $maincategory  ."'    ");   
                 
				 if(mysql_num_rows($res) > 0)
                          {
                                 while ($row = mysql_fetch_assoc($res))
                                 {
		                         $category_title = ( RQAT .' '.  $row[''. $GET['lang']  . 'title']);
						         

                                 }
                         }
		         else
                         {
                               $category_title = '';
                         }
									  
							
							
							
							
							
                                  }
                         }
		         else
                         {
                               $subcat_title = '';
                         }
						 
						 

						 


    
	 

	
      
  if ( $GET['news']  == 'all')  {  $page_title = SEEDS .' '. $category_title .' '. $subcat_title; }    else  {  $page_title = SEEDS .' '. $category_title .' '. $subcat_title; } ;
//   $title = '' . MAIN_TITLE . ' - ' . TITLE_ABOUT . '' ;  