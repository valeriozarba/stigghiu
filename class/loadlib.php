<?php


$lib=glob("class/*.php");
foreach($lib as $l){
    
    if($l!="loadlib.php"){
        require_once $l;
    }
    
}

$contr=glob("app/controllers/*.controller.php");
foreach($contr as $l){
    require_once $l;
}

$contr=glob("app/models/*.php");
foreach($contr as $l){
    require_once $l;
}


?>