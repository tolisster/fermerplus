<div id="content">
   <div class="content-cent">
      <div class="main-content">
			<div class="allseeds">
				<h1><?=SEEDS;?> <?=MAIN_TITLE;?></h1>
				<?php echo $seeds; ?>
			</div>
			
			<div class="dopcontent">
				<h1><?=DISEASE;?></h1>
				<a href="<?php echo href('lang='. $GET['lang'],'page=seeds-disease'); ?>"><?=GOTOBIBLIO;?></a><br /><br /><br />
				
				<h1><?=BIOLOGYANDAGRO;?></h1>
				<a href="<?php echo href('lang='. $GET['lang'],'page=seeds-biology'); ?>"><?=GOTOBIBLIO;?></a>
			</div>
       </div>
   </div>
</div><!--#content-->