# Использование 

1. Подключаем класс

	```php
	require('VimeWorldAPI.class.php');
	```

2. Создаем объект

	1. Без токена
	```php
	$api = new VimeWorldAPI();
	```
	2. С токеном 
	```php
	$api = new VimeWorldAPI('token');
	```
	
3. Используем API

	1. Вывод информации о игроке
		1. По никнейму
			1. Один игрок
				```php
				$data = $api->user('LoganFrench');
				```
			2. Несколько игроков.
				```php
				$data = $api->user(['LoganFrench', 'AlesteZ', 'Conqueer', 'xtrafrancyz']);
				```
		2. По ID
			1. Один игрок
				```php
				$data = $api->user(1249617);
				```
			2. Несколько игроков.
				```php
				$data = $api->user([1249617, 1476864, 1524068, 134568]);
				```
	2. Вывод таблицы лидеров
		1. Без сортировки
			```php
			$data = $api->leaderboard('bw');
			```
		2. С сортировкой по убийстам
			```php
			$data = $api->leaderboard('bw', 'kills');
			```
		3. Первые 10 записей
			```php
			$data = $api->leaderboard('bw', 'kills', 10);
			```
		* в случае отправки запроса без аргумента, вернется список таблиц рекордов
	3. Онлайн
		1. Количество игроков онлайн
			```php
			$data = $api->online();
			```
		2. Модераторы онлайн
			```php
			$data = $api->online('staff');
			```
		3. Стримы, которые ведуться на данный момент
			```php
			$data = $api->online('streams');
			```
	4. Дополнительно
		1. Список игр, по которым ведется статистика
			```php
			$data = $api->misc('games');
			```
		2. Список всех возможных достижений
			```php
			$data = $api->misc('achievements');
			```
		* в случае отправки запроса без аргумента, вернётся список игр
		
        5. Получения ID игрока.
	       Использование:
	    <code>   	$data = $api->getid($LoganFrench);
	        foreach($data as $info)
	        {
		echo(.$info['id'].'<br>');
	        } </code>
		
        6. Получение статистики игрока. (Работает только с ID, можно воспользоваться функцией выше.)

	
	       
		
			
