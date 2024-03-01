<?php get_header(); ?>

	<div class="post-hero">
		<div class="container">
			<h1><?php the_title(); ?></h1>
		</div>
	</div>
<?php
if ( have_posts() ) {
	?>
	<div class="post-content">
		<div class="container">
			<?php
			while ( have_posts() ) {
				the_post();
				?>
				<div class="post-content-inner">
					<?php the_content(); ?>
				</div>
			<?php } ?>
		</div>
	</div>
	<?php
}

get_footer();