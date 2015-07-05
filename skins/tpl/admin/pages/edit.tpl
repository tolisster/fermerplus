<div id="main">
<form action="" method="post">






      <div id="leftside">    
	  <h2>Редактироание</h2>
           
	        
    <script type="text/javascript" >
	var irb_bb_path = '<?php echo IRB_BB_PATH ?>/images/';
	</script>	 
    <script type="text/javascript" src="<?php echo IRB_BB_PATH ?>/js/bb.js"></script>			
<div class="inp">
<label>RU Название</label>
<input size="70" name="form[value1]" type="text" value="<?php echo $POST['value1'] ?>"/>
</div>

<div class="inp">
<label>RO Название</label>
<input size="70" name="form[value5]" type="text" value="<?php echo $POST['value5'] ?>"/>
</div>


<div class="inp">
<label>Страница</label>
<input size="70" name="form[value4]" type="text" value="<?php echo $POST['value4'] ?>"/>
</div>



<div class="inp">
<label><strong>RU</strong></label><br />


<textarea class="ckeditor" name="form[value2]" rows="20" style="width:800px;" onselect='savesel(this)' onchange='savesel(this)' onclick='savesel(this)' onfocus='savesel(this)' onkeyup='savesel(this)'><?php echo $POST['value2'] ?></textarea>
</div>

<div class="inp">
<label><strong>RO</strong></label><br />


<textarea class="ckeditor" name="form[value6]" rows="20" style="width:800px;" onselect='savesel(this)' onchange='savesel(this)' onclick='savesel(this)' onfocus='savesel(this)' onkeyup='savesel(this)'><?php echo $POST['value6'] ?></textarea>
</div>









<div class="inp"><input type="submit" name="ok" value="Сохранить" /></div>
</form>





	
			
			
				

		</div> 
	</div> 