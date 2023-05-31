
<?php // Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

	if ( post_password_required() ) { ?>
		<p class="nocomments">Esse post é protegido por senha. Faça login e digite a senha para ver.</p>
	<?php
		return;
	}
?>
<section id="comments">
	<h4>Deixe seu comentário!</h4>
	<div class="overflow-hidden">
		<div class="fb-comments" data-href="<?php echo esc_url(get_the_permalink()); ?>" data-width="" data-numposts="10" data-orderby="time"></div>
	</div>
</section>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v3.3&appId=527421947784024&autoLogAppEvents=1"></script>