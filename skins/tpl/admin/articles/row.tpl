			<div class="listrow"><?php echo $tpl_rutitle; ?>
			<span class="panel">
			<?php if(!empty($tpl_public_link)): ?> <a href="<?php echo $tpl_public_url; ?>"><?php echo $tpl_public_link; ?></a><?php endif; ?>
			<a href="<?php if(!empty($tpl_public_url)): ?> <?php echo href('rem=edit', 'id='. $tpl_id); ?>"><img width="12" src="/skins/images/admin/edit.png"></a> <?php endif; ?>
			<a href="<?php if(!empty($tpl_public_url)): ?><?php echo href('rem=delete', 'id='. $tpl_id); ?>" onclick="return confirm('Esti sigur?')"><img width="12" src="/skins/images/admin/delete.png"></a> <?php endif; ?> </span>
			</div>
