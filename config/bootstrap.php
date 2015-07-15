<?php

include_once 'class/loadlib.php';

define("_WEBSITE_","http://www.nomesitoweb.it");

define("_BASETEMPLATE_","app/templates/");
define("_UPLOAD_DIR_","public/uploads/");


define("GOOGLE_API","");
define("FACEBOOK_PUBLIC","");
define("FACEBOOK_PRIVATE","");
define("FACEBOOK_TOKEN","");
// e molto altro...



$DB=array(
    "NAME"=>"",
    "USER"=>"",
    "PSW"=>"",
    "HOST"=>"localhost");

$conf=array(
    "DB"=>$DB,
    "JS"=>array(),
    "CSS"=>array()
);

$ROUTECONF=array(
    
    "index"=>"index_controller"
    
);




?>