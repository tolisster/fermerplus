<!-- ./skins/tpl/admin/main/form_edit.tpl begin -->
<script type="text/javascript">
	WYSIWYG.attach('editor', full);
</script>
<form action="" method="post">
<h3>Редактирование страницы  <strong style="color:#0000FF"><?php echo $page; ?></strong>&nbsp;&nbsp;
<a href="<?php echo href('rem=read'); ?>">Вернуться</a></h3>
<h4>Название для ссылки </h4>
<input name="form[value1]" type="text" size="70" value="<?php echo $page; ?>" /><br />
<br />
<textarea id="editor" name="form[value2]" style="width:850px;height:400px;"><?php echo $edittext ?></textarea><br />
<input name="ok" type="submit" value="Редактировать" />
</form>
<!-- ./skins/tpl/admin/main/form_edit.tpl end -->
