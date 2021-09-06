<div style="display:grid; grid-template-columns: 1fr 1fr 1fr">
	<a href="?category=<?=$category['id']?>"><?=$category['title']?></a>
	<?php if($category['childs']): ?>
	<div style="display:grid; grid-template-columns: 1fr 1fr 1fr>
		<?php echo categories_to_string($category['childs']); ?>
	</div>
	<?php endif; ?>
	</div>