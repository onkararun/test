<?php
function check_author($status){
	if($status == 1){
		$status ='admin';
	}
	else{
    $status='user';
  }
  return $status;
}

function search_query()
{
                global $wpdb;
                 $search = $_GET['search'];
           $asuser = $wpdb->get_results("SELECT * FROM wp_posts WHERE post_title LIKE
           '%".$search."%' AND post_status LIKE 'publish'");
            return $asuser;
}

function news_post(){
	  global $wpdb;


 // $asuser = $wpdb->get_results("SELECT * FROM wp_posts WHERE category_name='news' AND post_status LIKE 'publish' ");
    $args = array( 'posts_per_page' => 10,  'category_name' => 'news');

$asuser = get_posts( $args );

 return $asuser;
}
function page_post(){
    global $wpdb;


 // $asuser = $wpdb->get_results("SELECT * FROM wp_posts WHERE category_name='news' AND post_status LIKE 'publish' ");
    $args = array( 'posts_per_page' => 10,  'category_name' => 'page');

$asuser = get_posts( $args );

 return $asuser;
}
function news_list_post(){
    global $wpdb;


 //$asuser = $wpdb->get_results("SELECT * FROM wp_posts WHERE category_name='news' AND post_status LIKE 'publish' ");
    $args = array( 'posts_per_page' => 10,  'category_name' => 'news_items');

$asuser = get_posts( $args );

 return $asuser;
}
function pagination()
{
	 $results_per_page = 8;

 global $wpdb;
 $rows= $wpdb->get_var( "SELECT COUNT(*) FROM wp_posts  WHERE post_status = 'publish'");
 $total_pages = ceil($rows / $results_per_page);

 echo "<div class='pagination'>";
 echo "PAGE:"."&nbsp";
         for ($i=1; $i<=$total_pages; $i++) {  // print links for all pages
          $link=$i-1;

          echo '<a href="'.$_SERVER['REQUEST_URI'].'&start_at='.$link.'">'.$i.'</a>';
        }

        if($_REQUEST['start_at']){
          $offset= $results_per_page * $_REQUEST['start_at'];

        }
        else{
          $offset=0;
        }
        $asuser = $wpdb->get_results("SELECT * FROM wp_posts WHERE post_status = 'publish' LIMIT $offset, $results_per_page ");
        return $asuser;
}



?>