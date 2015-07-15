<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of BaseModel
 *
 * @author valerio
 */
abstract class StigghiuModel{
    //put your code here
    static  $md;
    private $_name_model;
    private $conf;
    
    static function createModel($obj,&$lib,$primary=null,$schema=null){
        global $md;
        
        if(!isset($md)){
            
            $md=$obj;
            
            $md->setLibrary($md);
            $md->init();
            
        }
        
        return $md;
    }
    
    
    public function __construct(){
        $this->_name_model=$name;
        
    }
    
    public function setLibrary(&$config){
        $this->conf=$config;
    }
    public function getLibrary(){
        return $this->conf;
    }
    
    
    abstract function init();
    
    
    
    
}

?>
