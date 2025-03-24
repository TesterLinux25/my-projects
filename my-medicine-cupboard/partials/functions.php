<?php

function setActiveClass($pageName){


    $current_page = basename($_SERVER['PHP_SELF']);
    //echo $current_page;

    return ($current_page === $pageName)?"active":'';
}

?>