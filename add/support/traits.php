<?php
	trait PriceWithDiscount
	{
		public function getPrice()
		{
			return $this->price * (1 -  $this->discount / 100);
		}
	}

	trait DiscountOfWeightPrice
	{
		public function getPrice()
		{
			return ($this->weight > 10) ? $this->price * (1 - $this->discount / 100) : $this->price;
		}
	}

	trait DeliveryCost
	{
		public function getDeliveryCost()
		{
			return ($this->getPrice() >= $this->price) ? $this->deliveryCost : 300;
		}
	}
	
	trait Diagonal 
	{
		public function getDiagonal()
		{
			return round(sqrt(pow($this->size['width'], 2) + pow($this->size['height'], 2)));
		}
	}	
?>