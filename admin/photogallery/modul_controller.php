<?php    
    if(!defined('IRB_KEY'))
    {
	
       header("HTTP/1.1 404 Not Found");      
       exit(file_get_contents('../../404.html'));
    } 
	

define('DBNAME',   'photogallery');	
define('PTITLE',   'Fotogalerie');	
define('ETITLE',   'Pagina de editare');
define('ADDNEW',   'Adaugă o galerie');	

define('INSERT_ROTITLE',   'Introduceţi titlu galeriei in limba Romană');
define('INSERT_RUTITLE',   'Introduceţi titlu galeriei in limba Rusă');
define('INSERT_ENTITLE',   'Introduceţi titlu galeriei in limba Engleză');

define('INSERT_CONTENT',   'Introduceţi fotografiile');







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
                    `rotitle`     ='". INSERT_ROTITLE ."',
			        `rutitle`     ='". INSERT_RUTITLE ."',
					`entitle`     ='". INSERT_ENTITLE ."',
                    `content`     ='". INSERT_CONTENT ."'

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
                      `rotitle`   ='". escapeString($POST['value1']) ."',
				      `rutitle`   ='". escapeString($POST['value2']) ."',
					  `entitle`   ='". escapeString($POST['value3']) ."',
                      `content`   ='". escapeString($POST['value4']) ."'
	                   
					   WHERE `id`='". (int)$GET['id'] ."' ");
            reDirect('rem=read', 'news=all');                               
        }        

        $res = mysqlQuery("SELECT *
                             FROM " . DBNAME . "  
                             WHERE `id` = " . (int)$GET['id']);
                            
			  $row = htmlChars(mysql_fetch_assoc($res));
                    $POST['value1'] = $row['rotitle'];
                    $POST['value2'] = $row['rutitle'];
                    $POST['value3'] = $row['entitle'];  
		            $POST['value4'] = $row['content']; 
   
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
                 
				 $row['rotitle']   = htmlspecialchars($row['rotitle']);
                 $row['rutitle']   = htmlspecialchars($row['rutitle']);
				 $row['entitle']   = htmlspecialchars($row['entitle']);
                 $row['content']   = createBBtags($row['content']);
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
         $paginator = new IRB_Paginator($GET['num'], 10);

         $res = $paginator -> countQuery("SELECT *  FROM " . DBNAME . "  ORDER BY `id` DESC ");
		 $page_menu = $paginator -> createMenu();  
        
		 if(mysql_num_rows($res) > 0)
         {
            while ($row = mysql_fetch_assoc($res))
              {
                  $row['rotitle'] = htmlspecialchars($row['rotitle']);
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

  