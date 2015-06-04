<div class="header">
   <div class="logo">
     <a href="<?php echo href('lang='. $GET['lang'],'page=main','rem=second'); ?>" title="<?php echo MAIN_TITLE .'  '. TITLE_SECOND  ?>">
	    <img src="/skins/images/template/lagmar-logo.png" title="<?php echo MAIN_TITLE .'  '. TITLE_SECOND  ?>" alt="<?php echo MAIN_TITLE   ?>" />
	 </a>
   </div>
   
   <div class="languages">
        <h3><?php echo LANGUAGES ?></h3>
              <form id="select-form"  action="" method="post">
                   <select class="inputbox" size="1" name="form[value2]"   onchange="location.href=this.value" >
                      <option value="<?php echo href('lang=ro','page='. $GET['page'] ,'rem='. $GET['rem'],'sel='. $GET['sel'],'id='. $GET['id'],'news='. $GET['news']); ?>" <?php echo $lang; ?> ><?php echo LANG_RO; ?></option>
                      <option value="<?php echo href('lang=ru','page='. $GET['page'] ,'rem='. $GET['rem'],'sel='. $GET['sel'],'id='. $GET['id'],'news='. $GET['news']); ?>" <?php echo $lang2; ?>><?php echo LANG_RU; ?></option>
                      <option value="<?php echo href('lang=en','page='. $GET['page'] ,'rem='. $GET['rem'],'sel='. $GET['sel'],'id='. $GET['id'],'news='. $GET['news']); ?>" <?php echo $lang3; ?>><?php echo LANG_EN; ?></option>
                   </select>
				   
             </form>
			 
             <ul class="headsubmenu">
                <li><a href="<?php echo href('lang='. $GET['lang'],'page=photogallery'); ?>" title="<?php echo MAIN_TITLE . ' '. TITLE_PHOTOGALL ; ?>"><?php echo TITLE_PHOTOGALL; ?></a></li>
                <li><a href="<?php echo href('lang='. $GET['lang'],'page=videogallery'); ?>" title="<?php echo MAIN_TITLE . ' '. TITLE_VIDEOGALL ; ?>"><?php echo TITLE_VIDEOGALL; ?></a></li>
                <li><a href="<?php echo href('lang='. $GET['lang'],'page=sitemap'); ?>" title="<?php echo MAIN_TITLE . ' '. TITLE_SITEMAP ; ?>"><?php echo TITLE_SITEMAP; ?></a></li>
             </ul>
   </div>

    <div class="lagmarmenu">
       <ul>
         <li><a href="<?php echo href('lang='. $GET['lang'],'page=main','rem=second'); ?>"><?php echo TITLE_MAIN; ?></a></li>
         <li><a href="<?php echo href('lang='. $GET['lang'],'page=about'); ?>"><?php echo TITLE_ABOUT; ?></a></li>
		 <li><a href="<?php echo href('lang='. $GET['lang'],'page=projects'); ?>"><?php echo TITLE_PROJECTS; ?></a></li>
         <li><a href="<?php echo href('lang='. $GET['lang'],'page=discount'); ?>"><?php echo TITLE_DISCOUNT2; ?></a></li>
         <li><a href="<?php echo href('lang='. $GET['lang'],'page=contacts'); ?>"><?php echo TITLE_CONTACT; ?></a></li>
       </ul>

       <div class="searchform">
            <form action="<?php echo href('lang='. $GET['lang'],'page=search'); ?>" method="post">
	            <div class="search">
	               <input name="form[value1]"  maxlength="50" alt="" class="inputbox" type="text" size="50" value="" />
	               <input type="submit" value="" class="button" title="<?php echo SEARCH_BTN; ?>"/>	
	            </div>
            </form>	
       </div>
    </div>
</div>
