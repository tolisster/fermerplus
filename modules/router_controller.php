<?php 
if(!defined('IRB_KEY')) {header("HTTP/1.1 404 Not Found");  exit(file_get_contents('../../404.html'));}    

class Router {
  
  public function readPages($isPage){
    
  global $POST,$GET,$products,$main_diseases,$mnews,$slider;
     
    if($isPage != 'none'){
      
     $pageInArray = $isPage;
      
      $POST = htmlChars($POST); 
      
      include './modules/'.$pageInArray .'_controller.php';
      $this->fabrik_engine();    
      include './modules/engine.php';
      include './skins/tpl/'.$pageInArray .'/show.tpl';
    }
    else
	{
       header("HTTP/1.1 404 Not Found");      
       exit(file_get_contents('./404.html'));	
	}
    
    return $pageInArray;
  }
  
  
  public function fabrik_engine(){
    
  global $GET,$lang,$lang2,$lang3,$lang1,$sel,$sel2,$sel3,$sel4,$smenu,$smenu1,$smenu2,$smenu3,$smenu4,$smenu5,$smenu6; 
    
  if ( $GET['page']  == 'main' and $GET['rem']  == 'read'  )  {  $css_patch = 'main.css'; }    else  {  $css_patch = 'style.css'; }
 
 if ( $GET['page']  == 'projects' and $GET['news']  == 'all'  )  {  $projects_menu = ''; }    else  {  $projects_menu = 'style="display:none;"'; }
 
    $sell = array(
            '1' =>'all',
            '2' =>'a',
            '3' =>'b',
            '4' =>'c',
            );
   foreach($sell as $key=>$value){
    if($key == '1')$key= '';
   if ( $GET['sel']  == $value)  {  $sel.$key = '  class="select"'; }    else  {  $sel.$key = ''; }   
   }         
   
   
   $lang = array(
 
            '1' =>'ro',
            '2' =>'ru',
            '3' =>'en',
            );
   foreach($lang as $key=>$value){
    if($key == 1)$key = '';
  if ( $GET['lang']  == $value)  {  $lang.$key = '  selected="selected"'; }    else  {  $lang.$key = ''; }    
   }         
            
  $engine_pages = array(
 
            'main' =>'main',
            'solutions' =>'solutions',
            'services' =>'services',
            'partners' =>'partners',
            'events' =>'events',
            'forum' =>'forum', 
            'support' =>'support',
            );           
 $i = 0;   
    
    foreach($engine_pages as $engine){
      
 $i++;
      
 if($engine == 'main')$i = '';     
      
 if ( $GET['page']  == $engine)  {  $smenu.$i = ''; }    else  {  $smenu.$i = 'style="display:none;"';}         
   }
   if ( $GET['page']  == 'main')  {  $slide = ''; }    else  {  $slide = 'style="display:none;"'; } ;
  }
}
