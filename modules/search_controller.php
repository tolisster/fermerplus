<?php   
    if(!defined('IRB_KEY'))
    {
       header("HTTP/1.1 404 Not Found");      
       exit(file_get_contents('../../404.html'));
    } 
//////////////////////////////////////////////////////////
 
include './libs/mysql.php'; 
include './bbcode/irb_bbdecoder.php';


if($ok) 

   if(!empty($_SERVER['HTTP_REFERER']) 
	    && trim($_SERVER['HTTP_REFERER'], '/') !== trim(IRB_HOST, '/') 
	    && strpos($_SERVER['HTTP_REFERER'], 'main') === true)
	{
        $GET['news'] = 'all';
    }	
	
	
	$tpl = getTpl('search/row');
	$search = '';
	$search2 = '';

    $res = mysqlQuery("SELECT `id`,`public`,`category`,`rutitle` FROM `seeds` WHERE `public` = 1 
					                   AND  rutitle LIKE '%". escapeString($POST['value1']) ."%'   ORDER BY `id` DESC ");   
	 
                   
                       if(mysql_num_rows($res) > 0)
                          {
                               while ($row = mysql_fetch_assoc($res))
                                  {
		                              $row['title'] = htmlspecialchars($row[''. $GET['lang']  . 'title']);
                                      $row['url'] = href('page=all-seeds','rem=read','sel=' . $row['category'],'news=' . $row['id']);
                                      
									  
									  $search .=  parseTpl($tpl, $row);
									  
									  
                          
									  
									  
									  
									  
                                  }
			  
                          }
		 
                        else
                          {
                                $search = DEXIST_A;
                          }
						  
						  
						  
						  
						      $res = mysqlQuery("SELECT `id`,`public`,`rutitle` FROM `seeds_disease` WHERE `public` = 1 
					                   AND  rutitle LIKE '%". escapeString($POST['value1']) ."%'   ORDER BY `id` DESC ");   
	 
                   
                       if(mysql_num_rows($res) > 0)
                          {
                               while ($row = mysql_fetch_assoc($res))
                                  {
		                              $row['title'] = htmlspecialchars($row[''. $GET['lang']  . 'title']);
                                      $row['url'] = href('page=seeds-disease','rem=read','news=' . $row['id']);
                                      
									  
									  $search2 .=  parseTpl($tpl, $row);
									  
									  
                          
									  
									  
									  
									  
                                  }
			  
                          }
		 
                        else
                          {
                                $search2 = DEXIST_A;
                          }
 
 
 

