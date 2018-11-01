<?php

error_reporting(-1);
mb_internal_encoding('utf-8');
include('../app/dbModel.php');

//Объект для работы с таблицей
$table = new Database;
//Переменная для обработки ошибок
$error = '';

/*
Обрабатываем входящие данные для поиска
*/

//Номер строки в таблице с которой будем выводить данные
if(array_key_exists('page', $_GET)) {
	$page = intval($_GET['page']);
	$page = ($page - 1) * 50;
}
else {
	$page = 0;
}

//Определение порядка в котором будут сортироваться данные
if(array_key_exists('order', $_GET)) {
	$order = strval($_GET['order']);
	if(!in_array($order, $table->allowedOrder)) {
		$order = 'desc';
	}
}
else {
	$order = 'desc';
}

//Определение столбца по которому будет проводиться сортировка
if(array_key_exists('orderby', $_GET)) {
	$orderby = strval($_GET['orderby']);
	if(!in_array($orderby, $table->allowedOrderBy)) {
		$orderby = 'exams';
	}
}
else {
	$orderby = 'exams';
}

//Получение значений для поиска
if(array_key_exists('q', $_GET)) {
	$q = strval($_GET['q']);
	$q = explode(" ", $q);
}
else {
	$q = '';
}

/*
Определяем и выполняем запрос (поиск по таблице или получение всех строк) 
с указанием строки с которой идет получение.
Получаем количество строк в запросе без указания строки
с которой идет получение для определения страниц
*/
if($q != '') {
	$query = $table->getSearchByPage($q, $page, $order, $orderby);
	$count = $table->search($q)->num_rows;
}
else {
	$query = $table->getAllByPage($page, $order, $orderby);
	$count = $table->getAll()->num_rows;
}

/*
Создаем ссылки для стобцов и страниц
определяем наличие данных в запросе
*/
if($count != 0) {
	$names = array('name', 'surname', 'gro', 'exams'); //определение названий столбцов из таблицы, которые будут выводится
	$order = array('name' => '', 'order' => ''); //массив для определения знака сортировки и использования в шаблоне
	if(array_key_exists('orderby', $_GET)) $order['name'] = $_GET['orderby'];
	if(array_key_exists('order', $_GET)) $order['order'] = $_GET['order'];
	$columns = makeColumnNames($names); //массив с ссылками для столбцов
	$pagesArr = makePages($count); //массив с ссылками для страниц
	array_key_exists('page', $_GET) ? $currentPage = $_GET['page'] : $currentPage = 1; //переменная страницы для использования в шаблоне
}
else {
	if(array_key_exists('q', $_GET)) {
		$error = "По запросу: ".htmlspecialchars($_GET['q'], ENT_QUOTES)." ничего не найдено!";
	}
	else {
		$error = "База студентов пуста.";
	}
}

/*
Функция для создания ссылок страниц
возвращает массив вида страница => ссылка_куда_ведет_страница
*/
function makePages($count)
{
	$tempUrl = $_SERVER['REQUEST_URI'];
	$queryStr = parse_url($tempUrl, PHP_URL_QUERY);
	parse_str($queryStr, $queryParams);
	$resultArr = array();
	if($count != NULL) {
		$count = ceil($count/50);
		$pages = 1;
		if (array_key_exists('q', $_GET)) {
			$q = $_GET['q'];
			while ($count > 0) {
				$url = array(
					'q' => $q,
					'page' => $pages
				) + $queryParams;
				$resultArr = $resultArr + array($pages => http_build_query($url));
				$pages++;
				$count--;
			}
		}
		else {
			while ($count > 0) {
				$url = array(
					'page' => $pages
				) + $queryParams;
				$resultArr = $resultArr + array($pages => http_build_query($url));
				$pages++;
				$count--;
			}
		}
	}
	return $resultArr;
}

/*
Функция для создания ссылок столбцов
возвращает массив вида столбец => ссылка_куда_ведет_столбец
*/
function makeColumnNames($names) {
	$url = $_SERVER['REQUEST_URI'];
	$queryStr = parse_url($url, PHP_URL_QUERY);
	parse_str($queryStr, $queryParams);
	$resultArr = array();
	foreach ($names as $name) {	
		$tempParams = $queryParams;
		if(array_key_exists('orderby', $queryParams)) {
			if(array_key_exists('order', $queryParams)) {
				if($queryParams['orderby'] == $name) {
					if($queryParams['order'] == 'asc') {
						$tempParams['order'] = 'desc';
					}
					else {
						$tempParams['order'] = 'asc';
					}
				}
				else {
					$tempParams['orderby'] = $name;
					$tempParams['order'] = 'asc';
				}
			}
		}
		else {
			$tempParams['orderby'] = $name;
			$tempParams['order'] = 'asc';
		}
		$resultArr = $resultArr + array($name => http_build_query($tempParams));
	}
	return $resultArr;
}

include('templates/startpage_styles.html');
include('templates/header.html');
include('templates/startpage.html');

