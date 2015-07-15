<?php
/**
 * Description Index Controller default
 *
 * @author valerio
 */
class index_controller extends StigghiuController
{
    
   
    
    /**
     * Metodo di nizializzazione per la classe
     * meglio non far caricare dei template a questo metodo
     * 
     * @param type $c 
     */
    public function start($c=null){
        
        //print_r($_REQUEST);
        
        
    }
    
    
    
     public function ciao($p=null){
     
         
         echo "Stampo CIAOOO!";
     }
     
   

    public function index($p=null){
        
        
       
        $sessione=Stigghiu::load_plugin("Sessions");
        
        
   
         
        $this->loadTemplate("content",array("ishome"=>true,
                                           "altro"=>"si",
                                           "mipiace"=>"tanto"));
        
        
        
       
        
    }
    
    
    
}

?>