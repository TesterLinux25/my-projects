<?php
include "partials/head.php";
include "config/Db.php";
include "classes/Shoppingl.php";
session_start();




$database= new Db();
$db=$database->connect();

//class list
$shopping=new Shoppingl($db);


//thick 





//fetch list
$listll=$shopping->read();
//var_dump($list);

 
//  gd extention 
require_once __DIR__ . '/vendor/autoload.php';

//Create new PDF instance
$mpdf=new \Mpdf\Mpdf;

//Create our PDF
$data='';



$data .='<ol style="margin-left:3rem">';
    while($list=$listll->fetch_assoc()){
       $data .='<li style="font-size:25px; margin:10px">';
            $data .=$list['name'].'&nbsp;';
            $data .=$list['quantity'].'&nbsp;';
            $data .=$list['um'];
        $data .='</li>';
    }
$data .='<ol>';
//add data

//Write PDF
$mpdf->WriteHTML($data);

//Output to browser (D for download)
$mpdf->Output('myfile.pdf', 'D')

?>
