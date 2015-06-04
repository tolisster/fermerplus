<?php 

/**
* Language file (Russian)
* Языковой файл (русский)
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
       exit(file_get_contents('../404.html'));
    } 
////////////////////////////////////////////////////////// 


    define('IRB_LANG_PUBLIC',      '<img width="12" src="/skins/images/admin/led_gray.gif">');
    define('IRB_LANG_NO_PUBLIC',   '<img width="12" src="/skins/images/admin/led_green.gif">');	
	define('IRB_LANG_NO_NEWS',     'Nu sunt publicatii');	  
	
	define('STATUS',      '<img  src="/skins/images/admin/complete.png">');
    define('NO_STATUS',   '<img  src="/skins/images/admin/construct.png">');	  


   define('MAIN_TITLE',     'Lagmar Impex'); 
   define('TITLE_SECOND',   'Pagina principală');
   define('TITLE_MAIN',     'Principala');
   define('TITLE_ABOUT',    'Despre noi');
   define('TITLE_PROJECTS', 'Proiecte');
       define('TITLE_PROJECTS_ALL', 'Toate proiecte');
       define('TITLE_PROJECTS_A',   'Proiectele finisate');
       define('TITLE_PROJECTS_B',   'Proiectele în construcţii');
	   define('TITLE_PROJECTS_C',   'Proiecte în perspectivă');
   define('TITLE_DISCOUNT', 'Promoţii şi reduceri');
   define('TITLE_DISCOUNT2', 'Reduceri');
   define('TITLE_CONTACTS', 'Contacte şi feedback-ul');
   define('TITLE_CONTACT',  'Contacte');
   define('TITLE_PHOTOGALL', 'Galerie foto');
   define('TITLE_VIDEOGALL', 'Galerie video');
   define('TITLE_SITEMAP',   'Harta site-ului');
   
   
   define('CITY',   'Chişinău');
   define('LN',   'Luni');
   define('MR',   'Marţi');
   define('ME',   'Mercuri');
   define('JO',   'Joi');
   define('VN',   'Vineri');
   define('SB',   'Sînbătă');
   define('DM',   'Deminică');
   
   define('PR1',   'Ploaie');
   define('PR2',   'Ploaie');
   define('PR3',   'Zăpadă');
   define('PR4',   'Zăpadă');
   define('PR5',   'Furtună');
   define('PR6',   'Nu sunt date');
   define('PR7',   'Fără precipitaţii');
   
   
    
   
   
   
   define('LANGUAGES', 'Limba');
   define('LANG_RO', 'Română');
   define('LANG_RU', 'Русский');
   define('LANG_EN', 'English');
   
   define('SEARCH_TITLE',   'Căutare');
   define('SEARCH_ZAPROS',   'la cererea:');
   define('SEARCH_BTN',   'Căutare proiectelor Lagmar Impex');
   define('COPYR',        'Drepturi rezervate');
   
   
   define('MAIN_WORKS',        'Proiectele noastre');
   
   define('PLANS',        'planificarea');
   define('PHOTOS',       'Prezentare foto ');
   
   
  

   define('DEXIST_NEWS',     'nu există');
   define('DEXIST_WORKS',     '<p class="empty_msg">Fără rezultate</p>');
   define('DEXIST_INFO',     '<p class="empty_msg">Fără rezultate</p>');
   
   
   define('MORE',            'Vizualizează');
   define('ALLINFOMAP',      'Vezi pe hartă locaţia exactă a obiectului');
   
    define('FEEDBACK',   'Scrie-ne!');
   	define('FEEDBACK_FULLNAME',   'Nume');
	define('FEEDBACK_PHONE',       'Telefon');
	define('FEEDBACK_EMAIL',       'E-mail'); 
	define('FEEDBACK_MESS',        'Mesajul'); 
	define('FEEDBACK_SPAM',        'Control de spam');
	define('FEEDBACK_SPAM2',       'Cât va fi 15 - 6 =');
	
	define('FEEDBACK_THANCKS',       'Mulţumesc');
	define('FEEDBACK_SENDED',        'Mesajul dvs. a fost trimis!');
	define('FEEDBACK_ERRSPAM',       'Oare?');
	
	define('FEEDBACK_ERRPHONE',       'Introduceţi telefonul!');
	define('FEEDBACK_ERREMPTSPAM',    'Rezolvă problema!');
	
 	define('FEEDBACK_ERRVEML',        'Variantă incorectă!');
	
	define('FEEDBACK_ERREML',       'introduceţi E-mail-ul!');
	define('FEEDBACK_ERRNAME',      'introduceţi numele!');
	define('FEEDBACK_SEND',         'Trimite');  

	
	
	define('NO_SELECT',  '<p class="noselect">Selectaţi o categorie</p>');
	define('S_DEXIST',  '<p class="noselect">Din păcate, nu există nici un rezultat</p>');
	 

  