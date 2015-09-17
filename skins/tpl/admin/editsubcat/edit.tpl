<div id="main">
<form action="" method="post">






      <div id="leftside">    
	  <h2>Редактироание</h2>
           
	        
    <script type="text/javascript" >
	var irb_bb_path = '<?php echo IRB_BB_PATH ?>/images/';
	</script>	 
    <script type="text/javascript" src="<?php echo IRB_BB_PATH ?>/js/bb.js"></script>			
<div class="inp">
<label>Название RU</label>
<input size="70" name="form[value2]" type="text" value="<?php echo $POST['value2'] ?>"/>
</div>
<div class="inp">
<label>Название RO</label>
<input size="70" name="form[value3]" type="text" value="<?php echo $POST['value3'] ?>"/>
</div>
<div class="inp">
<label>category</label>
<input size="70" name="form[value1]" type="text" value="<?php echo $POST['value1'] ?>"disabled="disabled"/>
</div>
<div class="inp">
<label>img</label>
<input size="70" name="form[value7]" type="text" value="<?php echo $POST['value7'] ?>"/>
</div>


<div class="inp">
<label><strong>RU</strong></label><br />


<textarea class="ckeditor" name="form[value5]" rows="20" style="width:800px;" onselect='savesel(this)' onchange='savesel(this)' onclick='savesel(this)' onfocus='savesel(this)' onkeyup='savesel(this)'><?php echo $POST['value5'] ?></textarea>
</div>



<div class="inp">
<label><strong>RO</strong></label><br />


<textarea class="ckeditor" name="form[value6]" rows="20" style="width:800px;" onselect='savesel(this)' onchange='savesel(this)' onclick='savesel(this)' onfocus='savesel(this)' onkeyup='savesel(this)'><?php echo $POST['value6'] ?></textarea>
</div>










<div class="inp"><input type="submit" name="ok" value="Сахранить" /></div>
</form>





	
			
			
				

		</div> 
	</div> 