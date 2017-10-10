<?php
 
/*

 * VimeWorldAPI -Libs [api.vime.world]
 *
 * @author vk.com/tdiez
 * @version 0.1
 
*/
 
class VimeWorldAPI
{
	private $token;
	public function __construct($token = '') {
		$this->token = $token;
	}

	public function user($id = array(), $method = '') {
		if($method) return json_decode($this->curl('https://api.vime.world/user/'.$id.'/'.$method), true);
		else {
			if(is_array($id)) {
				if(is_string($id[0])) return json_decode($this->curl('https://api.vime.world/user/name/'.implode(',', $id)), true);
				else return json_decode($this->curl('https://api.vime.world/user/'.implode(',', $id)), true);
			}
			else {
				if(is_string($id[0])) return json_decode($this->curl('https://api.vime.world/user/name/'.$id), true);
				else return json_decode($this->curl('https://api.vime.world/user/'.$id), true);
			}
		}
	}
	
	public function leaderboard($game = '', $sort = '',  $size = 100) {
		if(!$game) return json_decode($this->curl('https://api.vime.world/leaderboard/list'), true);
		else {
			if($sort) return json_decode($this->curl('https://api.vime.world/leaderboard/get/'.$game.'/'.$sort.'?size='.$size), true);
			else return json_decode($this->curl('https://api.vime.world/leaderboard/get/'.$game.'?size='.$size), true);
		}
	}
	
	public function online($method = '') {
		if($method) return json_decode($this->curl('https://api.vime.world/online/'.$method), true);
		else return json_decode($this->curl('https://api.vime.world/online'), true);
	}
	
	public function misc($method = 'games') {
		return json_decode($this->curl('https://api.vime.world/online/'.$method), true);
	}
	
	public function test() {
		return $this->token;
	}	
	
	public function curl($url) {
		$curl = curl_init($url);
		curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 3);
		curl_setopt($curl, CURLOPT_TIMEOUT, 3);
		if($this->token) curl_setopt($curl, CURLOPT_HTTPHEADER, ['Access-Token: '.$this->token]);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_USERAGENT, "VimeWorldAPI-Libs By GitHub.com/LoganFrench");
		$response = curl_exec($curl);
		curl_close($curl);
		return $response;
	}
}
