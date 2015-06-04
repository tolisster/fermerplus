
	
	<div id="main">

		</div>
		
		<div id="leftside">   
			<h2>Pagina de editare</h2>
            <div class="date"></div>
	        
    <script type="text/javascript" >
	var irb_bb_path = '<?php echo IRB_BB_PATH ?>/images/';
	</script>	 
    <script type="text/javascript" src="<?php echo IRB_BB_PATH ?>/js/bb.js"></script>			




<div>

	
</div>




<form action="" method="post">






<div class="inp"><label>Titlu (rom)</label><input size="70" name="form[value1]" type="text" value="<?php echo $POST['value1'] ?>"/></div>
<div class="inp"><label>Titlu (rus)</label><input size="70" name="form[value2]" type="text" value="<?php echo $POST['value2'] ?>" /></div>
Descrierea (rom)<br /><br />
<textarea id="text" name="form[value7]" cols="60" rows="5" onselect='savesel(this)' onchange='savesel(this)' onclick='savesel(this)' onfocus='savesel(this)' onkeyup='savesel(this)'><?php echo $POST['value7'] ?></textarea><br /><br />


Descrierea (Rusa)<br /><br />
<textarea id="text" name="form[value5]" cols="60" rows="5" onselect='savesel(this)' onchange='savesel(this)' onclick='savesel(this)' onfocus='savesel(this)' onkeyup='savesel(this)'><?php echo $POST['value5'] ?></textarea>


<br />



<div class="inp"><input type="submit" name="ok" value="Salveaza" /></div>
 </form>

			
				

		</div> 
	</div> 