<?php
	//Суперкласс для всех объектов
	abstract class Object
	{
		public function getInfo()
		{
			echo 'Я принадлежу классу "'.get_class($this).'". Мой родительский класс "'.get_parent_class($this).'"';
		}
	}

	//Создаем классы
	interface CarInterface
	{
		public function __construct($name, $color, $price, $isAvailable);
	}

	class Car extends Object implements CarInterface
	{
		public $name;
		public $color;
		private $price;
		public $isAvailable = true;

		public function __construct($name, $color, $price, $isAvailable) 
		{
			$this->name = $name;
			$this->color = $color;
			$this->price = $price;
			$this->isAvailable = $isAvailable;			
		}

		public function getMessage() {
			if ($this->isAvailable) {
				echo 'Есть в наличии';
			} else {
				echo 'Нет в наличии';
			}
		}
	}

	interface TVInterface
	{
		public function getMessage();
	}

	class TV extends Object implements TVInterface
	{
		public $isColor;

		public function __construct($name, $price) 
		{
			$this->name = $name;			
			$this->price = $price;
		}

		public function getMessage() {
			if ($this->isColor) {
				return 'Цветной';
			}
			else {
				return 'Черно-белый';
			}
		}
	}

	interface DuckInterface
	{
		public function isReadyForChristmas();
	}

	class Duck extends Object
	{
		public $color;
		public $weight;
		public $isPet;

		public function isReadyForChristmas() {
			if ($this->isPet) {
				return 'Моя любимая утка';
			} else {
				if($this->weight > 2000) {
					return 'В духовку';
				} else {
					return 'Пусть подрастет!';
				}
			}				
		}
	}

	interface PenInterface
	{
		public function getSimpleInfo($name, $price);
	}

	class Pen extends Object implements PenInterface
	{
		public function __construct($name = 'Simple', $inkColor = 'blue', $material = 'plastic', $price = 25) {
			$this->name = $name;
			$this->inkColor = $inkColor;
			$this->material = $material;
			$this->price = $price;
		}

		public function getSimpleInfo($name, $price)
		{
			echo "Товвар {$name}, цена {$price} руб.";
		}
	}

	interface ProductInterface
	{
		public function setSize($width, $length, $height);
	}

	class Product extends Object implements ProductInterface
	{
		private $category;
		private $name;
		private $price;
		private $isAvailable;
		private $discount = 0;

		public function __construct($category, $name, $price, $isAvailable = true, $discount = 0)
		{
			$this->category = $category;
			$this->name = $name;
			$this->price = $price;
			$this->isAvailable = $isAvailable;
			$this->discount = $discount;
		}

		public function getProperties() {
			$properties = [];
			$properties[] = $this->category;
			$properties[] = $this->name;
			$properties[] = $this->price;
			return $properties;
		}

		public function setSize($width, $length, $height = 1)
		{
			$this->size = $width * $length * $height;
		}

	}

//Создаем экземпляры классов
//Машины
	$car1 = new Car('Audi', 'magenta', 50500, true);	

//Телевизоры
	$tv1 = new TV('LG', 10000);	

//Утки
	$duck1 = new Duck();
	
//Шариковые ручки
	$pen1 = new Pen();

//Товары
	$product1 = new Product('Хлеб', 'Бородинский', 50);


	$objects = [];
	array_push($objects, $car1, $tv1, $duck1, $pen1, $product1);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Классы</title>
  <link rel="stylesheet" href="css/styles.css">  
</head>
<body>
	
	<fieldset style="width: 40%;">
		<legend>Наследование от родительского класса</legend>
		<? foreach ($objects as $object) : ?>
			<p><?= $object->getInfo() ?></p>
		<? endforeach ?>
			
 	</fieldset>

 	<fieldset style="width: 50%;">
 		<legend>Вопросы к лекции</legend>
 		<h2>Наследовние</h2>
 		<p style="font-size: 20px;">Наследование является механизмом передачи свойств и методов одних классов в другие (базовые и производные классы). Таким образом выстраивается иерархия классов (дерево наследования). Данный механизм позволяет избегать многократного дублирования кода</p>
 		<h2>Полиморфизм</h2>
 		<p style="font-size: 20px;">Полиморфизм вытекает из наследования и определяет возможность как переопределения метода базового класса в производном, так и получения разных результатов исходя из контекста использования метода.</p>
 		<h2>Интерфейс и абстрактный класс</h2>
 		<p style="font-size: 20px;">Абстрактный класс - класс, который не может быть реализован в объект. Может иметь или не иметь свойства и обычные методы. Может иметь или не иметь абстрактные методы. В случае, если абстрактные методы есть, они должны быть реализованы в производных классах.<p>
 		<p style="font-size: 20px;">Интерфейс по сути является более глубокой реализацией принципа абстракции. Не я вляется шаблоном для создание объекта, применяется при описании класса. При имплементации классом обязует этот класс реализовать метод (в соответствии приведенной сигнатуры), т.е. создает минимальную жесткую структуру класса.<p>
 		<p style="font-size: 20px;">Удобство использования одного или другого определяется поставленной задачей. Абстрактный класс удобно использовать при ограниченном числе необходимых методов. Интерфейсы удобны тем, что они могут подключаться к любому классу, вне зависимости от иерархии наследования и не ограничены в количестве применения к классу.</p>
 	</fieldset>
 	
</body>
</html>