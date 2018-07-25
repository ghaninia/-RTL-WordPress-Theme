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


function Ycopyright() {
    global $wpdb;
    $copyright_dates = $wpdb->get_results("SELECT min(post_date_gmt) AS firstdate, max(post_date_gmt) AS lastdate FROM $wpdb->posts WHERE post_status = 'publish'");
    $output = '';
    if($copyright_dates) {
        $copyright = mysql2date( "Y" , $copyright_dates[0]->firstdate ) ;
        if($copyright_dates[0]->firstdate != $copyright_dates[0]->lastdate ) {
            $copyright .= '-' . mysql2date( "Y" , $copyright_dates[0]->lastdate );
        }
        $output = $copyright;
    }
    return $output;
}

