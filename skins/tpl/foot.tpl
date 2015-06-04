<div class="footermenu">
    <ul>
       <li><a href="<?php echo href('lang='. $GET['lang'],'page=main','rem=second'); ?>"><?php echo TITLE_MAIN; ?></a></li>
       <li><a href="<?php echo href('lang='. $GET['lang'],'page=about'); ?>"><?php echo TITLE_ABOUT; ?></a></li>
       <li><a href="<?php echo href('lang='. $GET['lang'],'page=discount'); ?>"><?php echo TITLE_DISCOUNT2; ?></a></li>
       <li><a href="<?php echo href('lang='. $GET['lang'],'page=photogallery'); ?>" title="<?php echo MAIN_TITLE . ' '. TITLE_PHOTOGALL ; ?>"><?php echo TITLE_PHOTOGALL; ?></a></li>
	   <li><a href="<?php echo href('lang='. $GET['lang'],'page=videogallery'); ?>" title="<?php echo MAIN_TITLE . ' '. TITLE_VIDEOGALL ; ?>"><?php echo TITLE_VIDEOGALL; ?></a></li>
	   <li><a href="<?php echo href('lang='. $GET['lang'],'page=projects'); ?>"><?php echo TITLE_PROJECTS; ?></a></li>
	   <li><a href="<?php echo href('lang='. $GET['lang'],'page=sitemap'); ?>" title="<?php echo MAIN_TITLE . ' '. TITLE_SITEMAP ; ?>"><?php echo TITLE_SITEMAP; ?></a></li>
	   <li><a href="<?php echo href('lang='. $GET['lang'],'page=contacts'); ?>"><?php echo TITLE_CONTACT; ?></a></li>
     </ul>
</div>

<div class="lagmar-info">
    <div class="copyryght">
          <a href="<?php echo href('lang='. $GET['lang'],'page=main','rem=second'); ?>"><img width="120" src="/skins/images/template/lagmar-logo.png" title="<?php echo MAIN_TITLE .'  '. TITLE_SECOND  ?>" alt="<?php echo MAIN_TITLE   ?>" /></a>
          <h1><?php echo COPYR; ?></h1>
    </div>
   
   <div class="contacts">
      <p>
      Str. Socoleni 17/1<br />
      Tel. +(373) 22 85-51-96<br />
      Fax  +(373) 22 85-51-97<br />
      Gsm  +(373) 60 01-91-90<br />
	  Gsm  +(373) 68 12-01-20<br />
      info@lagmar.md
      </p>
   </div>

   <div class="info-map" style="height:100px;">
       <a id="example5" href="/uploads/big/socoleni.jpg" title="Lagmar impex"></a>
       <img  height="90" src="/skins/images/template/mini-map.png" alt="Lagmar impex" />
   </div>
   
   
   <div class="info-curency">
   <?php

  // Получаем текущие курсы валют в rss-формате с сайта www.cbr.ru 
  $content = get_content(); 
  // Разбираем содержимое, при помощи регулярных выражений 
  $pattern = "#<Valute ID=\"([^\"]+)[^>]+>[^>]+>([^<]+)[^>]+>[^>]+>[^>]+>[^>]+>[^>]+>[^>]+>([^<]+)[^>]+>[^>]+>([^<]+)#i"; 
  preg_match_all($pattern, $content, $out, PREG_SET_ORDER); 
  $dollar = ""; 
  $euro = ""; 
  $lirra = ""; 
  $rubla = ""; 
  $uah = ""; 
  $ron = ""; 

  foreach($out as $cur)  
  { 
    if($cur[2] == 840) $dollar = str_replace(",",".",$cur[4]); 
    if($cur[2] == 978) $euro   = str_replace(",",".",$cur[4]); 
	if($cur[2] == 826) $lirra   = str_replace(",",".",$cur[4]);
	if($cur[2] == 643) $rubla   = str_replace(",",".",$cur[4]);
	if($cur[2] == 946) $ron   = str_replace(",",".",$cur[4]);
  } 
  echo "<img src='/skins/images/flags/us.png' /> &nbsp;&nbsp;&nbsp;<span> (USD)</span> &nbsp;&nbsp;&nbsp; <strong>".$dollar."</strong>  <br/>     "; 
  echo "<img src='/skins/images/flags/eu.png' /> &nbsp;&nbsp;&nbsp; <span>(EUR)</span> &nbsp;&nbsp;&nbsp; <strong>".$euro."</strong>  <br/>     ";
  echo "<img src='/skins/images/flags/gb.png' /> &nbsp;&nbsp;&nbsp; <span>(GBR)</span> &nbsp;&nbsp;&nbsp; <strong>".$lirra."</strong>  <br/>     "; 
  echo "<img src='/skins/images/flags/ru.png' /> &nbsp;&nbsp;&nbsp; <span>(RUS)</span> &nbsp;&nbsp;&nbsp;&nbsp; <strong>".$rubla."</strong>  <br/>     "; 
  echo "<img src='/skins/images/flags/ro.png' /> &nbsp;&nbsp;&nbsp; <span>(ROM)</span> &nbsp;&nbsp;&nbsp; <strong>".$ron."</strong>  <br/>     "; 


  function get_content() 
  { 
    // Формируем сегодняшнюю дату 
    $date = date("d.m.Y"); 
    // Формируем ссылку 
    $link = "http://www.bnm.md/ru/official_exchange_rates?get_xml=1&date=$date";
    // Загружаем HTML-страницу 
    $fd = fopen($link, "r"); 
    $text=""; 
    if (!$fd) echo "Запрашиваемая страница не найдена"; 
    else 
    { 
      // Чтение содержимого файла в переменную $text 
      while (!feof ($fd)) $text .= fgets($fd, 4096); 
    } 
    // Закрыть открытый файловый дескриптор 
    fclose ($fd); 
    return $text; 
  } 
