<?php    
    if(!defined('IRB_KEY'))
    {
	
       header("HTTP/1.1 404 Not Found");      
       exit(file_get_contents('../../404.html'));
    } 
	

define('DBNAME',   'pages');	
define('PTITLE',   'Все страницы');	
define('ETITLE',   'Pagina de editare');
define('ADDNEW',   'Добавить страницу');	

;
define('INSERT_RUTITLE',   'Введите название');
define('INSERT_RUCONTENT',   'Введите содержание');
define('INSERT_RUCONTENT2',   'Сылка картинки');
define('INSERT_RUCONTENT3',   'Страница');






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
			        `rutitle`     ='". INSERT_RUTITLE ."',
			        `rudesc`      ='". INSERT_RUCONTENT ."',
					`images`       ='". INSERT_RUCONTENT2 ."'
					`page`       ='". INSERT_RUCONTENT3 ."'
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
				      `rutitle`   ='". escapeString($POST['value1']) ."',
				      `rudesc` ='". escapeString($POST['value2']) ."',
					  `images`     ='". escapeString($POST['value3']) ."',
					  `page`     ='". escapeString($POST['value4']) ."',
					  `rotitle`   ='". escapeString($POST['value5']) ."',
				      `rodesc` ='". escapeString($POST['value6']) ."'
					 
	                  
					   WHERE `id`='". (int)$GET['id'] ."' ");
            reDirect('rem=read', 'news=all');                               
        }        

        $res = mysqlQuery("SELECT *
                             FROM " . DBNAME . "  
                             WHERE `id` = " . (int)$GET['id']);
                            
			  $row = (mysql_fetch_assoc($res));
                    $POST['value1'] = $row['rutitle'];
                    $POST['value2'] = $row['rudesc']; 
					$POST['value3'] = $row['images'];
					$POST['value4'] = $row['page'];
					$POST['value5'] = $row['rotitle'];
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
				 $row['images']   = htmlspecialchars($row['images']);
				 $row['rudesc'] = createBBtags($row['rudesc']);
				 $row['page'] = createBBtags($row['page']);
				 

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

  