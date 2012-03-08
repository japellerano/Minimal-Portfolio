<ul id="sidebar-items">
   <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar()) : ?>
      <li id="sidebar-about">
         <h3 class="heading sidebar">About</h3>
         <p>This is my blog</p>
      </li>
   <?php endif; ?>
</ul>

<div id="twitter">
   <h2 class="widgettitle">Twitter Feed</h2>
   <?php
      include_once(ABSPATH . WPINC . '/feed.php');
      $rss = fetch_feed('https://api.twitter.com/1/statuses/user_timeline.rss?screen_name=japellerano');
      $maxitems = $rss->get_item_quantity(3);
      $rss_items = $rss->get_items(0, $maxitems);
   ?>
   
   <ul>
      <?php 
         if ($maxitems == 0) 
            echo '<li>No items.</li>';
         else
         // Loop through each feed item and display each item as a hyperlink.
            foreach ( $rss_items as $item ) : 
      ?>
      <li class="twitter-post">
         <a href='<?php echo $item->get_permalink(); ?>'>
            <?php echo $item->get_title(); ?>
         </a>
      </li>
      <?php endforeach; ?>
   </ul>
</div>