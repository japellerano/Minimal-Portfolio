<?php get_header(); ?>
   <div class="content">
		<div class="single-project">
			<?php the_post(); ?>
			
			<div class="left-column">
				<div id="coin-slider">
					<a href="#"><img src="<?php echo get_post_meta($post->ID, 'portfolio_meta_box_image1', true); ?>" />
						<span class="description">
							<?php echo get_post_meta($post->ID, 'portfolio_meta_box_image1_desc', true); ?>
						</span>
					</a>
					<a href="#"><img src="<?php echo get_post_meta($post->ID, 'portfolio_meta_box_image2', true); ?>" />
						<span class="description">
							<?php echo get_post_meta($post->ID, 'portfolio_meta_box_image2_desc', true); ?>
						</span>
					</a>
					<a href="#"><img src="<?php echo get_post_meta($post->ID, 'portfolio_meta_box_image3', true); ?>" />
						<span class="description">
							<?php echo get_post_meta($post->ID, 'portfolio_meta_box_image3_desc', true); ?>
						</span>
					</a>
					<a href="#"><img src="<?php echo get_post_meta($post->ID, 'portfolio_meta_box_image4', true); ?>" />
						<span class="description">
							<?php echo get_post_meta($post->ID, 'portfolio_meta_box_image4_desc', true); ?>
						</span>
					</a>
				</div>
			</div>
			
			<div class="right-column">
				<h2 class="project-title"><?php the_title(); ?></h2>
				<div class="information">
					<p class="website-link"><a href="<?php echo get_post_meta($post->ID, 'portfolio_meta_box_url', true); ?>"><?php echo get_post_meta($post->ID, 'portfolio_meta_box_url', true); ?></a></p>
					
					<p class="development">Scope: <?php the_terms($post->ID, 'categoryportfolio', '', ', ', ' '); ?></p>
				</div>
				<?php the_content(); ?>
			</div>
			<div class="clear"></div>
		</div>
	</div>

<?php get_footer(); ?>