<div id="main">
		<div id="rightside">
        </div>
		
		<div id="leftside">
               <h2><?php echo PTITLE; ?></h2>
                  <div class="date"><a href="<?php echo href('rem=new') ?>" title="#"><?php echo ADDNEW; ?></a></div>
                   <div class="listrow">
                   <?php echo $seeds; ?>
                   </div>
                   <div class="listrow">
                   <?php echo $udobrenija; ?>
                   </div>
                   <?php echo $articles; ?>
	                  <?php echo $page_menu; ?>
        </div>
</div>