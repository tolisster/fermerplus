<?php   
    if(!defined('IRB_KEY'))
    {
       header("HTTP/1.1 404 Not Found");      
       exit(file_get_contents('../../404.html'));
    } 
//////////////////////////////////////////////////////////
 
include './libs/mysql.php'; 
include './bbcode/irb_bbdecoder.php';


	
	$tpl = getTpl('about/row');
	$info = '';

            $res = mysqlQuery("SELECT 
	                               `id`, 
	                               `public`,
	                               `rutitle`,
								   `entitle`,
								   `page`,
	                               `" . $GET['lang']  . "desc`
	
	                                 FROM `pages` WHERE  `public` = 1 AND `page` = '". $GET['page'] ."'  ");   
	 
                   
                       if(mysql_num_rows($res) > 0)
                          {
                               while ($row = mysql_fetch_assoc($res))
                                  {
		                              $row['title'] = htmlspecialchars($row[''. $GET['lang']  . 'title']);
		                              $row['content'] = ($row[''. $GET['lang']  . 'desc']);
      
                                      $info = parseTpl($tpl, $row);
									  
									  
                          
									  
									  
									  
									  
                                  }
			  
                          }
		 
                        else
                          {
                                $info = DEXIST_A;
                          }
 
 
 

