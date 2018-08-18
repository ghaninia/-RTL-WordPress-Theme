<?php
$prefix = "option_" ;
$options = [
    [
        'name' => 'copyright' ,
        'type' => 'textarea' ,
        'id'   => sprintf("%scopyright" , $prefix ) ,
        'desc' => 'متن کپی رایت را وارد نمایید' ,
        'std'  => 'این سایت وابسته به هیچ نهاد و ارگانی نمیباشد.' ,
    ],
    [
        'name' => 'logo' ,
        'type' => 'file' ,
        'id'   => sprintf("%slogo" , $prefix ) ,
        'desc' => 'لوگو سایت را وارد نمایید' ,
        'std'  => get_template_directory_uri() .'/images/logo.svg'
    ],
    [
        'name' => 'ico' ,
        'type' => 'file' ,
        'id'   => sprintf("%sico" , $prefix ) ,
        'desc' => 'شورت آیکون سایت را وارد نمایید' ,
        'std'  => get_template_directory_uri() .'/images/logo.ico'
    ]
];
function optionverb() {

    global $themename, $options ;
    $optionName = "ویرایش پوسته" ;

    $currentPage = $_SERVER['REQUEST_URI'] ;
    if ( $_GET['page'] == basename(__FILE__) ) {
        if ( 'save' == $_REQUEST['action'] ) {
            foreach ($options as $value) {
                update_option( $value['id'], $_REQUEST[ $value['id'] ] ); }
            foreach ($options as $value) {
                if( isset( $_REQUEST[ $value['id'] ] ) ) {
                    update_option( $value['id'], $_REQUEST[ $value['id'] ]  );
                } else {
                    delete_option( $value['id'] );
                }
            }
            header("Location:{$currentPage}&saved=true");
            die;
        } else if( 'reset' == $_REQUEST['action'] ) {
            foreach ($options as $value) {
                delete_option( $value['id'] );
                update_option( $value['id'], $value['std'] );}
            header("Location:{$currentPage}&reset=true");
            die;
        }
    }
    add_theme_page($themename." Options", $optionName , 'edit_themes', basename(__FILE__), 'viewoption');
}
add_action('admin_menu', 'optionverb');

function viewoption(){
    wp_enqueue_media();
    wp_enqueue_script( 'script', get_template_directory_uri() . '/js/option.js', array ( 'jquery' ), 1.1, true);

    global $options , $prefix;
    echo '<div class="wrap">' ;
        if ( $_REQUEST['saved'] )
            printf('<div class="updated"><p>تنظیمات با موفقیت ذخیره شد !!</p></div>') ;
        if ( $_REQUEST['reset'] )
            printf('<div class="updated"><p>بازگردانی به حالت اولیه انجام شد !!</p></div>') ;
        printf('<form method="post">') ;
            echo '<table class="form-table">' ;
                echo '<tbody>' ;
                    foreach ($options as $item) {
                        $value = get_settings( $item['id']) == false ? $item['std'] : get_settings( $item['id']) ;
                        echo '<tr>';
                            printf('<th scope="row"><label for="%s">%s</label></th>' , $item['name'] , $item['desc'] ) ;
                            echo '<td>' ;
                            switch ($item['type']){
                                case "textarea" : {
                                    printf('<textarea name="%s" id="%s" class="regular-text">%s</textarea>' , $item['id'] , $item['name'] , $value ) ;
                                    break;
                                }
                                case "file" : {
                                    printf('<input readonly name="%s"  type="url" id="%s" value="%s" class="regular-text">' , $item['id'] , $item['name'] , $value ) ;
                                    printf('<input accept="image/*" type="button" id="upload-btn" class="button-secondary" value="Upload Image">');
                                    break ;
                                }
                            }
                            echo '</td>' ;
                        echo '</tr>' ;
                    }
                echo '</tbody>' ;
            echo '</table>' ;
            printf('<p class="submit"><input name="save" type="submit" value="ذخیره اطلاعات" class="button button-primary button-large" />');
            printf('<input type="hidden" name="action" value="save" /></p>');
        printf('</form>');
    echo "</div>" ;
}

function themeOption($key)
{
    global $options , $prefix;
    $key = $prefix.$key  ;
    $option = get_settings($key) ;
    if ($option == false)
    {
        foreach ($options as $item)
        {
            if ($item['id'] == $key )
                return isset($item['std']) ? $item['std'] : "" ;
        }
        return "" ;
    }
    return $option ;
}