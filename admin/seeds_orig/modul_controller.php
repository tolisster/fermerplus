<?php    
    if(!defined('IRB_KEY'))
    {
	
       header("HTTP/1.1 404 Not Found");      
       exit(file_get_contents('../../404.html'));
    } 
	

define('DBNAME',   'seeds');	
define('PTITLE',   'Семена');	
define('ETITLE',   'Pagina de editare');
define('ADDNEW',   'Добавить новость');	

define('INSERT_RUTITLE',   'Введите название');
define('INSERT_RUCONTENT',   'Введите содеражние');

include IRB_ROOT .'/libs/mysql.php';
include IRB_ROOT .'/admin/rand_session.php';

$_GET["cat"] = (isset($_GET['cat']) ? $_GET['cat'] : null);

$_SESSION["user"] = md5($_SERVER["REMOTE_ADDR"]);

if($_GET["cat"] != null){

mysqlQuery("DELETE FROM `cat_tmp` WHERE `session` = '".$_SESSION["user"]."'");
mysqlQuery("INSERT INTO `cat_tmp` SET `cat` = " . $_GET["cat"].",`session` = '".$_SESSION["user"]."'");

  } 
$res = mysqlQuery("SELECT `cat` FROM `cat_tmp` WHERE `session` = '".$_SESSION["user"]."'");

 $row = mysql_fetch_assoc($res);

 $cat = $row["cat"];
   

if($GET['rem'] == 'delete')
    {  mysqlQuery(" DELETE FROM " . DBNAME . " WHERE `id` = ". (int)$GET['id'] );
       header("Location: /admin/ru/seeds/?cat=".$cat."");                    
    }     
   
if($GET['rem'] == 'public')
    {  mysqlQuery("UPDATE " . DBNAME . " SET `public`  = 1 WHERE `id` = ". (int)$GET['id'] );
       header("Location: /admin/ru/seeds/?cat=".$cat."");                      
    }
    
if($GET['rem'] == 'nopublic')
    {   mysqlQuery("UPDATE " . DBNAME . "  SET `public` = 0   WHERE `id`=". (int)$GET['id'] );
      header("Location: /admin/ru/seeds/?cat=".$cat."");                      
    } 
    
/**
* Add
* Блок добавления
*/    
    $title = ''; 
    
    if($GET['rem'] == 'new')
    {   mysqlQuery("INSERT INTO " . DBNAME . "
                    SET 
			        `category`     ='$cat',
			        `rutitle`   ='name',
					`rotitle`   ='',
					`images`   ='',
					`rudesc`   ='',
					`rodesc`   =''
		           ");
            
                    
       reDirect('rem=edit', 'id='. mysql_insert_id());    
        
    }
    
/**
* Edit
* Блок редактирования
*/    
    if($GET['rem'] == 'edit')
    {
        if($ok)
        {  mysqlQuery("UPDATE " . DBNAME . "
                       SET 
				      `rutitle`   ='". escapeString($POST['value2']) ."',
				      `rotitle`   ='". escapeString($POST['value3']) ."',
					  `images`   ='". escapeString($POST['value4']) ."',
					  `rudesc`   ='". escapeString($POST['value5']) ."',
					  `rodesc`   ='". escapeString($POST['value6']) ."'
					  
					 
	                  
					   WHERE `id`='". (int)$GET['id'] ."' "); 
           header("Location: /admin/ru/seeds/?cat=".$cat."");                              
        }        

        $res = mysqlQuery("SELECT *
                             FROM " . DBNAME . "  
                             WHERE `id` = " . (int)$GET['id']);
                            
			  $row = (mysql_fetch_assoc($res));
                    $POST['value1'] = $row['category'];
                    $POST['value2'] = $row['rutitle'];
					$POST['value3'] = $row['rotitle'];
					$POST['value4'] = $row['images'];
					$POST['value5'] = $row['rudesc'];
					$POST['value6'] = $row['rodesc'];    

     }
     else
     {
         $POST = ($POST);
     }  
	  
        
/**
* We connect a BB-decoder
* Подключаем файл BB-декодер
*/  
    include IRB_ROOT .'/bbcode/irb_bbdecoder.php';
    if(!empty($_SERVER['HTTP_REFERER']) && strpos($_SERVER['HTTP_REFERER'], 'news') === false)
    
	$GET['news'] = 'all';

    $tpl = getTpl('admin/articles/row');
    $articles = '';
	$semena = '';
    $page_menu = '';
    
    if(is_numeric($GET['news']))
    {

/**
* News generation by id
* Генерация новости по id
*/
        $res = mysqlQuery("SELECT * FROM " . DBNAME . " WHERE `id` = " . (int)$GET['news']);

        if (mysql_num_rows($res) > 0)
        {
            $row = mysql_fetch_assoc($res);
                 
                 $row['rutitle']   = htmlspecialchars($row['rutitle']);
				 $row['rucontent'] = ($row['rucontent']);

                 $articles = parseTpl($tpl, $row);
        }
        else
        {
            header("HTTP/1.1 404 Not Found");
            exit(file_get_contents(IRB_ROOT . '/404.html'));
        } 

    }
    else
    {     
/**
* News line generation 
* Генерация ленты новостей
*/            
         include IRB_ROOT .'libs/irb_paginator.php';     
         $paginator = new IRB_Paginator($GET['num'], 100);

         $res = $paginator -> countQuery("SELECT *  FROM " . DBNAME . "  WHERE `category` IN(SELECT `category` FROM `seeds_cats` WHERE `category` = '".$_GET["cat"]."') ORDER BY `id` DESC ");
		 $page_menu = $paginator -> createMenu();  
        
		 if(mysql_num_rows($res) > 0)
         {
		    $semena = 'Семена';
			$row = $semena;
			$row['public_link'] = ''; 
			
			  $row['public_link'] = !empty($row['public']) ? IRB_LANG_NO_PUBLIC : IRB_LANG_PUBLIC; 
            while ($row = mysql_fetch_assoc($res))
              {
                  $row['rutitle'] = htmlspecialchars($row['rutitle']);
                  $row['url'] = href('news=' . $row['id']);
                  $row['public_url']  = !empty($row['public']) ? 
                  href('rem=nopublic', 'id='. $row['id']) : href('rem=public', 'id='. $row['id']);
								   
                  $row['public_link'] = !empty($row['public']) ? IRB_LANG_NO_PUBLIC : IRB_LANG_PUBLIC; 
								                                   
                  $articles .= parseTpl($tpl, $row);
              }
         }
         else
         {
              $articles = IRB_LANG_NO_NEWS;
         }


    }

  