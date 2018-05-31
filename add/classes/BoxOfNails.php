<?php
	class BoxOfNails extends Product
	{
		public function __construct($category, $name, $price, $weight)
		{
			parent::__construct($category, $name, $price);			
			$this->weight = $weight;
		}

		use DiscountOfWeightPrice, DeliveryCost;
	}	
?>