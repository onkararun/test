<?php 
include_once('/var/www/html/test/wp-config.php');
include_once('/var/www/html/test/wp-load.php');
include_once('/var/www/html/test/wp-includes/wp-db.php');
wp_enqueue_style('mysample');


include 'function.php';

?>
<?php

?>


<div class=main>
    <div class="child1">
    
     </tr> 
         <table border="1">
      <tr>
           <th>Title</th>
           <th>Author</th>
           <th>Date</th>
      </tr>
    <?php

      
           $search = $_GET['search'];
          if (!empty($search)) {
              $asuser= search_query();

                 foreach ( $asuser as $print )   {
                  echo '<tr>
                  <td> '.$print->post_title.'</td>
                  <td> '.check_author($print->post_author).'</td>
                  <td> '.date('d-m-y', strtotime($print->post_date)).'</td>

          </tr>';
      }
   }

elseif(isset($_POST['news_post'])){
   $asuser=news_post();
      
      foreach ( $asuser as $print )   {
      echo '<tr>
      <td> '.$print->post_title.'</td>
      <td> '.check_author($print->post_author).'</td>
      <td> '.date('d-m-y', strtotime($print->post_date)).'</td>
    
  </tr>';
}
}

elseif(isset($_POST['page_post'])){
   $asuser=page_post();
      
      foreach ( $asuser as $print )   {
      echo '<tr>
      <td> '.$print->post_title.'</td>
      <td> '.check_author($print->post_author).'</td>
      <td> '.date('d-m-y', strtotime($print->post_date)).'</td>
    
  </tr>';
}
}

elseif(isset($_POST['news_list_post'])){
add_action( 'after_setup_theme', 'insert_category' );
   $asuser=news_list_post();
      
      foreach ( $asuser as $print )   {
      echo '<tr>
      <td> '.$print->post_title.'</td>
      <td> '.check_author($print->post_author).'</td>
      <td> '.date('d-m-y', strtotime($print->post_date)).'</td>
    
  </tr>';
}
}
else
{

          $asuser=pagination();

          foreach ( $asuser as $print )   {
          echo '<tr>
          <td> '.$print->post_title.'</td>
          <td> '.check_author($print->post_author).'</td>
          <td> '.date('d-m-y', strtotime($print->post_date)).'</td>

        </tr>';
      }

    }
    ?>           
  </table>
           </div>
           <div class="child2">
             <ul>
              <li id="parent_category">Categories</li>
              <form action =" " method="post">
               <a href="<?php echo(plugins_url('newslist/news.php')) ?>"  ><input name="news_post" type="submit" value="News" id="button"></a>
                <div> <a href="<?php echo(plugins_url('newslist/news.php')) ?>"  ><input name="page_post" type="submit" value="Page" id="button"></a></div>
                 <div> <a href="<?php echo(plugins_url('newslist/news.php')) ?>"  ><input name="news_list_post" type="submit" value="News_list" id="button"></a></div>
            </form>
            <a href="<?php echo(plugins_url('newslist/news2.php')) ?>"  id="button"><li>All Posts</li></a>
            <li>
               <form id = "user-search-from" name="user-search" method="POST" action="<?php echo(plugins_url('newslist/news2.php')) ?>">
                <input type="text" id="user-search-text" name="user-search-text" value="<?php echo($_GET['search']); ?>" >
                <input id="cons-number-save" type="submit" value="Search Posts">
             </form>
    </li>
  </ul>
</div>
</div>
</body>
</html>








