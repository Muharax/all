<?php
class msg{
	private $odbiorca;
	private $temat;
	private $tresc;
	

	public function set_odbiorca($odbiorca){
		$this->odbiorca = $odbiorca;
	}
	
	public function set_temat($temat){
		$this->temat = $temat;
	}
	
	public function set_tresc($tresc){
		$this->tresc = $tresc;
	}
	
	public function send_system_msg (){
		require('../../database/db-connect.php');
		$zadanie = $db_PDO->prepare('INSERT INTO `wiadomosci`(`msg_nadawca`, `msg_odbiorca`, `msg_tresc`, `msg_temat`, `msg_przeczytane`, `msg_data`) VALUES (:msg_nadawca,:msg_odbiorca,:msg_tresc,:msg_temat,:msg_przeczytane, :msg_data)');
		
		$zadanie->execute(array(':msg_nadawca' => 0, ':msg_odbiorca' => $this->odbiorca, ':msg_tresc' => $this->tresc, ':msg_temat' => $this->temat, ':msg_przeczytane' => 1, ':msg_data' => date('Y-m-d H:i:s')));
	}
}

?>