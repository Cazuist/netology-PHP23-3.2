<?php
	class TV extends Product implements TVInterface, ProductInfo
	{
		protected $discount = 0;
		public function __construct($category, $name, $price, $size, $color = 'red')
		{
			parent::__construct($category, $name, $price);			
			$this->size['width'] = $size[0];
			$this->size['height'] = $size[1];
			$this->color = $color;
		}
		public function getInfo()
		{
			echo "Информация о товаре: Категория - {$this->category}, наименование -{$this->name}, цена - {$this->price}, диагональ - {$this->getDiagonal()}";
		}

		use PriceWithDiscount, DeliveryCost, Diagonal;
	}
?>