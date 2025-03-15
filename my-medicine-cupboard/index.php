<?php 
//include "register.php"

?>



    <?php 
    

    $status_page='logout';
    if( $status_page === 'logout'){
        include "login.php";
           
    }else{
        include "register.php";
    }
    ?>
