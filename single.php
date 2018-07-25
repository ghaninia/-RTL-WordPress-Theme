<?php get_header(); ?>
<?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>
        <section id="content" class="container">
        <article class="article article-type-post" itemscope itemprop="blogPost">
            <h2 class="title" itemprop="name"><?php the_title(); ?></h2>
            <h4 class="time">
                <time  itemprop="datePublished"><?php the_time("l,j F y") ;?></time>
            </h4>
            <section class="content">
                <?php the_content(); ?>
            </section>
        </article>
        </section>
    <?php endwhile; ?>
<?php endif; ?>

    <!-- Paging -->
    <section class="pagination">
        <nav class="container">
                <?php
                    $nextPost = get_next_post();
                    $link = get_permalink($nextPost->ID);
                    $title = $nextPost->post_title;
                    if ( isset($link,$title) )
                    {
                        printf('<a class="extend prev" rel="prev" href="%s"><i><-</i>' , $link ) ;
                        printf('<span>%s</span></a>' , $title ) ;
                    }
                ?>

                <?php
                    $prevPost = get_previous_post();
                    $link = get_permalink($prevPost->ID);
                    $title = $prevPost->post_title;
                    if ( isset($link,$title) )
                    {
                        printf('<a class="extend next" rel="next" href="%s"><i>-></i>' , $link ) ;
                        printf('<span>%s</span></a>' , $title ) ;
                    }
                ?>
        </nav>
    </section>
    <!-- /Paging -->

<?php get_footer() ;?>