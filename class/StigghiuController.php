<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of BaseController
 *
 * @author valerio
 */
abstract class StigghiuController{
    
    static $cc;
    
    public $name;
    
    public $config;
    
    private $CONTENT;
    
    public $_isAction;
    
    public $_CONTENT_TYPE;
    
    
    
    public static function Init($name="index_controller",$method=null,&$cf=null){
        
        global $cc;
        if(!isset($cc)){
            
            $cc=new $name($cf);
            $cc->start();
           
            if(method_exists($cc,$method)){
                if($method!=null){
                    $cc->_active_=$method;
                }
                $cc->$method();
            }
            
            
        }
        return $cc;
    }
    
    //put your code here
    abstract function start($p=null);
   
    
    
    public function setSeoTitle($testo){
        $this->_SEO_TITLE_=$testo;
    }
    public function setSeoDescription($testo){
        $this->_SEO_DESCRIPTION_=$testo;
    }
    
    
    public function getSeoTitle(){return $this->_SEO_TITLE_;}
    public function getSeoDescription(){return $this->_SEO_DESCRIPTION_;}
    
    public function __construct(&$conf){
        
       
         $this->config=$conf;
            
         
         $lang = strtolower(substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2));//lingua
         if(file_exists("config/lang/$lang.lang.php") && $lang!="it"){
            switch ($lang){
               /* case "fr":
                    //echo "PAGE FR";
                    include("config/lang/fr.lang.php");//include check session FR
                    break;
                case "it":
                    //echo "PAGE IT";
                    include("config/lang/it.lang.php");//include check session FR
                    break;*/
             
                case "en":
                    //echo "PAGE EN";
                    include("config/lang/en.lang.php");//include check session FR
                    break;        
                default:
                    
                    //echo "PAGE it - Setting Default";
                    include("config/lang/it.lang.php");//include check session FR
                    
                    
                break;
            }
         
         }else{
             
             include("config/lang/it.lang.php");//include check session FR
             
         }
         
         

       
        
    }
    
    
    public function loadTemplate($name,$data=null){
        
        $this->CONTENT[]=array("file"=>_BASETEMPLATE_.$name.".tpl.php","datas"=>$data);  
    }
    
    
    public function addStringLang($key,$val){
        $this->_strings_[$key]=$val;
    }
    
    public function getStringLang($key){
        if(!isset($this->_strings_[$key])) return " [@ $key non esiste tra le stringhe @]";
        return $this->_strings_[$key];
    }
    
    
    public function parseJson($data=null){
        
        $this->_isAction=true;
        $this->CONTENT=json_encode($data);
        
        
    }
    
 
    
    public function parseDom(){
        
        global $config;
        
        if(!($this->_isAction)){
            
            //header("Content-Type:".$this->_CONTENT_TYPE);
            if(count($this->CONTENT)>0){
                foreach($this->CONTENT as $content){


                    if(file_exists($content["file"]) ){


                        $data=$content["datas"];
                        include $content["file"];
                        
                       
                        

                    }  

                }
            }
        
        }else{
            header("Content-Type:".$this->_CONTENT_TYPE);
            echo $this->CONTENT;
        }
        
    }
    
   
}

?>
