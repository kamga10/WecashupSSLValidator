<?php
 /**
 * 
 */
 class ResponseTaitement 
 {
 	private $objet;

 	function __construct( $objet)
 	{
 		$this->objet=$objet;
 		
 	}
 

 function readData(){
 	foreach ($this->objet as $key => $value) {
   
    if (is_array($value) ){
    
        $this.readData($value);
    }else{
       	?><div><label><?php echo $key;?> : </label>  <span><?php echo $value;?></span></div><?php
    }
   
}

 }

 }

?>