<?php   
if(isset($_SESSION['user_data']))    
        $profilemenu = 'style="display:none;"'; 
    else  
        $profilemenu =  'style="display:block;"';
		
if(isset($_SESSION['user_data']))    
        $profilemenu2 = 'style="display:block;"'; 
    else  
        $profilemenu2 =  'style="daaisplay:none;"';
  


$tpl = getTpl('main/diseases');
$tpl2 = getTpl('main/news');
$tpl3 = getTpl('main/products');
$tpl4= getTpl('main/slide');

$products = '';
$main_diseases = '';
$mnews = '';
$slider = '';


$res = mysqlQuery("SELECT `id`, `public`, `rutitle`, `rotitle`, SUBSTRING_INDEX(`" . $GET['lang']  . "content`,' ','30') AS `" . $GET['lang']  . "content`
	              FROM `seeds_disease` WHERE  `public` = 1  ");   
	 
if(mysql_num_rows($res) > 0)
                          {
                     while ($row = mysql_fetch_assoc($res))
                            {
		                       $row['title'] = htmlspecialchars($row[''. $GET['lang']  . 'title']);
		                       $row['content'] = ($row[''. $GET['lang']  . 'content']);
							   $row['url'] = href('page=seeds-disease','news=' . $row['id']);
                               $main_diseases .= parseTpl($tpl, $row);
							}
			  
                          }
		 
                        else
                          {
                                $main_diseases = DEXIST_A;
                          }



$res = mysqlQuery("SELECT `id` ,`public`, `".$GET["lang"]."title` as `title`, `cat` FROM `rightmenu` WHERE `public` = 1");   
	 
if(mysql_num_rows($res) > 0)
                          {
                     while ($row = mysql_fetch_assoc($res))
                            {

                             $res1 = mysqlQuery("SELECT `cat` FROM `articles` WHERE `cat` = '".$row['cat']."' AND `public` = 1");   
                             $row1 = mysql_fetch_assoc($res1);
                  
		               $row['title'] = '<a href="/'.$GET["lang"].'/articles/read/'.$row1['cat'].'">'.htmlspecialchars($row['title']).'</a>';
                               $products .= parseTpl($tpl3, $row);
							}
			  
                          }
		 
                        else
                          {
                                $products = DEXIST_A;
                          }

$res = mysqlQuery("SELECT `".$GET["lang"]."title` as `title`,`category` as `cat`,`slide_img` as `img` FROM `seeds` WHERE `public` = 1 AND `slide_img` !='' ORDER BY rand()");   
	 
if(mysql_num_rows($res) > 0)
                          {
                     while ($row = mysql_fetch_assoc($res))
                            {

                               $row['title'] = htmlspecialchars($row['title']);
                               $row["url"] = '/'.$GET["lang"].'/all-seeds/read/'.$row['cat'];
                               $row['img'] = $row['img'];
                               
                               $slider .= parseTpl($tpl4, $row);
							}
			  
                          }
		 
                        else
                          {
                                $products = DEXIST_A;
                          }
				
						  
						  

$res = mysqlQuery("SELECT `id`, `public`, `rutitle`, `rotitle`, SUBSTRING_INDEX(`" . $GET['lang']  . "desc`,' ','30') AS `" . $GET['lang']  . "desc`
	              FROM `news` WHERE  `public` = 1  ");   
	 
if(mysql_num_rows($res) > 0)
                          {
                     while ($row = mysql_fetch_assoc($res))
                            {
		                       $row['title'] = htmlspecialchars($row[''. $GET['lang']  . 'title']);
		                       $row['content'] = ($row[''. $GET['lang']  . 'desc']);
							   $row['url'] = href('page=news','news=' . $row['id']);
                               $mnews .= parseTpl($tpl2, $row);
							}
			  
                          }
		 
                        else
                          {
                                $mnews = DEXIST_A;
                          }	
		 
