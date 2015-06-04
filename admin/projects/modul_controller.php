<?php    
    if(!defined('IRB_KEY'))
    {
	
       header("HTTP/1.1 404 Not Found");      
       exit(file_get_contents('../../404.html'));
    } 
	

define('DBNAME',   'works');	
define('PTITLE',   'Lista de proiecte');	
define('ETITLE',   'Editarea proiectului');
define('ADDNEW',   'Adaugă un proiect');	

define('INSERT_ROSTAT',   'Introduceţi raionul in libma Romană');
define('INSERT_RUSTAT',   'Introduceţi raionul in limba Rusă');
define('INSERT_ENSTAT',   'Introduceţi raionul in limba Engleză');

define('INSERT_ROSTREET', 'Introduceţi strada in limba Romană');
define('INSERT_RUSTREET', 'Introduceţi strada in limba Rusă');
define('INSERT_ENSTREET', 'Introduceţi strada in limba Engleză');

define('INSERT_ROCONTENT', 'Introduceţi caracteristicile in limba Romană');
define('INSERT_RUCONTENT', 'Introduceţi caracteristicile in limba Rusă');
define('INSERT_ENCONTENT', 'Introduceţi caracteristicile in limba Engleză');

define('INSERT_IMAGE',     'Imagine la (Link-ul imaginii)');
define('INSERT_PLANS',     'Lista de planuri (6 buc.)');
define('INSERT_PHOTOS',    'Lista de fotografii (6 buc.)');
define('INSERT_MAP',       'Mapa alocării');
define('INSERT_STATUS',    'Statutul (În construcţie / Finisat)');





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
	
	
if($GET['rem'] == 'status')
    {  mysqlQuery("UPDATE " . DBNAME . " SET `status`  = '1',`adstat`  = 'b' WHERE `id` = ". (int)$GET['id'] );
       reDirect('rem=read', 'news=all');                    
    }
    
if($GET['rem'] == 'nostatus')
    {   mysqlQuery("UPDATE " . DBNAME . "  SET `status` = '0', `adstat`  = 'a'   WHERE `id`=". (int)$GET['id'] );
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
                    `rostat`      ='". INSERT_ROSTAT ."',
			        `rustat`      ='". INSERT_RUSTAT ."',
					`enstat`      ='". INSERT_ENSTAT ."',
                    `rostreet`    ='". INSERT_ROSTREET ."',
			        `rustreet`    ='". INSERT_RUSTREET ."',
					`enstreet`    ='". INSERT_ENSTREET ."',
                    `rocontent`   ='". INSERT_ROCONTENT ."',
			        `rucontent`   ='". INSERT_RUCONTENT ."',
					`encontent`   ='". INSERT_ENCONTENT ."',
	                `images`         ='". INSERT_IMAGE ."',
					`planification`  ='". INSERT_PLANS ."',
					`photopresents`  ='". INSERT_PHOTOS ."',
					`mapalocation`   ='". INSERT_MAP ."',
					`status`         ='0'
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
                      `rostat`        ='". escapeString($POST['value1']) ."',
				      `rustat`        ='". escapeString($POST['value2']) ."',
					  `enstat`        ='". escapeString($POST['value3']) ."',
					  `rostreet`      ='". escapeString($POST['value4']) ."',
				      `rustreet`      ='". escapeString($POST['value5']) ."',
					  `enstreet`      ='". escapeString($POST['value6']) ."',
                      `rocontent`     ='". escapeString($POST['value7']) ."',
				      `rucontent`     ='". escapeString($POST['value8']) ."',
					  `encontent`     ='". escapeString($POST['value9']) ."',
					  `images`        ='". escapeString($POST['value10']) ."',
					  `planification` ='". escapeString($POST['value11']) ."',
					  `photopresents`  ='". escapeString($POST['value12']) ."',
					  `mapalocation`  ='". escapeString($POST['value13']) ."',
					  `status`        ='". escapeString($POST['value14']) ."'
	                   
					   WHERE `id`='". (int)$GET['id'] ."' ");
            reDirect('rem=read', 'news=all');                               
        }        

        $res = mysqlQuery("SELECT *
                             FROM " . DBNAME . "  
                             WHERE `id` = " . (int)$GET['id']);
                            
			  $row = htmlChars(mysql_fetch_assoc($res));
                    $POST['value1'] = $row['rostat'];
                    $POST['value2'] = $row['rustat'];
                    $POST['value3'] = $row['enstat'];  
					$POST['value4'] = $row['rostreet'];
                    $POST['value5'] = $row['rustreet'];
                    $POST['value6'] = $row['enstreet']; 
		            $POST['value7'] = $row['rocontent']; 
                    $POST['value8'] = $row['rucontent'];    
		            $POST['value9'] = $row['encontent'];
					$POST['value10'] = $row['images']; 
					$POST['value11'] = $row['planification']; 
					$POST['value12'] = $row['photopresents'];     
					$POST['value13'] = $row['mapalocation'];   
					$POST['value14'] = $row['status'];

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

    $tpl = getTpl('admin/projects/row');
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
			
     			 $row['rostat']        = htmlspecialchars($row['rostat']);
                 $row['rustat']        = htmlspecialchars($row['rustat']);
				 $row['enstat']        = htmlspecialchars($row['enstat']);
				 $row['rostreet']      = htmlspecialchars($row['rostreet']);
                 $row['rustreet']      = htmlspecialchars($row['rustreet']);
				 $row['enstreet']      = htmlspecialchars($row['enstreet']);
                 $row['rocontent']     = createBBtags($row['rocontent']);
				 $row['rucontent']     = createBBtags($row['rucontent']);
                 $row['encontent']     = createBBtags($row['encontent']);
				 $row['images']        = htmlspecialchars($row['images']);
			     $row['planification'] = createBBtags($row['planification']);
				 $row['photopresent']  = createBBtags($row['photopresent']);
				 $row['mapalocation']  = htmlspecialchars($row['mapalocation']);
				 $row['status']        = htmlspecialchars($row['status']);

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
                  $row['rostat'] = htmlspecialchars($row['rostat']);
				  $row['rostreet'] = htmlspecialchars($row['rostreet']);
                  $row['url'] = href('news=' . $row['id']);
                  
				  $row['public_url']  = !empty($row['public']) ? 
                  href('rem=nopublic', 'id='. $row['id']) : href('rem=public', 'id='. $row['id']);
								   
                  $row['public_link'] = !empty($row['public']) ? IRB_LANG_NO_PUBLIC : IRB_LANG_PUBLIC; 
				  
				  
				  $row['status_url']  = !empty($row['status']) ? 
                  href('rem=nostatus', 'id='. $row['id']) : href('rem=status', 'id='. $row['id']);
								   
                  $row['status_link'] = !empty($row['status']) ? NO_STATUS : STATUS; 
				 
				 


				 
				 
								                                   
                  $articles .= parseTpl($tpl, $row);
              }
         }
         else
         {
              $articles = IRB_LANG_NO_NEWS;
         }

    }

  