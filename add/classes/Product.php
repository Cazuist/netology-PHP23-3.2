<?php
	//Суперкласс для всех объектов
	abstract class Product
	{
		protected $category;
		protected $name;
		protected $price;
		protected $discount = 10;
		protected $deliveryCost = 250;	

		public function __construct($category, $name, $price)
		{
			$this->category = $category;
			$this->name = $name;
			$this->price = $price;
		}

		public function setDiscount($discount) {
			$this->discount = $discount;
		}

		public function getDiscount() {
			return $this->discount;
		}

		abstract public function getPrice();

		abstract public function getDeliveryCost();
	}	
?>