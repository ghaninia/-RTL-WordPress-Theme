<?php

require_once "includes/Walker.php" ;

///* URL افزودن ASSET  *///

function asset($url){
    return sprintf("%s%s", bloginfo('get_template_url') , $url );
}

///* اضافه کردن فهرست *///
add_action( 'init', 'register_my_menus' );
function register_my_menus() {
    register_nav_menus(
        array(
            'header-menu' => __( 'فهرست سربرگ' )
        )
    );
}