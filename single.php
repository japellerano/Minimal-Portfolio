<?php get_header(); ?>
	<script type="text/javascript">
		(function() {
			var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
			po.src = 'https://apis.google.com/js/plusone.js';
			var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
		})();
	</script>
	
	<div id="fb-root"></div>
	<script>
		(function(d, s, id) {
			var js, fjs = d.getElementsByTagName(s)[0];
			if (d.getElementById(id)) return;
			js = d.createElement(s); js.id = id;
			js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
			fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));
	</script>


   <div class="content">
   	<div class="single-post">
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<h2 id="page" class="post-title"><?php the_title(); ?></h2>
				
				<?php the_content(); ?>
			<?php endwhile; endif; ?>
      </div>
      <div class="side-post">
      	<p>Written by: <?php the_author(); ?>.</p>
      	<p>Posted on: <?php the_time('jS F Y'); ?>.</p>
      	<p>Posted in: <?php the_category(', '); ?>.</p>
      	<p>Tagged: <?php the_tags(); ?>.</p>
      	<div class="social">
      		<a href="https://twitter.com/share" class="twitter-share-button" data-via="japellerano">Tweet</a>
				<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
			
				<div class="fb-like" data-href="<?php the_permalink(); ?>" data-send="false" data-layout="button_count" data-width="450" data-show-faces="false"></div>
				
				<g:plusone size="small"></g:plusone>
      	</div>
      </div>
      <div class="clear"></div>
   </div>

<?php get_footer(); ?>