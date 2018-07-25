<?php get_header(); ?>
<section class="container article-list">
    <?php
    $day_check = '';
    while (have_posts())
    {
        the_post();
        $day = get_the_date('j');
        if ($day != $day_check) {
            printf( "<h3>%s</h3>" , get_the_date("Y") ) ;
        }
        printf("<article>") ;
        printf("<time>%s</time>" , get_the_time("m/d") ) ;
        printf("<h4><a href='%s'>%s</a></h4>" , get_the_permalink() , get_the_title() ) ;
        printf('</article>') ;
        $day_check = $day;
    } ?>
</section>
