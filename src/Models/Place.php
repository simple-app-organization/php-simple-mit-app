<?php
namespace SimpleApp\Models;

/**
 * Represent a location to show data in where are page
 */
class Place {
    private $id;
    private $title;
    private $address;
    private $country;
    private $phone;
    private $description;

    public function __construct($id = 0, $title = '', $address = '', $country = '', $phone = '', $description = '') {
        $this->id = $id;
        $this->title = $title;
        $this->address = $address;
        $this->country = $country;
        $this->phone = $phone;
        $this->description = $description;
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
    public function setAddress($address) {
        $this->address = $address;
    }
    public function getAddress() {
        return $this->address;
    }
    public function setCountry($country) {
        $this->country = $country;
    }
    public function getCountry() {
        return $this->country;
    }
    public function setPhone($phone) {
        $this->phone = $phone;
    }
    public function getPhone() {
        return $this->phone;
    }
    public function setDescription($description) {
        $this->description = $description;
    }
    public function getDescription() {
        return $this->description;
    }

}