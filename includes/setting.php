<?php
$prefix = "option_" ;
$optionName = "ویرایش پوسته" ;
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
        'std'  => 'images/logo.svg'
    ]
];

function optionverb() {
    global $themename, $options , $optionName;
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
                        switch ($item['type']){
                            case "textarea" : {
                                break;
                            }
                            case "file" : {
                                echo '<tr>';
                                    printf('<th scope="row"><label for="%s">%s</label></th>' , $item['name'] , $item['desc'] ) ;
                                    echo '<td>' ;
                                        printf('<input readonly name="%s"  type="url" id="%s" value="%s" class="regular-text">' , $item['id'] , $item['name'] , $item['std'] ) ;
                                        printf('<input type="button" id="upload-btn" class="button-secondary" value="Upload Image">');
                                    echo '</td>' ;
                                echo '</tr>' ;
                            }
                        }
                    }
                echo '</tbody>' ;
            echo '</table>' ;
            printf('<p class="submit"><input name="save" type="submit" value="ذخیره اطلاعات" class="button button-primary button-large" />');
            printf('<input type="hidden" name="action" value="save" /></p>');
        printf('</form>');
    echo "</div>" ;
}