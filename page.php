<?php get_header(); ?>
<?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>
        <section id="content" class="container">
            <article class="article article-type-post" itemscope itemprop="blogPost">
                <h2 class="title" itemprop="name"><?php the_title(); ?></h2>
                <section class="content">
                    <?php the_content(); ?>
                </section>
            </article>
        </section>
    <?php endwhile; ?>
<?php endif; ?>
<?php get_footer() ;?>