<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Vice
 *
 * @author valerio
 */


class Stigghiu
{
    //put your code here
    
    static $_this_;
    
    public $conf;
    
    public static function init($conf){
        global $_this_;
        
        if(!isset($_this_)){
            $_this_=new Stigghiu($conf);
            
        }
        
        return $_this_;
    }
    
    public function __construct(&$cc){
        
        $this->conf=$cc;
        
    }
    
    
    public static function load_plugin($name){
        $plugins=null;
       
        $files='class/libs/'.$name.'/'.$name.".plugin.php";
        if(file_exists($files)){
            include $files;
            $plugins=@new $name();
        }else{
            throw new Exception("Class not found!","3");
        }
       
        return $plugins;
    }
    
   
    
    public function run(){
            
 
        if(isset($_REQUEST["akey"])){
            $this->api();
        }
            
        $this->getSites();
        
    }
    
    
    public function createDbModel($sql,$object){
        
        global $conf;
        
        $stato="NULL";
        
        $DB=$conf["DB"];
        
        $ID_API=$conf["API_ID"];
 
        $conn=mysql_connect($DB["host"],$DB["USER"],$DB["PSW"]);
        
        if($conn){
                mysql_select_db($DB["NAME"]);
                
        }
        
        if($conn){
            $password=sha1($password);
            
            $risultato = mysql_query($sql);
            
            if($risultato && mysql_num_rows($risultato) > 0 ){
                             
                             
                             while($riga=mysql_fetch_object($risultato,$object)){
                                            
                                            $object=StigghiuModel::createModel($riga,$conf);
                                            
                                            $data[]=$object;
                                            
                                            
                              }
                              $stato["model"]=$data;
                              
                              mysql_free_result($risultato);
            }

           
        }
        
        mysql_close();
        
        return $stato;
        
    }
    
    
    
    
    
    public function getSites(){
        
        global $conf;
        global $ROUTECONF;
        
        //$controller=strip_tags($_REQUEST["cid"]);
        //$method=$_REQUEST["node"];
        
        //create URL ROUTE
        $requestURI = explode('/',$_SERVER['REQUEST_URI']);
        $scriptName = explode('/',$_SERVER['SCRIPT_NAME']);
 
        for($i= 0;$i < sizeof($scriptName);$i++)
        {
              if ($requestURI[$i]==$scriptName[$i])
              {
                 unset($requestURI[$i]);
              }
             
        }
        
        $command=array_values($requestURI);
        
        
        //
        if(count($command)>1 && in_array($command[0],$ROUTECONF) ){
                
                if( isset($command[0]) && !class_exists($command[0])){

                    $controller=$ROUTECONF[trim($command[0])];
                    
                    
                }else{
                    
                    $controller="index_controller";
                    
                }
                
                

              
        }else{
              
            $controller="index_controller";
            
        }
        
        if( isset($command[1]) ){

            $method=trim($command[1]);
            $segments=explode('?',$method);
            if(count($segments)>0){

                 $method=strip_tags($segments[0]);

            }        
            $method=str_replace(".html","",$method);
        }else{
            $method="index";
        }
        
        
        
        $conf["route"]=$method;
        $conf["command"]=$command;
        
        $method=str_replace("-","_",$method);
        $cr=StigghiuController::Init($controller,$method,$conf);
        
        
        
        $cr->parseDom();
    }
    
    
    
}

?>
