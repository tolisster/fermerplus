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


	$tpl = getTpl('news/row');
	$tpl2  = getTpl('news/fullrow');
    $news = '';
	$blablabla = '';
    

	if(is_numeric($GET['news']))
	{
       $res = mysqlQuery("SELECT 
	           `id`, 
	           `public`,
			   `cat`,
			   `image`,
	           `" . $GET['lang']  . "title`,
	           `" . $GET['lang']  . "desc`
  	           
			   FROM `news`  WHERE `public` = 1  AND `id` = " . (int)$GET['news']);
   
               if (mysql_num_rows($res) > 0)
                       {
                             $row = mysql_fetch_assoc($res);
             
		                              $row['title'] = htmlspecialchars($row[''. $GET['lang']  . 'title']);
                                      $row['image'] = htmlspecialchars($row['image']);
		                              $row['content'] = ($row[''. $GET['lang']  . 'desc']);
									
						  
			                 $page_menu = ''; 
                             $news = parseTpl($tpl2, $row);
							 
							 
							 
							 
							 

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
       $paginator = new IRB_Paginator($GET['num'], 50);  
	
            $res = $paginator -> countQuery("SELECT 
	                               `id`, 
	                               `public`,
	                               `rutitle`,
								   `entitle`,
								   `cat`,
								   `image`,
	                                SUBSTRING_INDEX(`" . $GET['lang']  . "desc`,' ','40') AS `" . $GET['lang']  . "desc`
	
	                                 FROM `news` WHERE  `public` = 1   ORDER BY `id` DESC ");   
	 
                $page_menu = $paginator -> createMenu();                    
                       if(mysql_num_rows($res) > 0)
                          {
                               while ($row = mysql_fetch_assoc($res))
                                  {
		                              $row['title'] = htmlspecialchars($row[''. $GET['lang']  . 'title']);
		                              $row['content'] = ($row[''. $GET['lang']  . 'desc']. '....');
                                      $row['url'] = href('news=' . $row['id']);
                                      $news .= parseTpl($tpl, $row);
									  
									  
                          
									  
									  
									  
									  
                                  }
			  
                          }
		 
                        else
                          {
                                $news = DEXIST_A;
                          }
						  
						  
						  
						  

      }
	  

	  
	  
	  
	
				
				

						 


    
	 

	
      
  if ( $GET['news']  == 'all')  {  $page_title = FERTILIZERS; }    else  {  $page_title = FERTILIZERS; } ;
//   $title = '' . MAIN_TITLE . ' - ' . TITLE_ABOUT . '' ;  