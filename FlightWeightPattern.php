<?php
class Circle {
	function __construct(string $color) {
		$this->color = $color;
	}
	
	public function setX(int $x): void {
		$this->x = $x;
	}
	
	public function setY(int $y): void {
		$this->y = $y;
	}
	
	public function setRadius(int $radius): void {
		$this->radius = $radius;
	}
	
	public function draw(): void {
		echo 'Circle: Draw() [ Color : ] ' . $this->color . ', x : ' . $this->x . ', y : ' . $this->y . ', radius : ' . $this->radius . '<br/>';
	}
}

class ShapeFactory {
	function __construct() {
		$this->circleMap = [
			'Red' => '',
			'Green' => '',
			'Blue' => '',
			'White' => '',
			'Black' => ''
		];
		$this->colors = ['Red', 'Green', 'Blue', 'White', 'Black'];
	}
	
	public function getCircle(string $color): object {
		$this->circle = $this->circleMap[$color];
		
		if(empty($this->circle)) {
			$this->circle = new Circle($color);
			$this->circleMap[$color] = $this->circle;
			echo 'Creating circle of color : ' . $color;
		}
		
		return $this->circle;
	}
	
	public function getRandomColor(): string {
		$randomColor = floor(rand(0, sizeof($this->colors) - 1));
		return $this->colors[$randomColor];
	}
	
	public function getRandomX(): int {
		$randomX = floor(rand(0, 99));
		return $randomX;
	}
	
	public function getRandomY(): int {
		$randomY = floor(rand(0, 99));
		return $randomY;
	}
}

for($i = 0; $i < 20; ++$i) {
	$shapeFactory = new ShapeFactory();
	$circle = $shapeFactory->getCircle($shapeFactory->getRandomColor());
	$circle->setX($shapeFactory->getRandomX());
	$circle->setY($shapeFactory->getRandomY());
	$circle->setRadius(100);
	$circle->draw();
}
?>