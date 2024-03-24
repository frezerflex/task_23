<?php

interface MotionInterface 
{
	public function motion();
}

interface SignalInterface 
{
	public function signal();
}

interface WipersInterface 
{
	public function wipers();
}

abstract class Cars implements MotionInterface, SignalInterface, WipersInterface
{
    public function motion()
    {
    echo "Go!" . ' <br/>' . PHP_EOL;
    }
    abstract public function signal();

    public function wipers()
    {
    	echo "Wipers ON" . '<br/>' . PHP_EOL;
    }
}

class PassengerCar extends Cars

{

	private $color;
	private $upholstery;
	private $seats;

    public function getColor()
    {
    	return $this->color;
    }

    public function getUpholstery()
    {
    	return $this->upholstery;
    }

    public function getSeats()
    {
    	return $this->seats;
    }

    //конструктор класса
    public function __construct(string $color, string $upholstery, int $seats)
    {
    	$this->color = $color;
    	$this->upholstery = $upholstery;
    	$this->seats = $seats;
    	echo "_____" . ' <br/>' . "Легковая машина" . ' <br/>' . "_____" . ' <br/>';
    	echo "цвет: " . $color . ";" . ' <br/>' . PHP_EOL;
    	echo "отделка салона: " . $upholstery . ":" . ' <br/>' . PHP_EOL;
    	echo "количество мест: " . $seats . "." . ' <br/>' . PHP_EOL;
    }
    public function signal()
    {
    	echo "Бип!" . ' <br/>' . PHP_EOL;
    }
    public function __invoke()
    {
    	function oxide()
    	{
    		echo "Ускорение" . ' <br/>' . PHP_EOL;
    	}
    	oxide();

    }
}

//класс танков
class Panzer extends Cars
{
	private $armor;
	private $bullets;

	public function getBullets()
	{
		return $this->bullets;
	}

	public function getArmor()
	{
		return $this->armor;
	}

	//конструктор класса
	public function __construct(int $armor, int $bullets)
	{
		$this->armor = $armor;
		$this->bullets = $bullets;
		echo "_____" . ' <br/>' . "Tank" . ' <br/>' . "_____" . ' <br/>';
		echo "Броня: " . $armor . ";" . ' <br/>' . PHP_EOL;
		echo "количество снарядов: " . $bullets . "." . ' <br/>' . PHP_EOL;
	}

	//у танков нет звукового сигнала, поэтому сделаем холостой выстрел
	public function signal()
	{
		echo "Холостой выстрел!" .' <br/>' . PHP_EOL;
	}

	//при вызове класса как метода
	public function __invoke()
	{
		function shoot()
		{
			echo "выстрел!" . ' <br/>' . PHP_EOL;
		}
		shoot();
	}
}

class Bulldozer extends Cars
{
	private $brend;
	private $power;

	public function getBrend()
	{
		return $this->power;
	}

	//конструктор классф
	public function __construct(string $brend, int $power)
	{
        $this->brend = $brend;
        $this->power = $power;
        echo "____" . ' <br/>' . "Бульдозер" . ' <br/>' . "_____" . ' <br/>';
        echo "Марка: " . $brend . ";" . ' <br/>' . PHP_EOL;
        echo "Мощность: " . $power . "." . ' <br/>' . PHP_EOL;
	}
    
	// оповещение
	public function signal()
	{
		echo "Осторожно, работает спецехника!" . ' <br/' . PHP_EOL;
	}

	// при вызове класса как метода
	public function __invoke()
	{
		function bucket()
		{
			echo 'Бульдозер роет ковшом' . ' <br/>' . PHP_EOL;
		}

		bucket();
	}
}

//полиморфная функция, демонстрирующая экземпляр класса
function demonstration(Cars $car)
{
	$car->motion();
	$car->signal();
	$car->wipers();
	$car();
}

//экземпляр класса танк
$tank = new Panzer(13, 20);
demonstration($tank);

//экземрляр класса бульдозер
$machine = new Bulldozer("HITACHI", 120);
demonstration ($machine);

//экземляр класса легковая машина
$car = new PassengerCar("white", "alkantara", 5);
demonstration($car);

?>