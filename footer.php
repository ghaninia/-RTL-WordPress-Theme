<footer>
    <section class="container">
        <div class="delimiter">
            <a href="<?php bloginfo('url'); ?>" class="logo">
                <img src="<?= themeOption("logo") ;?>">
            </a>
        </div>
        <p>
            <?= Ycopyright(); ?>
            <br>
            <?= themeOption("copyright") ;?>
        </p>
    </section>
</footer>
<?php //wp_footer(); ?>