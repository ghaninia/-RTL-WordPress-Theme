<?php

function asset($url){
    return sprintf("%s%s", bloginfo('get_template_url') , $url );
}