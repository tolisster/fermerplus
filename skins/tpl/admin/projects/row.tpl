			<div class="listrow"><?php echo $tpl_rostat; ?> -  <?php echo $tpl_rostreet; ?>
			<span class="panel">
			<a style="padding-right:50px;" href="<?php echo $tpl_status_url; ?>"><?php echo $tpl_status_link; ?></a> 
			<a href="<?php echo $tpl_public_url; ?>"><?php echo $tpl_public_link; ?></a> 
			<a href="<?php echo href('rem=edit', 'id='. $tpl_id); ?>"><img width="12" src="/skins/images/admin/edit.png"></a> 
			<a href="<?php echo href('rem=delete', 'id='. $tpl_id); ?>" onclick="return confirm('Esti sigur?')"><img width="12" src="/skins/images/admin/delete.png"></a>  </span>
			
			</div>
