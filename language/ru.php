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


   define('MAIN_TITLE',     'FARMER +'); 
   
   define('SEEDS',     'Семена');
   define('FERTILIZERS',     'Удобрения');  
   define('FERTILIZERS_PRODUCTS',     'Удобрения продукция'); 
   
   define('PRIMENENIE',     'Облость применения:'); 
   define('PACK',     'Упаковка:'); 
   define('PRICE',     'Цена:'); 
   
   
   define('ARTICLES',     'Семена'); 
   define('DEVELOP',      'Событья'); 
   define('PARTICIP',     'Участники'); 
   define('CONTACTS',     'Контакты'); 
   define('WHYREG',       'Для чего нужна регистрация?'); 
   define('PRICES',       'Цены'); 
   define('DOPPROGRAMS',  'Доп. программы'); 
   define('SCHOOLS',      'Учебные заведения'); 
   define('COACHES',      'Тренеры'); 


   
  

   define('DEXIST_A',     '<p class="dexist">Не найдено ни одной публикации</p>');
   define('DEXIST_INFO',  '<p class="dexist">Информация отсутствует</p>');
   define('IRB_LANG_UPDATED_ACCAUNT',  '<p class="dexist">Профиль успешно обновлен</p>');
   
   
   
    define('MORE',            'Подробнее');
	
	define('RQAT',            '<span class="special1">&raquo;</span>');
    
	define('FEEDBACK',             'Обратная связь');
   	define('FEEDBACK_FULLNAME',    'Фио');
	define('FEEDBACK_PHONE',       'Телефон');
	define('FEEDBACK_EMAIL',       'Емайл'); 
	define('FEEDBACK_MESS',        'Сообщение'); 
	define('FEEDBACK_SPAM',        'Проверка от спама');
	define('FEEDBACK_SPAM2',       'Сколько будет 15 - 6 =');
	
	define('FEEDBACK_THANCKS',       'Спасибо');
	define('FEEDBACK_SENDED',        'Ваше сообщение успешно отправлено !');
	define('FEEDBACK_ERRSPAM',       'Разве?');
	define('FEEDBACK_ERRPHONE',       'Введите телефон!');
	define('FEEDBACK_ERREMPTSPAM',    'Решите задачу!');
	
 	define('FEEDBACK_ERRVEML',        'Емайл не подходит!');
	
	define('FEEDBACK_ERREML',       'Введите емейл!');
	define('FEEDBACK_ERRNAME',      'Введите имя!');
	define('FEEDBACK_SEND',         'Отправить');  
	define('LANG_NO_ACCES',         'Неправильно указан логин и/или пароль'); 
	
	
	define('IRB_LANG_EMPTY_NAME',        'Вы не ввели имя');
	define('IRB_LANG_SHORT_NAME',        'Имя должно иметь не менее 4 синволов');
	
	define('IRB_LANG_EMPTY_LOGIN',        'Вы не ввели логин');
	define('IRB_LANG_SHORT_LOGIN',        'логин должно иметь не менее 4 синволов');
	
	define('IRB_LANG_EMPTY_LNAME',        'Вы не ввели Фимилию');
	define('IRB_LANG_SHORT_LNAME',        'Фамилия должно иметь не менее 4 синволов');
	
	
	define('IRB_LANG_UNIQ',              'Такой E-mail уже зарегистрирован');  
	define('IRB_LANG_UNIQ_LOGIN',        'Такой Логин уже зарегистрирован');          
    define('IRB_LANG_EMPTY_PASSVORD',    'Вы не ввели пароль');            
    define('IRB_LANG_SHORT_PASSWORD',    'Слишком короткий пароль' );    
    define('IRB_LANG_INVALID_PASSWORD',  'Пароли не совпадают аккуратнее пожалуйста.' );    
    define('IRB_LANG_EMPTY_EMAIL',       'Введите E-mail');    
    define('IRB_LANG_INVALID_EMAIL',     'Не верный формат E-mail');
	define('IRB_LANG_EMPTY_KEY',         'Вы не ввели секретное слово'); 
	define('IRB_LANG_NOSELECT_GENDER',   'Вы не выбрали пол'); 
	
	
	
	 define('IRB_LANG_MESS_ACTIVATE',      'Активация учетной записи');
    define('IRB_LANG_MESS_ACTIVATE_FOR',  "С Вашего электронного почтового адреса поступила заявка на ".
                                          "aктивацию учетной записи на сайте <b>". $_SERVER['HTTP_HOST'] ."</b><br>\n".     
                                          "Для доступа в аккаунт пройдите по ");    
    define('IRB_LANG_MESS_LINK',          'этой ссылке');    
    define('IRB_LANG_MESS_ACTIVATE_END',  'и введите в поле активации этот код: <b>');    
    define('IRB_LANG_MESS_TIME_LIVIT',    'Код действителен до ');
    define('IRB_LANG_MESS_RESTORATION',   'Восстановление пароля');
    define('IRB_LANG_MESS_RESTORAT_FOR',  "С Вашего электронного почтового адреса поступила заявка на ".
                                          "восстановление доступа на сайт <b>". $_SERVER['HTTP_HOST'] ."</b><br>\n".     
                                          "Для доступа в аккаунт пройдите по "); 
    define('IRB_LANG_MAIL_FOR',           'На почтовый адрес ');	
    define('IRB_LANG_MAIL_END',           ' отправлен код активации'); 
 
    define('IRB_LANG_NO_EMAIL',           'Такой E-mail не числится в нашей базе данных');
	define('IRB_LANG_INVLID_CODE',       'Не верный код');
    define('IRB_LANG_INVLID_LOGEML',     'Вы не ввели логин и/или E-mail');
	define('IRB_SISTEM_ERROR',           'Ошибка');


  