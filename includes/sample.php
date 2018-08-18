<?php
add_action('admin_menu' , 'join_function_sample' );
function join_function_sample(){
    add_theme_page('نمونه کارها', 'نمونه کارها', 'edit_theme_options', 'worksamples', 'worksamples');
}

function worksamples()
{
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');

    global $wpdb;

    $sql = "CREATE TABLE IF NOT EXISTS `{$wpdb->base_prefix}samples` (
        `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
        `taskmaster` VARCHAR(255) NULL DEFAULT NULL,
        `taskmaster_msg` TEXT NULL DEFAULT NULL,
        `name` VARCHAR(255) NOT NULL,
        `description` TEXT NULL DEFAULT NULL,
        `content` TEXT NULL DEFAULT NULL,
        `skills` TEXT NULL DEFAULT NULL,
        `pictures` TEXT NULL DEFAULT NULL,
        `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
        `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        PRIMARY KEY (`id`)
      )COLLATE='utf8_general_ci'" ;

    dbDelta($sql);

    $skills = [
        'css' ,
        'html' ,
        'html5' ,
        'js' ,
        'vuejs' ,
        'jquery' ,
        'angular' ,
        'php' ,
        'php7' ,
        'laravel' ,
        'codeigniter' ,
        'csharp' ,
        'python' ,
        'jango' ,
        'mysql'
    ];

    

}

function insert()
{

}

function update()
{

}