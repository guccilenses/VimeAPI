<?
	require('VimeWorldAPI.class.php');
	$api = new VimeWorldAPI();
	
	echo 'Статистика LoganFrench:<br>';
	$data = $api->user('LoganFrench');
	foreach($data[0] as $key => $value)
	{
		echo $key.': '.$value.'<br>';
	}

	echo '<br>ТОП-5 бедварс:<br>';
	$data = $api->leaderboard('bw', NULL, 5);
	foreach($data['records'] as $info)
	{
		echo('- '.$info['user']['username'].'<br>');
	}
	
	echo '<br>Модеры онлайн:<br>';
	$data = $api->online('staff');
	foreach($data as $info)
	{
		echo('	- '.$info['username'].'<br>');
	}
?>