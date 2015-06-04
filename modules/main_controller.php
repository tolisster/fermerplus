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
	$news = '';

            $res = mysqlQuery("SELECT 
	                               `id`, 
	                               `public`,
	                               `rutitle`,
								   `entitle`,
								   `cat`,
								   `image`,
	                                SUBSTRING_INDEX(`" . $GET['lang']  . "desc`,' ','40') AS `" . $GET['lang']  . "desc`
	
	                                 FROM `news` WHERE  `public` = 1   ORDER BY `id` DESC ");   
	 
                   
                       if(mysql_num_rows($res) > 0)
                          {
                               while ($row = mysql_fetch_assoc($res))
                                  {
		                              $row['title'] = htmlspecialchars($row[''. $GET['lang']  . 'title']);
		                              $row['content'] = ($row[''. $GET['lang']  . 'desc']. '....');
                                      $row['url'] = href('page=news','news=' . $row['id']);
                                      $news .= parseTpl($tpl, $row);
									  
									  
                          
									  
									  
									  
									  
                                  }
			  
                          }
		 
                        else
                          {
                                $news = DEXIST_A;
                          }
 
 
 

