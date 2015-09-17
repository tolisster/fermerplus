<div id="main">
		<div id="rightside">
        </div>
		
		<div id="leftside">

               <h3><?php if(!empty($about)) echo $about; else echo $semena; ?></h3>
                  <div class="date"><a href="<?php echo href('rem=new') ?>" title="#"><?php echo ADDNEW; ?></a></div>
                   <?php echo $articles; ?>
	                  <?php echo $page_menu; ?>
        </div>
</div>