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

    $tpl  = getTpl('fertilizers/row');
    $fertilizer = '';
    
	
                        $res = mysqlQuery("SELECT 
	                               `id`, 
	                               `public`,
	                               `rutitle`,
	                               `entitle`,
	                               `rucontent`,	
								   `encontent`
	                                
									FROM `fertilizers` WHERE `public` = 1 ORDER BY `id` DESC ");   
	 
                         
                       if(mysql_num_rows($res) > 0)
                          {
                               while ($row = mysql_fetch_assoc($res))
                                  {
		                              $row['title'] = htmlspecialchars($row[''. $GET['lang']  . 'title']);
		                              $row['content'] = ($row[''. $GET['lang']  . 'content']);
                                      $fertilizer .= parseTpl($tpl, $row);
                                  }
			  
                          }
		 
                        else
                          {
                                $fertilizer = DEXIST_A;
                          }

  
	  

	
      
  if ( $GET['news']  == 'all')  {  $page_title = FERTILIZERS; }    else  {  $page_title = FERTILIZERS; } ;
//   $title = '' . MAIN_TITLE . ' - ' . TITLE_ABOUT . '' ;  