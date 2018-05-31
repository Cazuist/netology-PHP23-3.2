<?PHP	
	class Barbell extends Product implements ProductInfo
	{	
		public function __construct($category, $name, $price, $weight, $color = 'black')
		{
			parent::__construct($category, $name, $price);			
			$this->weight = $weight;
			$this->color = $color;
		}

		public function getInfo()
		{
			echo "Информация о товаре: Категория - {$this->category}, наименование -{$this->name}, цена - {$this->price}, скидка - {$this->discount}.";
		}
		
		use PriceWithDiscount, DeliveryCost;
	}
?>