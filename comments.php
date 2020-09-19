<?php
if(comments_open())
{ ?>
    <h3 class="comments-count"> <?php comments_number('0 Comments','1 Comment','% Comment');?></h3>
<?php
    echo '<ul class="list-unstyled comments-list">';
    $arguments=array(
        'max_depth' =>3,
        'avatar_size' =>64, 
        'type'=>'comment',
    );
wp_list_comments($arguments);
echo '</ul>';

comment_form();
}
else
{
echo"No Comments";
}
