<?php

class MenuItem
{
    private $itemName;
    private $description;
    private $price;


    //3 arguement constructor
    public function menu($itemName, $description, $price)
    {
        $this->itemName = $itemName;
        $this->description = $description;
        $this->price = $price;
    }
    //set method for the itemName
    public function setItemName($itemName)
    {
        $this->itemName = $itemName;
    }
    //get method for the itemName
    public function getItemName()
    {
        return $this->itemName;
    }
    //set method for the description
    public function setDescription($description)
    {
        $this->description =  $description;
    }
    //get method for the description
    public function getDescription()
    {
        return $this->description;
    }

    //set method for price
    public function setPrice($price)
    {
        $this->price = $price;
    }
    //get method for price.
    public function getPrice()
    {
        return $this->price;
    }
}



      