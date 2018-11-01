<?php

error_reporting(-1);
mb_internal_encoding('utf-8');

include('../app/dbModel.php');
include('../app/Validation.php');

//Создание объектов для работы с таблицей и валидации данных
$db = new Database;
$valid = new Validation;
//Массив с разрешенными для редактирования названиями столбцов
$allowableKeys = array("name" => '', "surname" => '', "sex" => '', "gro" => '', "email" => '', "exams" => '', "y" => '', "locate" => '');
//Массив для сохранения ранее введенных данных
$defaultValues = array();
//Массив для сохранения только что введенных данных
$values = array();
//Массив с ошибками для использования в шаблоне
$error = array();

/*
Проверка на наличие регистрации на сайте
поиск данных по эмейлу и их добавление
в массив для ранее введенных данных
*/
if(array_key_exists("email", $_COOKIE)) {
	$res = $db->searchByEmail($_COOKIE['email']);
	while ($row = $res->fetch_assoc()) {
		foreach ($row as $key => $value) {
			$defaultValues[$key] = $value;
		}
	}
}

//Добавление или изменение токена в куки для защиты от XSRF
if(!array_key_exists('token', $_COOKIE)) {
	$token = uniqid('', true);
}
else {
	$token = $_COOKIE['token'];
}
setcookie('token', $token, time() + (365 * 5 * 24 * 60 * 60), '/', null, false, true);

/*
Регистрация формы и ее редактирование
*/
if($_SERVER['REQUEST_METHOD'] == 'POST') { // Определяем отправлена ли форма
	if(!array_key_exists('token', $_POST) OR $_POST['token'] == '' OR $_POST['token'] != $_COOKIE['token']) { //проверка на соответствие токена у юзера и в форме
		$error = array(0 => "Произошла непредвиденная ошибка, пожалуйста, переотправьте форму заново!");
	}
	else {
		//Проверка названий полей в форме на соответствие разрешенным значениям
		foreach ($_POST as $key => $value) {
			if(isset($allowableKeys[$key])) {
				$values[$key] = strval($value);
			}
			else {
			    unset($_POST[$key]);
			}
		}
		//Присвоение эмейла зарегистрированного пользователя в список значений для удобного редактирования формы
		if(array_key_exists("email", $_COOKIE)) {
			$values['email'] = $_COOKIE['email'];
		}
		$error = $valid->validateFull($values); //Валидация введенных данных
		if($error == 1) { //Действия при успешной валидации
			$values['sex'] = $values['sex'] == 'Мужской' ? 'm' : 'f';
			$values['locate'] = $values['locate'] == 'Да' ? 'y' : 'n';
			$host  = $_SERVER['HTTP_HOST'];
			$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
			if (array_key_exists("email", $_COOKIE)) { //редактирование данных
				$db->update($values);
				$extra = 'successful_edit.php';
			}
			else { //вставка данных
				$db->insert($values); 
				$extra = 'success_reg.php';
			}
			setcookie("email", $values['email'], time() + (365 * 5 * 24 * 60 * 60), '/', null, false, true); //установка куки
			header("Location: http://$host$uri/$extra"); //редирект на страницу с оповещением
		}
		else {
			$defaultValues = $values;
			$error = prepareErrorsToView($error); //подготовка ошибок для удобного вывода в шаблоне
		}
	}
}

/*
Функция для подготовки сообщений об ошибках
для удобного вывода в шаблоне
получает на вход массив вида
$errorsArr => ([имя_поля] => (array => ([номер_ошибки] => код_ошибки, ...)), ...)
возвращает массив вида
errors => ([номер_ошибки] => текст_ошибки, ...)
*/
function prepareErrorsToView(array $errorsArr) {
	if($errorsArr != NULL) {
		$preparedErrors = array();
		$count = 0;
		foreach ($errorsArr as $form => $errors) {
			foreach ($errors as $number => $error) {
				if ($form == 'name') {
					if ($error == '0') {
						$preparedErrors[$count] = "Пожалуйста, введите имя.";
						$count++;
					}
					else if($error == '1') {
						$preparedErrors[$count] = "Имя не должно содержать более 20 букв!";
						$count++;
					}
					else if($error == '2') {
						$preparedErrors[$count] = "Имя должно содержать только буквы!";
						$count++;
					}
				}
				if ($form == 'surname') {
					if ($error == '0') {
						$preparedErrors[$count] = "Пожалуйста, введите фамилию.";
						$count++;
					}
					else if($error == '1') {
						$preparedErrors[$count] = "Фамилия не должна содержать более 20 букв!";
						$count++;
					}
					else if($error == '2') {
						$preparedErrors[$count] = "Фамилия должна содержать только буквы!";
						$count++;
					}
				}
				if ($form == 'gro') {
					if ($error == '0') {
						$preparedErrors[$count] = "Пожалуйста, введите группу.";
						$count++;
					}
					else if($error == '1') {
						$preparedErrors[$count] = "Группа не должна содержать более 5 цифр или букв!";
						$count++;
					}
					else if($error == '2') {
						$preparedErrors[$count] = "Группа должна содержать только цифры и буквы!";
						$count++;
					}
				}
				if ($form == 'email') {
					if ($error == '0') {
						$preparedErrors[$count] = "Пожалуйста, введите эмейл.";
						$count++;
					}
					else if($error == '1') {
						$preparedErrors[$count] = "Эмейл не должен содержать более 40 символов!";
						$count++;
					}
					else if($error == '2') {
						$preparedErrors[$count] = "Введите эмейл согласно данному формату - name@email.com.";
						$count++;
					}
				}
				if ($form == 'exams') {
					if ($error == '0') {
						$preparedErrors[$count] = "Пожалуйста, введите суммарное количество баллов.";
						$count++;
					}
					else if($error == '1') {
						$preparedErrors[$count] = "Сумма баллов не должна содержать более 3 цифр!";
						$count++;
					}
					else if($error == '2') {
						$preparedErrors[$count] = "Введите корректное количество баллов (между 0 и 300).";
						$count++;
					}
				}
				if ($form == 'y') {
					if ($error == '0') {
						$preparedErrors[$count] = "Пожалуйста, введите год рождения.";
						$count++;
					}
					else if($error == '1') {
						$preparedErrors[$count] = "Год рождения не должен содержать более 4 цифр!";
						$count++;
					}
					else if($error == '2') {
						$preparedErrors[$count] = "Введите верный год рождения (от 1900 до 2000).";
						$count++;
					}
				}
			}
		}
		return $preparedErrors;
	}
	else {
		return 0;
	}
}

include('templates/registration_styles.html');
include('templates/header.html');
include('templates/registration.html');