<?php get_header(); ?>
   <div class="content">
		<div class="single-project">
			<?php the_post(); ?>
			
			<div class="left-column">
				<div id="coin-slider">
				
					<!-- First Image -->
					<a href="#"><img src="<?php echo get_post_meta($post->ID, 'portfolio_meta_box_image1', true); ?>" alt="<?php the_title(); ?> Portfolio Image 1" />
						<span class="description">
							<?php echo get_post_meta($post->ID, 'portfolio_meta_box_image1_desc', true); ?>
						</span>
					</a>
										
					<a href="#"><img src="<?php echo get_post_meta($post->ID, 'portfolio_meta_box_image2', true); ?>" alt="<?php the_title(); ?> Portfolio Image 2" />
						<span class="description">
							<?php echo get_post_meta($post->ID, 'portfolio_meta_box_image2_desc', true); ?>
						</span>
					</a>
					<a href="#"><img src="<?php echo get_post_meta($post->ID, 'portfolio_meta_box_image3', true); ?>" alt="<?php the_title(); ?> Portfolio Image 3" />
						<span class="description">
							<?php echo get_post_meta($post->ID, 'portfolio_meta_box_image3_desc', true); ?>
						</span>
					</a>

					<!-- Fourth Image -->
					<?php
						$url4 = get_post_meta('portfolio_meta_box_image4', true);
						if ($url4 == "") 
						{ 
							echo ""; 
						} 
						else 
						{ ?>
							<a href="#"><img src="<?php echo get_post_meta( 'portfolio_meta_box_image4', true); ?>" alt="<?php the_title(); ?> Portfolio Image 4" />
								<span class="description">
									<?php echo get_post_meta($post->ID, 'portfolio_meta_box_image4_desc', true); ?>
								</span>
							</a>
					<?php	} ?>
				</div>
			</div>
			
			<div class="right-column">
				<h2 class="project-title"><?php the_title(); ?></h2>
				<div class="information">
					<?php $link = get_post_meta($post->ID, 'portfolio_meta_box_url', true); ?>
					<p class="website-link"><a href="http://<?php echo $link; ?>"><?php echo $link; ?></a></p>
					
					<p class="development">Scope: <?php the_terms($post->ID, 'categoryportfolio', '', ', ', ' '); ?></p>
				</div>
				<?php the_content(); ?>
			</div>
			<div class="clear"></div>
		</div>
	</div>

<?php get_footer(); ?>