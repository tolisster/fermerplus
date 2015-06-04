<div id="main">
<form action="" method="post">
		<div id="rightside">
	    </div>



      <div id="leftside">   
	  <h2>Pagina de editare</h2>
           
	        
    <script type="text/javascript" >
	var irb_bb_path = '<?php echo IRB_BB_PATH ?>/images/';
	</script>	 
    <script type="text/javascript" src="<?php echo IRB_BB_PATH ?>/js/bb.js"></script>			




<div class="inp">
<label>Titlu galeriei in limba Romană</label>
<input size="70" name="form[value1]" type="text" value="<?php echo $POST['value1'] ?>"/>
</div>

<div class="inp">
<label>Titlu galeriei in limba Rusă</label>
<input size="70" name="form[value2]" type="text" value="<?php echo $POST['value2'] ?>"/>
</div>

<div class="inp">
<label>Titlu galeriei in limba Engleză</label>
<input size="70" name="form[value3]" type="text" value="<?php echo $POST['value3'] ?>"/>
</div>








<br />
<div class="inp">
<label><strong>Lista gotografiilor <a target="_blank" href="<?php echo href('lang='. $GET['lang'],'page=filemanager'); ?>"><strong>Manager</strong></a></strong></strong></label>

<img style="padding-left:50px;" id="21" src="<?php echo IRB_BB_PATH ?>/images/insert_picture.gif" 
onmouseover="change(21, 'insert_picture_on')" onmouseout="change(21, 'insert_picture')" onclick="click_bb('text', 'zoomgallery');" />

<textarea id="text" name="form[value4]" rows="10" onselect='savesel(this)' onchange='savesel(this)' onclick='savesel(this)' onfocus='savesel(this)' onkeyup='savesel(this)'><?php echo $POST['value4'] ?></textarea>
</div>



<div class="inp"><input type="submit" name="ok" value="Salveaza" /></div>
</form>





	
			
			
				

		</div> 
	</div> 