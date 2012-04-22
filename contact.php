<?php /* Template Name: Contact */ ?>
<?php get_header(); ?>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

	<div class="content">
		<div class="page-wrapper">
			<div class="contact-form">
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					<h2 class="heading"><?php the_title(); ?></h2>
					<?php the_content(); ?>
				<?php endwhile; endif; ?>
				<?php wp_reset_query(); ?>
			</div>
			<div class="social-media">
				<div class="github social-item">
					<a href="<?php echo get_option('github_link'); ?>"><img src="<?php echo get_option('github_logo'); ?>" width="86" height="38" alt="Git Hub Link" /></a>
				</div>
				<div class="twitter social-item">
					<a href="https://twitter.com/<?php echo get_option('twitter_username'); ?>" class="twitter-follow-button" data-show-count="false">Follow @<?php echo get_option('twitter_username'); ?></a>
					<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
				</div>
				
				<div class="facebook social-item">
					<div class="fb-like" data-href="http://facebook.com/jamespellerano" data-send="false" data-width="190" data-show-faces="false"></div>
				</div>
			</div>
			<div class="clear"></div>
		</div>
	</div>
<?php get_footer(); ?>