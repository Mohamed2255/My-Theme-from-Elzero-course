<?php get_header(); ?>

<div class="container author-page">
<h1 class="text-center profile-name"><?php the_author_meta('nickname'); ?> Page</h1>
<div class="author-main-info">
<div class="row">
<div class="col-md-3">
<?php 
$arg=array(
    'class'=>'img-responsive img-thumbnail mx-auto d-block'
);

echo get_avatar( get_the_author_meta( 'ID' ), 196,'','User Avatar',$arg ); 
?>
</div>
<div class="col-md-9">
<ul class="author-names list-unstyled">
<li><span>First Name:</span><?php the_author_meta('first_name'); ?></li>
<li><span>Last Name:</span><?php the_author_meta('last_name'); ?></li>
<li><span>Nick Name:</span><?php the_author_meta('nickname'); ?> </li>
</ul>
<hr>
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
</div>
<div class="row author-stats">
<div class="col-md-3">
    <div class="stats">
       Posts Count
        <span><?php echo count_user_posts(get_the_author_meta( 'ID' )) ;?></span>
    </div>
</div>
<div class="col-md-3">
<div class="stats">
        Comments Count
        <span>
            <?php
            $args=array(
                'user_id'=>get_the_author_meta( 'ID' ),
                'count'=>true
            );
            echo get_comments($args);
            ?>
        </span>
    </div>
</div>
<div class="col-md-3">
<div class="stats">
       Total Posts View
        <span>0</span>
    </div>
</div>
<div class="col-md-3">
<div class="stats">
       Testing
        <span>0</span>
    </div>
</div>
</div>












<h3 class="auth-title"> Latest [<?php echo count_user_posts(get_the_author_meta( 'ID' )) ;?>] Posts OF <?php the_author_meta('nickname'); ?></h3>
<div class="row">
<?php 
$args=array(
    'author' =>get_the_author_meta( 'ID' ),
    'posts_per_page'=>-1
);
// The Query
$the_query = new WP_Query( $args );


if ( $the_query->have_posts() ) {?>
<?php
    while (  $the_query->have_posts() ) {
        $the_query->the_post(); ?>  
        <div class="col-sm-3">
        <?php the_post_thumbnail('', array( 'class' => 'img-thumbnail')); ?>
        </div>
        <div class="col-sm-9 profile-posts">
        <h3 class="post-title">
        <a href="<?php the_permalink(); ?>">
        <?php the_title();?>
        </a>
        </h3>
        <span class="post-date"><i class="fas fa-calendar-alt"></i> <?php the_time('F jS, Y'); ?> </span>
        <span class="post-comment"><i class="fas fa-comment">
        </i> <?php comments_popup_link('0 comment','one comment','% comments','comments-link','Comments disabled'); ?> </span>
        <div class="post-content"><?php the_excerpt() ?>
        </div>
</div>
<?php
	} // end while
} // end if
wp_reset_postdata();?>
</div>
<h3 class="auth-comments-title">Comments OF <?php the_author_meta('nickname'); ?></h3>
<?php $comments_per_page=6;
$comments_args=array(
    'user_id' =>get_the_author_meta( 'ID' ),
    'number'=>$comments_per_page,
    'status'=>'approve',
    'post_status'=>'publish',
    'post_type'=>'post'
);
$comments=get_comments($comments_args);
if ($comments) {
foreach($comments as $comment)
{?>
<div class="comments">
<h3 class="post-title">
<a href="<?php echo(get_permalink($comment->comment_post_ID)); ?>">
<?php echo (get_the_title($comment->comment_post_ID));?>
</a>
</h3>
<span class="post-date">
<i class="fas fa-calendar-alt"></i> <?php echo($comment->comment_date); ?> 
</span>
<div class="comment-content">
<?php echo($comment->comment_content); ?>
</div>
</div>
<?php
}
}else
{
    echo "There Is No Comments";
}
?>
</div>









<?php get_footer(); ?>