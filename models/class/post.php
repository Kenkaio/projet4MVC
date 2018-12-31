<?php

class Post{

    private $_id;
    private $_title;
    private $_date;
    private $_content;


    public function __construct(array $donnees){
        $this->hydrate($donnees);
    }

    public function hydrate(array $donnees){
        foreach ($donnees as $key => $value){
            $method = 'set'.ucfirst($key);
            if (method_exists($this, $method))
            {
                $this->$method($value);
            }
        }
    }

    public function getId(){
        return $this->_id;
    }

    public function getDate(){
        return $this->_date;
    }

    public function getTitle(){
        return $this->_title;
    }

    public function getContent(){
        return $this->_content;
    }

    public function setContent($content){
        if(is_string($content)){
            $this->_content = $content;
        }
    }

    public function setId($id){
        $id = (int) $id;
        if ($id > 0) {
            $this->_id = $id;
        }
    }

    public function setDate($date){
        $this->_date = $date;
    }

    public function setTitle($title){
        if(is_string($title)){
            $this->_title = $title;
        }
    }
}
