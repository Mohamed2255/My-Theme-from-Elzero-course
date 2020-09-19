<?php get_header(); ?>
<div class="container post-page">

<?php 
if ( have_posts() ) {
    while ( have_posts() ) {
        the_post(); ?>
        <div class="main-post single-post">
        <div class="edit-post">
        <?php edit_post_link('Edit <i class="fa fa-pencil-alt"></i>');?>
        </div>
        <h3 class="post-title">
        <a href="<?php the_permalink(); ?>">
        <?php the_title();?>
        </a>
        </h3>
        <span class="post-author">
        <span class="post-date"><i class="fas fa-calendar-alt"></i> <?php the_time('F jS, Y'); ?> </span>
        <span class="post-comment"><i class="fas fa-comment">
        </i> <?php comments_popup_link('0 comment','one comment','% comments','comments-link','Comments disabled'); ?> </span>
        <?php the_post_thumbnail('', array( 'class' => 'img-thumbnail')); ?>
        <div class="post-content">
        <?php the_content() ?>
        </div>
        <hr>
        <p class="categories"> 
        <i class="fa fa-tags"></i>
        <?php the_category( ', ' ); ?> </p>
        <p class="post-tags"> 
        <?php if(has_tag()){
            the_tags();
        }else{
            echo "No Tags";
        } ?> </p>

</div>
<?php
	} // end while
} // end if
echo'<div class="clearfix"></div>';
?>
<?php 
$random_posts_args=array(
    'posts_per_page'=>5,
    'orderby'=>'rand',
    'category__in'=>wp_get_post_categories($queried_object_id),
    'post__not_in'=>array($queried_object_id)
);
// The Query
$the_query = new WP_Query( $random_posts_args );


if ( $the_query->have_posts() ) {?>
<h3 class="random">Random Posts</h3>
<?php
    while (  $the_query->have_posts() ) {
        $the_query->the_post(); ?>  
<div class="random-posts">
        <h3 class="post-title">
        <a href="<?php the_permalink(); ?>">
        <?php the_title();?>
        </a>
        </h3>
</div>
<?php
	} // end while
} // end if
?>






































<div class="author">
<div class="row">
<div class="col-md-2">
<?php 
$arg=array(
    'class'=>'img-responsive img-thumbnail mx-auto d-block'
);

echo get_avatar( get_the_author_meta( 'ID' ), 128,'','User Avatar',$arg ); 
?>
</div>
<div class="col-md-10 author-infor">
<h4>
<?php the_author_meta('first_name'); ?>
  <?php the_author_meta('last_name'); ?>
  (<span><?php the_author_meta('nickname'); ?></span>)
</h4>
<?php
if(get_the_author_meta('description')){?>
<p>
    <?php the_author_meta( 'description' );?>
</p>
<?php } else 
{
    echo "There's No biography";
}

?>
</div>
</div>
<hr>
<p class="author-status">
User Posts Count :<span><?php echo count_user_posts(get_the_author_meta( 'ID' )) ;?></span> , 
User Prpfile Link :<?php the_author_posts_link(); ?>
</p>
</div>
<?php
echo'<hr class="comment-separator">';
  echo'<div class="post-pagination">';
if ( get_previous_post_link() ) {
    previous_post_link('%link','<i class="fa fa-chevron-left fa-fw fa-lg"></i> %title');
}else
{
   echo '<span class="prev-span">Prev</span>'; 
}
if ( get_next_post_link() ) {
    next_post_link('%link',' %title <i class="fa fa-chevron-right fa-fw fa-lg"></i>');
}else
{
   echo '<span class="next-span">Next</span>'; 
}
echo"</div>";
echo'<hr class="comment-separator">';
 comments_template(); 
?>

</div>


<?php get_footer(); ?>