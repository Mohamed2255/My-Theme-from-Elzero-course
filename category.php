<?php get_header(); ?>
<div class="container home-page">
<div class="row">
<h1><?</h1>
<?php 
if ( have_posts() ) {
	while ( have_posts() ) {
        the_post(); ?>
        <div class="col-md-6">
        <div class="main-post">
        <h3 class="post-title">
        <a href="<?php the_permalink(); ?>">
        <?php the_title();?>
        </a>
        </h3>
        <span class="post-author">
        <i class="fa fa-user"></i> <?php the_author_posts_link();?> </span>
        <span class="post-date"><i class="fas fa-calendar-alt"></i> <?php the_time('F jS, Y'); ?> </span>
        <span class="post-comment"><i class="fas fa-comment">
        </i> <?php comments_popup_link('0 comment','one comment','% comments','comments-link','Comments disabled'); ?> </span>
        <?php the_post_thumbnail('', array( 'class' => 'img-thumbnail')); ?>
        <div class="post-content"><?php the_excerpt() ?>
        <a href="<?php the_permalink(); ?>">Read more...</a>
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
</div>
<?php
	} // end while
} // end if
echo'<div class="clearfix"></div>';
/*
  echo'<div class="post-pagination">';
if ( get_previous_posts_link() ) {
    previous_posts_link('<i class="fa fa-chevron-left fa-fw fa-lg"></i> New Articles');
}else
{
   echo '<span class="prev-span">New</span>'; 
}
if ( get_next_posts_link() ) {
    next_posts_link('Old Articles <i class="fa fa-chevron-right fa-fw fa-lg"></i>');
}else
{
   echo '<span class="next-span">Old</span>'; 
}
echo"</div>";*/
?>
</div>
<div class="pagination-number">
<?php echo numbering_pagination();?>
</div>
</div>



<?php get_footer(); ?>