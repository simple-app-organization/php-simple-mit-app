<?php
namespace SimpleApp\Models;

/**
 * Represent the message to show in Home Page
 */
class HomeMessage {
    private $id;
    private $title;
    private $text;
    private $imagesrc;
    private $link;

    public function __construct($id = 0, $title = '', $text = '', $imagesrc = '', $link = '' ) {
        $this->id = $id;
        $this->title = $title;
        $this->text = $text;
        $this->imagesrc = $imagesrc;
        $this->link = $link;
    }

    public function setId($id) {
        $this->id = $id;
    }
    public function getId() {
        return $this->id;
    }
    public function setTitle($title) {
        $this->title = $title;
    }
    public function getTitle() {
        return $this->title;
    }
    public function setText($text) {
        $this->text = $text;
    }
    public function getText() {
        return $this->text;
    }
    public function setImageSrc($imagesrc) {
        $this->imagesrc = $imagesrc;
    }
    public function getImageSrc() {
        return $this->imagesrc;
    }
    public function setLink($link) {
        $this->link = $link;
    }
    public function getLink() {
        return $this->link;
    }


    // public function set($name,$value) {
    //     switch(strtolower($name)) {
    //         case 'id': 
    //             return $this->setId($value);
    //         case 'title': 
    //             return $this->setTitle($value);
    //         case 'text': 
    //             return $this->setText($value);
    //         case 'imagesrc': 
    //             return $this->setImageSrc($value);
    //     }
    // }
    
    // public function get($name) {
    //     switch(strToLower($name)) {
    //         case 'id': 
    //             return $this->getId();
    //         case 'title': 
    //             return $this->getTitle();
    //         case 'text': 
    //             return $this->getText();
    //         case 'imagesrc': 
    //             return $this->getImageSrc();
    //     }
    // }

}