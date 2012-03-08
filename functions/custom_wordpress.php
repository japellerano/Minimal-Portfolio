<?php

function replace_admin_text()
{
	echo '<span id="footer-thankyou">Developed by <a href="http://www.jamespellerano.com" target="_blank">James Pellerano</a></span>';
}
add_filter('admin_footer_text', 'replace_admin_text');  
?>