<?php

/*
Класс для работы с таблицей студентов
*/
class Database
{

	public $allowedOrder = array('asc', 'desc'); //Доступные значения для сортировки asc - по убывающей, desc - по возрастающей
	public $allowedOrderBy = array('name', 'surname', 'gro', 'exams'); //По каким полям возможна сортировка 
	private $mysql;

	function __construct() 
	{
		$ini = parse_ini_file("dbConfig.ini"); //Файл со значениями используемыми для подключения к базе данных
		$this->mysql = mysqli_connect($ini["host"],$ini["user"],$ini["pass"],$ini["database"]);
	}

	//Получение всех строк из таблицы
	function getAll() 
	{
		$sql = "SELECT * FROM students";
		$res = $this->mysql->query($sql);
		return $res;
	}

	//Получение строк из таблицы с определенными значениями имени и фамилии
	//Принимает на вход массив, но использует только два первых значения из него для поиска
	function search(array $search) 
	{
		$sql = "SELECT name, surname, gro, exams FROM students WHERE name IN (?,?) OR surname IN (?,?)";
		$statement = $this->mysql->prepare($sql);
		$statement->bind_param("ssss", $search[0], $search[1], $search[0], $search[1]);
		$statement->execute();
		return $statement->get_result();
	}

	//Получение строк с определенными эмейлом
	function searchByEmail(string $email)
	{
		$sql = "SELECT * FROM students WHERE email = '$email'";
		$res = $this->mysql->query($sql) or die($this->mysql->error);
		return $res;
	}

	/*
	Получение максимум 50 строк из отсортированной таблицы
	$page - номер строки с которой получаем значения
	$order - в каком порядке сортируем
	$orderby - по какому столбцу сортируем
	*/
	function getAllByPage(int $page, string $order, string $orderby)
	{
		$sql = "SELECT name, surname, gro, exams FROM students ORDER BY $orderby $order LIMIT $page, 50";
		$res = $this->mysql->query($sql);
		return $res;
	}

	/*
	Получение максимум 50 строк из отсортированной таблицы
	с поиском значений в полях имя и фамилия
	$search - используется только два первых значения для поиска
	$page - номер строки с которой получаем значения
	$order - в каком порядке сортируем
	$orderby - по какому столбцу сортируем
	*/
	function getSearchByPage(array $search, int $page, string $order, string $orderby)
	{
		$sql = "SELECT name, surname, gro, exams FROM students WHERE name IN (?,?) OR surname IN (?,?) ORDER BY $orderby $order LIMIT $page, 50";
		$statement = $this->mysql->prepare($sql);
		$statement->bind_param("ssss", $search[0], $search[1], $search[0], $search[1]);
		$statement->execute();
		return $res = $statement->get_result();
	}

	/*
	Вставка данных в таблицу
	в массиве data данные должны быть в виде название_столбца => значение
	*/
	function insert(array $data)
	{
		$sql = "INSERT INTO students";
		$sql .= " (`".implode("`, `", array_keys($data))."`)";
		$sql .= " VALUES ('".implode("', '", $data)."') ";
		$res = $this->mysql->query($sql) or die($this->mysql->error);
	}

	/*
	Обновление данных в таблице
	поиск строк идет по значению почты
	в массиве data данные должны быть в виде название_столбца => значение
	*/
	function update(array $data) {
		$sql = "UPDATE students SET ";
		$count = count($data);
		$tmpCount = 0;
		foreach ($data as $key => $value) {
		    $sql .= "$key = '$value'";
		    $tmpCount++;
		    if($tmpCount != $count) {
		    	$sql .= ", ";
		    }
		}
		$sql .= "WHERE email = '{$data['email']}'";
		$res = $this->mysql->query($sql) or die($this->mysql->error);
	}

}



