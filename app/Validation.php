<?php

//Массив с кодами ошибок при валидации
$ERR_CODES = array(
    0 => 'Empty string',
    1 => 'High length',
    2 => 'Wrong input'
);

/*
Класс для валидации данных
*/
class Validation
{

	//Базовая валидация на пустоту ввода
    function validateDefault($input) 
    {
    	return $input == '' ? 0 : 1;
    }

    //Валидация имени
	function validateName($input) 
	{
		$errors = array();
		$errCount = 0;
		$input = trim($input);

		//Валидация базовая
        if(!$this->validateDefault($input)) {
        	$errors[$errCount] = '0';
        	return $errors;
        }
        //Валидация длины имени
		if (mb_strlen($input) > 20) {
			$errors[$errCount] = '1';
			$errCount++;
		}
		//Валидация на соответствие формату ввода
		if(preg_match('/[\d\W]/u', $input)) {
			$errors[$errCount] = '2';
			$errCount++;
		}

		return $errCount == 0 ? 1 : $errors;
	}

	//Валидация фамилии
    function validateSurname($input)
    {
    	return $this->validateName($input);
    }

    //Валидация группы
    function validateGroup($input)
    {
    	$errors = array();
    	$errCount = 0;
    	$input = trim($input);

        if(!$this->validateDefault($input)) {
        	$errors[$errCount] = '0';
        	return $errors;
        }

    	if (mb_strlen($input) > 5) {
			$errors[$errCount] = '1';
			$errCount++;
		}

		if(preg_match('/[\W\_]/u', $input)) {
			$errors[$errCount] = '2';
			$errCount++;
		}

		return $errCount == 0 ? 1 : $errors;
    }

    //Валидация пола
    function validateSex($input)
    {
    	$errors = array();
    	$errCount = 0;
    	$input = trim($input);

        if(!$this->validateDefault($input)) {
        	$errors[$errCount] = '0';
        	return $errors;
        }

    	if (mb_strlen($input) > 7) {
			$errors[$errCount] = '1';
			$errCount++;
		}

		if(!preg_match('/^(Мужской|Женский)$/u', $input)) {
			$errors[$errCount] = '2';
			$errCount++;
		}

		return $errCount == 0 ? 1 : $errors;
    }

    //Валидация эмейла
    function validateEmail($input)
    {
    	$errors = array();
    	$errCount = 0;
    	$input = trim($input);
    	
        if(!$this->validateDefault($input)) {
        	$errors[$errCount] = '0';
        	return $errors;
        }

    	if (mb_strlen($input) > 40) {
			$errors[$errCount] = '1';
			$errCount++;
		}

		if(!(preg_match('/.+@.+\..+/iu', $input))) {
			$errors[$errCount] = '2';
			$errCount++;
		}

		return $errCount == 0 ? 1 : $errors;
    }

    //Валидация суммы баллов
    function validateExams($input)
    {
    	$errors = array();
    	$errCount = 0;
    	$input = trim($input);
    	
        if(!$this->validateDefault($input)) {
        	$errors[$errCount] = '0';
        	return $errors;
        }

    	if (mb_strlen($input) > 3) {
			$errors[$errCount] = '1';
			$errCount++;
		}

		if(preg_match('/\D/iu', $input) OR $input > 300 OR $input < 0) {
			$errors[$errCount] = '2';
			$errCount++;
		}

		return $errCount == 0 ? 1 : $errors;
    }

    //Валидация года рождения
    function validateYear($input)
    {
    	$errors = array();
    	$errCount = 0;
    	$input = trim($input);
    	
        if(!$this->validateDefault($input)) {
        	$errors[$errCount] = '0';
        	return $errors;
        }

    	if (mb_strlen($input) > 4) {
			$errors[$errCount] = '1';
			$errCount++;
		}

		if(preg_match('/\D/iu', $input) OR $input > 2000 OR $input < 1900) {
			$errors[$errCount] = '2';
			$errCount++;
		}

		return $errCount == 0 ? 1 : $errors;
    }

    //Валидация проживания по месту обучения
    function validateLocate($input) 
    {
    	$errors = array();
    	$errCount = 0;
    	$input = trim($input);
    	
        if(!$this->validateDefault($input)) {
        	$errors[$errCount] = '0';
        	return $errors;
        }

    	if (mb_strlen($input) > 3) {
			$errors[$errCount] = '1';
			$errCount++;
		}

		if(!preg_match('/^(Да|Нет)$/iu', $input)) {
			$errors[$errCount] = '2';
			$errCount++;
		}

		return $errCount == 0 ? 1 : $errors;
    }

    /*
    Общая валидация данных
    получает на вход массив вида
    values => ([имя_поля] => значение, ...)
    возвращает массив вида
    $error => ([имя_поля] => (array => ([номер_ошибки] => код_ошибки, ...)), ...)
    */
    function validateFull($values)
    {
    	$error = array();
    	foreach ($values as $key => $value) {
			if ($key == 'name') {
				if ($this->validateName($value) != 1) {
					$error['name'] = $this->validateName($value);
				}
			}
			else if ($key == 'surname') {
				if ($this->validateSurname($value) != 1) {
					$error['surname'] = $this->validateSurname($value);
				}
			}
			else if ($key == 'sex') {
				if ($this->validateSex($value) != 1) {
					$error['sex'] = $this->validateSex($value);
				}
			}
			else if ($key == 'gro') {
				if ($this->validateGroup($value) != 1) {
					$error['gro'] = $this->validateGroup($value);
				}
			}
			else if ($key == 'email') {
				if ($this->validateEmail($value) != 1) {
					$error['email'] = $this->validateEmail($value);
				}
			}
			else if ($key == 'exams') {
				if ($this->validateExams($value) != 1) {
					$error['exams'] = $this->validateExams($value);
				}
			}
			else if ($key == 'y') {
				if ($this->validateYear($value) != 1) {
					$error['y'] = $this->validateYear($value);
				}
			}
			else if ($key == 'locate') {
				if ($this->validateLocate($value) != 1) {
					$error['locate'] = $this->validateLocate($value);
				}
			}
		}
		return $error == NULL ? 1 : $error;
    }

}