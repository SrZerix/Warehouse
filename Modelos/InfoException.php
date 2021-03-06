<?php

class InfoException extends Exception{
    private $site;
    
    function __constructor($message,$code,$site){
      parent::__construct($message,$code,null);
        $this->setSite($site);
    }
        
    function getSite() {
        return $this->site;
    }

    function setSite($site) {
        $this->site = $site;
    }

    public function __toString(): string {
     return __CLASS__."$this->message.$this->code.$this->site";   
    }

}