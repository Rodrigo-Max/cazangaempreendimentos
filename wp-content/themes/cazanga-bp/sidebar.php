<aside class="secondaryContent" id="sidebar">
	<?php if (isSidebarActive('sidebar')): ?>
		<ul>
			<?php dynamic_sidebar('sidebar'); ?>
		</ul>
	<?php endif; ?>
</aside>