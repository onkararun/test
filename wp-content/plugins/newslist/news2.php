<?php 
include_once('/var/www/html/test/wp-config.php');
include_once('/var/www/html/test/wp-load.php');
include_once('/var/www/html/test/wp-includes/wp-db.php');

echo $search_text = $_POST['user-search-text'];

if ($search_text != '') {
  wp_redirect('http://localhost/test/wp-admin/admin.php?page=newslist/news.php&search='. $search_text );
  exit();
} else {
	wp_redirect(home_url().'/wp-admin/admin.php?page=newslist/news.php');
	exit();
}
 

?>
