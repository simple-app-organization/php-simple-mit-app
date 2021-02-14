<?php
namespace SimpleApp\Models;

/**
 * Represent a Person to show data in Who are page
 */
class Person {
    private $id;
    private $name;
    private $surname;
    private $shortbio;
    private $email;
    private $profilesrc;

    public function __construct($id = 0, $name = '', $surname = '', $shortbio = '', $email = '', $profilesrc = '') {
        $this->id = $id;
        $this->name = $name;
        $this->surname = $surname;
        $this->shortbio = $shortbio;
        $this->email = $email;
        $this->profilesrc = $profilesrc;
    }

    public function setId($id) {
        $this->id = $id;
    }
    public function getId() {
        return $this->id;
    }
    public function setName($name) {
        $this->name = $name;
    }
    public function getName() {
        return $this->name;
    }
    public function setSurname($surname) {
        $this->surname = $surname;
    }
    public function getSurname() {
        return $this->surname;
    }
    public function setShortBio($shortbio) {
        $this->shortbio = $shortbio;
    }
    public function getShortBio() {
        return $this->shortbio;
    }
    public function setEmail($email) {
        $this->email = $email;
    }
    public function getEmail() {
        return $this->email;
    }
    public function setProfileSrc($profilesrc) {
        $this->profilesrc = $profilesrc;
    }
    public function getProfileSrc() {
        return $this->profilesrc;
    }

}