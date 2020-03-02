<?php

class programme
{

    //Propiétés
    private $_idprog;
    private $_typeprog;
    
    //Construc

    public function __construct($_id,$_type)
    {
    
        $this->_idprog = $_id;
        $this->_typeprog = $_type; 
    }
}
?>