<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>AdminPanel 2.0</title>
	<meta http-equiv="Content-Language" content="English" />
	<meta name="Robots" content="index,follow" />
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<link rel="stylesheet" type="text/css" href="/skins/css/adminstyle.css" media="screen" />
		<script type="text/javascript" src="/ckeditor/ckeditor.js"></script>
	<script src="/ckeditor/_sample/sample.js" type="text/javascript"></script>
	<link href="/ckeditor/_sample/sample.css" rel="stylesheet" type="text/css" />
</head>
<body>

<div id="wrap">

	<div id="top">
				<div class="rights"></div>
				<div id="search">
   </div>


  <div class="lefts">
		<h1>adminPanel 2.0</h1>
		<h2>Elaborat MediaPrintLux, Grigorii Simion</h2>
  </div>
</div>
	
<?php if(!empty($_SESSION['admin']))  {include IRB_ROOT .'/skins/tpl/admin/menu.tpl'; } else { } ?>
	
<?php echo $content; ?>
	
	
<?php if(!empty($_SESSION['admin']))  {include IRB_ROOT .'/skins/tpl/admin/foot.tpl'; } else { } ?>	
	

</div>
	
	
</body>
</html>