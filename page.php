<?php get_header(); ?>

<div class="content">
	<div class="page-wrapper">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<h2 id="page" class="heading"><?php the_title(); ?></h2>   
			<?php the_content(); ?>
		<?php endwhile; endif; ?>
	</div>
</div>

<?php get_footer(); ?>