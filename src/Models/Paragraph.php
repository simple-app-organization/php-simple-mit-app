<?php
namespace SimpleApp\Models;

/**
 * Represent a Paragraph text in the page (read from json file)
 */
class Paragraph {
    private $text;

    public function __construct($text = '') {
        $this->text = $text;
    }
    
    public function setText($text) {
        $this->text = $text;
    }
    public function getText() {
        return $this->text;
    }

}