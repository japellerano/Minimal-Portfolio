<?php /* Template Name: Home */ ?>
<?php get_header(); ?>

   <div class="clear"></div>
   <div id="content">
		<div class="container">
		
			<!-- Featured Post -->
			<div class="featured">
				<?php $args = array('post_type' => 'project', 'posts_per_page' => 1); ?>
				<?php $loop = new WP_Query($args); ?>
				
				<?php while ($loop->have_posts()) : $loop->the_post(); ?>
					<article class="project featured">
						<?php the_post_thumbnail('portfolio-small'); ?>
						<h2 class="project-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
						<h5 class="project-category"><?php the_terms($post->ID, 'categoryportfolio', '', ' ', ' '); ?></h5>
						
						<?php the_excerpt(); ?>
						<!-- <a class="read-more" href="<?php the_permalink(); ?>">See More</a> -->
					</article>
				<?php endwhile; ?>
				<?php wp_reset_query(); ?>
			</div>
			
			<!-- About -->
			<div class="about">
				<p><?php echo get_option('artist_statement'); ?></p>
			</div>
			
			<!-- Skills -->
			<div class="skills">
				<?php $skill_args = array('post_type' => 'skills', 'posts_per_page' => 4); ?>
				<?php $skill_loop = new WP_Query($skill_args); ?>
				
				<?php while ($skill_loop->have_posts()) : $skill_loop->the_post(); ?>
					<article class="skill">
						<?php 
							$first 	= get_option('first_class');
							$second 	= get_option('second_class');
							$third 	= get_option('third_class');
							
							if (get_post_meta($post->ID, 'skill_meta_box_select', true) == "first")
							{
								echo '<img src="'.$first.'" class="first symbol" height="30px" width="30px" />';
							}
							elseif (get_post_meta($post->ID, 'skill_meta_box_select', true) == "second")
							{
								echo '<img src="'.$second.'" class="second symbol" height="30px" width="30px" />';
							}
							elseif (get_post_meta($post->ID, 'skill_meta_box_select', true) == "third")
							{
								echo '<img src="'.$third.'" class="third symbol" height="30px" width="30px" />';
							}
						?>
						<h2 class="skill-title"><?php the_title(); ?></h2><br />
						<!-- <h5 class="skill-category"><?php echo ucfirst(get_post_meta($post->ID, 'skill_meta_box_select', true)); ?></h5> -->
					</article>
				<?php endwhile; ?>
				<?php wp_reset_query(); ?>
			</div>
		</div>
		
		<div class="clear"></div>
		
		<div class="container bottom">

			<!-- News -->
			<div class="news third-container">
				<div class="third-header"><h2 class="small-header">News</h2></div>
				<div class="third-content">
					<?php
						$news_query = new WP_Query('category_name=news&posts_per_page=5');
						while ($news_query->have_posts()) : $news_query->the_post(); ?>
							<article class="news-post">
								<h3 class="news-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
							</article>
						<?php endwhile; ?>
				</div>
			</div>
			
			<!-- Twitter -->
			<div class="twitter third-container">
				<div class="third-header"><h2 class="small-header">Twitter</h2></div>
				<div class="third-content">
					<?php
						$twitter = get_option('twitter_username');
						include_once(ABSPATH . WPINC . '/feed.php');
						$rss = fetch_feed('https://api.twitter.com/1/statuses/user_timeline.rss?screen_name='.$twitter.'');
						$maxitems = $rss->get_item_quantity(5);
						$rss_items = $rss->get_items(0, $maxitems);
					?>
					
					<ul class="twitter">
						<?php
							if ($maxitems == 0)
								echo '<li>No items.</li>';
							else
								foreach ($rss_items as $item) : ?>
									<li class="twitter-item">
										<a href="<?php echo $item->get_permalink(); ?>">
											<?php echo $item->get_title(); ?>
										</a>
									</li>
								<?php endforeach; ?>
					</ul>
				</div>
			</div>
			
			<!-- Favorited Twitter -->
			<div class="twitter third-container">
				<div class="third-header"><h2 class="small-header">Twitter Favorites</h2></div>
				<div class="third-content">
					<?php
						$laterstars = get_option('laterstars_url');
						include_once(ABSPATH . WPINC . '/feed.php');
						$rss_fav = fetch_feed($laterstars);
						$maxitems_fav = $rss_fav->get_item_quantity(5);
						$rss_items_fav = $rss_fav->get_items(0, $maxitems_fav);
					?>
	
					<ul class="twitter">
						<?php 
							if ($maxitems_fav == 0) 
								echo '<li>No items.</li>';
							else
								// Loop through each feed item and display each item as a hyperlink.
								foreach ( $rss_items_fav as $item_fav ) : ?>
									<li class="twitter-item">
										<a href='<?php echo $item_fav->get_permalink(); ?>'>
											<?php echo $item_fav->get_title(); ?>
										</a>
									</li>
								<?php endforeach; ?>
					</ul>
				</div>
			</div>
		</div>
	</div>
<?php get_footer(); ?>