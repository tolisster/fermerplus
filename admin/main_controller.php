<?php    

/** 
* Newsroom Admin (Controller) 
* Блок новостей. Админка.(контроллер) 
* @author IT studio IRBIS-team 
* @copyright © 2009 IRBIS-team 
*/
/////////////////////////////////////////////////////////

/**
* Generation of page of an error at access out of system
* Генерация страницы ошибки при доступе вне системы
*/
    if(!defined('IRB_KEY'))
    {
	
       header("HTTP/1.1 404 Not Found");      
       exit(file_get_contents('../../404.html'));
    } 
//////////////////////////////////////////////////////////

/**
* We connect a file of the MySQL functions
* Подключаем файл функций MySQL
*/  
   include IRB_ROOT .'/libs/mysql.php';
   
///**
//* Delete
//* Блок удаления
//*/ 
//    if($GET['rem'] == 'delete')
//    {        
//        mysqlQuery("DELETE FROM `". IRB_DBPREFIX ."pages`
//                     WHERE `id` = ". (int)$GET['id']
//                     );
//        
//        reDirect('rem=read', 'news=all');                    
//    }     
//   
///**
//* Public
//* Блок публикации
//*/
//    if($GET['rem'] == 'public')
//    {        
//        mysqlQuery("UPDATE `". IRB_DBPREFIX ."pages`
//                      SET `public`  = 1
//                         WHERE `id` = ". (int)$GET['id']
//                  );
//        
//         
//        reDirect('rem=read', 'news=all');                    
//    }
//    
///**
//* Hide
//* Блок скрытия
//*/    
//    if($GET['rem'] == 'nopublic')
//    {        
//        mysqlQuery("UPDATE `". IRB_DBPREFIX ."pages`
//                      SET `public` = 0 
//                         WHERE `id`=". (int)$GET['id']
//                  );
//        
//         
//        reDirect('rem=read', 'news=all');                    
//    } 
//    
///**
//* Add
//* Блок добавления
//*/    
//    $title = ''; 
//    
//    if($GET['rem'] == 'new')
//    {    
//        mysqlQuery("INSERT INTO `". IRB_DBPREFIX ."pages`
//                    SET 
//                     `rotitle`='Title',
//			
//					 `entitle`='Title',
//                      `rotext`    ='Text',
//			
//					  `entext`    ='Text',
//					  `page`    ='1'
//		"
//                  );
//            
//                    
//       reDirect('rem=edit', 'id='. mysql_insert_id());    
//        
//    }
//    
///**
//* Edit
//* Блок редактирования
//*/    
//    if($GET['rem'] == 'edit')
//    {
//        if($ok)
//        {
//            mysqlQuery("UPDATE `". IRB_DBPREFIX ."pages`
//                         SET 
//                         `rotitle`='". escapeString($POST['value1']) ."',
//				
//						 `entitle`='". escapeString($POST['value3']) ."',
//                         `rotext`    ='". escapeString($POST['value4']) ."',
//				
//						 `entext`    ='". escapeString($POST['value6']) ."',
//						 `page`    ='". escapeString($POST['value7']) ."'
//	
//
//                          WHERE `id`='". (int)$GET['id'] ."'"
//                       );
//                                         
//        }        
//
//        $res = mysqlQuery("SELECT *
//                             FROM `". IRB_DBPREFIX ."pages`  
//                                 WHERE `id` = " . (int)$GET['id']);
//
//
//        $row = htmlChars(mysql_fetch_assoc($res));
//        $POST['value1'] = $row['rotitle'];
//
//		  $POST['value3'] = $row['entitle'];
//        $POST['value4'] = $row['rotext'];  
//
//		$POST['value6'] = $row['entext'];    
//		$POST['value7'] = $row['page'];     
//     }
//     else
//     {
//         $POST = htmlChars($POST);
//     }   
//        
///**
//* We connect a BB-decoder
//* Подключаем файл BB-декодер
//*/  
//    include IRB_ROOT .'/bbcode/irb_bbdecoder.php';
//      
//    if(!empty($_SERVER['HTTP_REFERER']) && strpos($_SERVER['HTTP_REFERER'], 'news') === false)
//        $GET['news'] = 'all';
//
//    $tpl = getTpl('admin/news/row');
//    $news = '';
//    $page_menu = '';
//    
//    if(is_numeric($GET['news']))
//    {
//
///**
//* News generation by id
//* Генерация новости по id
//*/
//        $res = mysqlQuery("SELECT *
//
//                             FROM `". IRB_DBPREFIX ."pages`  
//                                 WHERE `id` = " . (int)$GET['news']);
//
//
//        if (mysql_num_rows($res) > 0)
//        {
//            $row = mysql_fetch_assoc($res);
//
//            $row['rotitle'] = htmlspecialchars($row['rotitle']);
//	
//			$row['entitle'] = htmlspecialchars($row['entitle']);
//            $row['rotext'] = createBBtags($row['rotext']);
//
//			  $row['entext'] = createBBtags($row['entext']);
//			$row['page'] = htmlspecialchars($row['page']);
//            $row['url'] = href('news=all');
//			
//            $row['public_url']  = !empty($row['public']) ? 
//                   href('rem=nopublic', 'id='. $row['id']) : href('rem=public', 'id='. $row['id']);
//								   
//            $row['public_link'] = !empty($row['public']) ? 
//			                       IRB_LANG_NO_PUBLIC : IRB_LANG_PUBLIC; 
//								                          
//            $row['link'] = IRB_LANG_ALL_NEWS;
//
//            $news = parseTpl($tpl, $row);
//        }
//        else
//        {
//            header("HTTP/1.1 404 Not Found");
//            exit(file_get_contents(IRB_ROOT . '/404.html'));
//        } 
//
//    }
//    else
//    {     
///**
//* News line generation 
//* Генерация ленты новостей
//*/            
//        include IRB_ROOT .'libs/irb_paginator.php';     
//        $paginator = new IRB_Paginator($GET['num'], IRB_NUM_NEWS_MAIN);
//    
//        $res = $paginator -> countQuery("SELECT * 
//                                           FROM `" . IRB_DBPREFIX . "pages`  
//                                               ORDER BY `id` DESC" 
//                                                 );
//                                                
//        $page_menu = $paginator -> createMenu();                                                               
//              
//         if(mysql_num_rows($res) > 0)
//         {
//              while ($row = mysql_fetch_assoc($res))
//              {
//  
//                  $row['rotitle'] = htmlspecialchars($row['rotitle']);
//	
//				  $row['entitle'] = htmlspecialchars($row['entitle']);
//                  $row['rotext'] = createBBtags($row['rotext'], false) . "...";
//
//				  $row['entext'] = createBBtags($row['entext'], false) . "...";
//                  $row['url'] = href('news=' . $row['id']);
//                  $row['link'] = IRB_LANG_FULL_NEWS;
//				  $row['page'] = htmlspecialchars($row['page']);
//			
//                  $row['public_url']  = !empty($row['public']) ? 
//                          href('rem=nopublic', 'id='. $row['id']) : href('rem=public', 'id='. $row['id']);
//								   
//                  $row['public_link'] = !empty($row['public']) ? 
//			                             IRB_LANG_NO_PUBLIC : IRB_LANG_PUBLIC; 
//								                                   
//                  $news .= parseTpl($tpl, $row);
//              }
//         }
//         else
//         {
//              $news = IRB_LANG_NO_NEWS;
//         }
//
//    }
//	
//	

	


/** 
* Подключаем шаблон
* Includes the template
*/
    include IRB_ROOT .'skins/tpl/admin/main/show.tpl';    