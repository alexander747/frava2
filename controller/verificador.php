<?php
class Pass_crypt{
	
	public function create_hash($vlue){
		return password_hash(hash('sha256', $vlue, true), PASSWORD_DEFAULT);
	}

	public function check_value($vlue, $oldVlue){
		$res = password_verify(hash('sha256', $vlue , true), $oldVlue);
		return $res;
	}

}
?>