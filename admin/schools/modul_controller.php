<?php    
    if(!defined('IRB_KEY'))
    {
	
       header("HTTP/1.1 404 Not Found");      
       exit(file_get_contents('../../404.html'));
    } 
	

define('DBNAME',   'schools');	
define('PTITLE',   'Учебные заведения');	
define('ETITLE',   'Pagina de editare');
define('ADDNEW',   'Добавить');	

define('INSERT_RUTITLE',   'Введите название');
define('INSERT_RUCONTENT',   'Введите содеражние');


 



include IRB_ROOT .'/libs/mysql.php';
   

if($GET['rem'] == 'delete')
    {  mysqlQuery(" DELETE FROM " . DBNAME . " WHERE `id` = ". (int)$GET['id'] );
       reDirect('rem=read', 'news=all');                    
    }     
   
if($GET['rem'] == 'public')
    {  mysqlQuery("UPDATE " . DBNAME . " SET `public`  = 1 WHERE `id` = ". (int)$GET['id'] );
       reDirect('rem=read', 'news=all');                    
    }
    
if($GET['rem'] == 'nopublic')
    {   mysqlQuery("UPDATE " . DBNAME . "  SET `public` = 0   WHERE `id`=". (int)$GET['id'] );
        reDirect('rem=read', 'news=all');                    
    } 
    
/**
* Add
* Блок добавления
*/    
    $title = ''; 
    
    if($GET['rem'] == 'new')
    {   mysqlQuery("INSERT INTO " . DBNAME . "
                    SET 

					`runame`   ='Название центра',
					`rudesc`   ='Описание',
					`mimg`      ='/skins/images/template/noimg.jpg'
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
					   `runame`    ='". escapeString($POST['value1']) ."',
					   `rudesc`        ='". escapeString($POST['value2']) ."',
					   `mimg`        ='". escapeString($POST['value3']) ."'

					 
	                  
					   WHERE `id`='". (int)$GET['id'] ."' ");
            reDirect('rem=read', 'news=all');                               
        }        

        $res = mysqlQuery("SELECT *
                             FROM " . DBNAME . "  
                             WHERE `id` = " . (int)$GET['id']);
                            
			  $row = htmlChars(mysql_fetch_assoc($res));
                    $POST['value1'] = $row['runame'];
                    $POST['value2'] = $row['rudesc'];  
					$POST['value3'] = $row['mimg']; 


     }
     else
     {
         $POST = htmlChars($POST);
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
				 $row['rucontent'] = createBBtags($row['rucontent']);

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
         $paginator = new IRB_Paginator($GET['num'], 30);

         $res = $paginator -> countQuery("SELECT *  FROM " . DBNAME . "  ORDER BY `id` DESC ");
		 $page_menu = $paginator -> createMenu();  
        
		 if(mysql_num_rows($res) > 0)
         {
            while ($row = mysql_fetch_assoc($res))
              {
                  $row['rutitle'] = createBBtags($row['runame']);
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

  