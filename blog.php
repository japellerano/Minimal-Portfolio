<?php /* Template Name: Blog */ ?>

<?php get_header(); ?>

<div class="content">
	<div id="posts">
		<?php $args = array('posts_per_page' => 8); ?>
		<?php $loop = new WP_Query($args); ?>
		<?php if ($loop->have_posts()) : while ($loop->have_posts()) : $loop->the_post(); ?>
			<article class="blog-post">
				<h2 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
				<p class="meta">By: <?php the_author(); ?>. On: <?php the_time('jS F, Y'); ?>. Under: <?php the_category(', '); ?>. The Tags: <?php the_tags(); ?>.</p>
				<?php the_excerpt(); ?>
			</article>
		<?php endwhile; endif; ?>
	</div>
	<div id="sidebar">
		<?php get_sidebar(); ?>
	</div>
	<div class="clear"></div>
</div>

<?php get_footer(); ?>