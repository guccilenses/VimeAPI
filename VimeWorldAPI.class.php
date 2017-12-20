<?php

/*

 * VimeWorldAPI - Libs [api.vime.world]
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
		if($method) return $this->curl('https://api.vime.world/user/'.$id.'/'.$method);
		else {
			if(is_array($id)) {
				if(is_string($id[0])) return $this->curl('https://api.vime.world/user/name/'.implode(',', $id));
				else return $this->curl('https://api.vime.world/user/'.implode(',', $id));
			}
			else {
				if(is_string($id[0])) return $this->curl('https://api.vime.world/user/name/'.$id);
				else return $this->curl('https://api.vime.world/user/'.$id);
			}
		}
	}
	
	public function leaderboard($game = '', $sort = '',  $size = 100) {
		if(!$game) return $this->curl('https://api.vime.world/leaderboard/list');
		else {
			if($sort) return $this->curl('https://api.vime.world/leaderboard/get/'.$game.'/'.$sort.'?size='.$size);
			else return $this->curl('https://api.vime.world/leaderboard/get/'.$game.'?size='.$size);
		}
	}
	
	public function online($method = '') {
		if($method) return $this->curl('https://api.vime.world/online/'.$method);
		else return $this->curl('https://api.vime.world/online');
	}
	
	public function misc($method = 'games') {
		return $this->curl('https://api.vime.world/misc/'.$method);
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
		return json_decode($response, true);
	}
}
