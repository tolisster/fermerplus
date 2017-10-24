<div id="main">
<form action="" method="post">






      <div id="leftside">    
	  <h2>Редактироание</h2>
           
	        
    <script type="text/javascript" >
	var irb_bb_path = '<?php echo IRB_BB_PATH ?>/images/';
	</script>	 
    <script type="text/javascript" src="<?php echo IRB_BB_PATH ?>/js/bb.js"></script>			

<div class="inp">
<label>ФИО</label>
<?php echo $POST['value4'] ?> <?php echo $POST['value3'] ?>
</div>

<div class="inp">
<label>Логин</label>
<?php echo $POST['value5'] ?>
</div>

<div class="inp">
<label>Емайл</label>
<?php echo $POST['value6'] ?>
</div>

<div class="inp">
<label>Група</label>
<?php 
 if ( $POST['value1']  == 'user' )  {     $n1 = 'Пользователь'; }    else  {  $n1 = ''; } ; 
 if ( $POST['value1']  == 'student' )  {  $n2 = 'Студент'; }    else  {  $n2 = ''; } ; 
 if ( $POST['value1']  == 'trainer' )  {  $n3 = 'Тренер'; }    else  {  $n3 = ''; } ; 
 if ( $POST['value1']  == 'partner' )  {  $n4 = 'Партнер'; }    else  {  $n4 = ''; } ; 
 
?>

<select name="form[value1]" class="selectstyle">
     <option value="<?php echo $POST['value1'] ?>"><?php echo $n1; echo $n2; echo $n3; echo $n4;  ?></option>
	 <option value=""></option>
     <option value="user">Пользователь</option>
     <option value="student">Студент</option>
     <option value="trainer">Тренер</option>
	 <option value="partner">Партнер</option>
</select>
</div>

<div class="inp">
<label>Должность</label>
<input size="70" name="form[value2]" type="text" value="<?php echo $POST['value2'] ?>"/>
</div>







<div class="inp"><input type="submit" name="ok" value="Сохранить" /></div>
</form>





	
			
			
				

		</div> 
	</div> 
