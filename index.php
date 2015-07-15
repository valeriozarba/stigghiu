<?php
/**
 * 
 * Project Stigghiu start
 * 
 * autore:  Valerio Zarba
 * email:   contatti@menostudio.it
 * 
 * 
 */
session_start();

//Gestione tipologie errori
error_reporting(E_ALL);


// Abilita o disabilita la notifica degli errori
ini_set("display_errors",1); 


// File di configurazione
include 'config/bootstrap.php';


$app=Stigghiu::init($conf);


$app->run();


exit;
?>