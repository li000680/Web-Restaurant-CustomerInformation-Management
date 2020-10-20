<?php
class Menuitem {
  var $itemName;
  var $description;
  var $price;
  
  function __construct($par1, $par2, $par3 ){
   $this->itemName = $par1;
   $this->description = $par2;
   $this->price = $par3;
  }
  
  function getName () {
	echo $this->itemName;
  }
  
  function getDescription () {
	echo $this->description;
  }
  
  function getPrice () {
	echo $this->price;
  }
}
?>