?> 
   </div>
   
   
   <div class="info-meteo">
   <?php 
$source = 'http://informer.gismeteo.ru/xml/33815_1.xml';
$weekday = array('',''. DM .'',''. LN.'',''. MR .'',''. ME .'',''. JO .'',''. VN .'',''. SB .'');
$tod = array('ночь','утро','день','вечер');
$cloudiness = array(
'<img src="/skins/images/pog/iasno.png" />', 
'<img src="/skins/images/pog/maloobl.png" />', 
'<img src="/skins/images/pog/oblocino.png" />', 
'<img src="/skins/images/pog/pasmurno.png" />',







);
$precipitation = array(4=>''. PR1 .'', 5=>''. PR2 .'', 6=>''. PR3 .'', 7=>''. PR4 .'', 8=>''. PR5 .'', 9=>''. PR6 .'', 10=>''. PR7 .'');
$xmlstr = '';
 
$fp = fopen($source, 'r');
if ( $fp ) {
while (!feof($fp)) $xmlstr.= fread($fp, 10000);
$xml = new SimpleXMLElement($xmlstr);
 
 
//echo '';
foreach ($xml->REPORT->TOWN->FORECAST as $f) break; {
 
'';
 
 echo '<div>'.
 '<h2> '. CITY . ' - '. $f['day'].'.'.$f['month'].'.'.$f['year']. ' - ' .$weekday[intval($f['weekday'])].'<h2>'.
  '<div class="imgpog">'.$cloudiness[intval($f->PHENOMENA['cloudiness'])].'</div>'.

  '<div class="gradpog">'.$f->TEMPERATURE['min'].'&deg;C</div>'.
   ''.
 '<div class="prespog"><img width="10" src="/skins/images/pog/pres.png" /><span class="pressnumber">'.$f->PRESSURE['max'].'</span></div>'.
 '<div class="prespog"><img width="10" src="/skins/images/pog/vet.png" /><span class="pressnumber">'.$f->WIND['min'].'-'.$f->WIND['max'].'м/с </span></div>'.
  '<div class="prespog"><img width="10" src="/skins/images/pog/vl.png" /><span class="pressnumber">'.$f->RELWET['min'].' %</span></div>'.

'<div class="textpog">' .$precipitation[intval($f->PHENOMENA['precipitation'])].'
</div>'.
 '';
}
echo '';
}
 ?>
   
   
   
   </div>
   
   
   <div style="margin-left:-5000px; position:absolute;">
<!--LiveInternet counter--><script type="text/javascript"><!--
document.write("<a href='http://www.liveinternet.ru/click' "+
"target=_blank><img src='//counter.yadro.ru/hit?t29.1;r"+
escape(document.referrer)+((typeof(screen)=="undefined")?"":
";s"+screen.width+"*"+screen.height+"*"+(screen.colorDepth?
screen.colorDepth:screen.pixelDepth))+";u"+escape(document.URL)+
";"+Math.random()+
"' alt='' title='LiveInternet: показано количество просмотров и"+
" посетителей' "+
"border='0' width='88' height='120'><\/a>")
//--></script><!--/LiveInternet-->
</div>
   
   
   
</div>

