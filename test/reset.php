<?php 


require('../database/db-connect.php');


		$a = 'DELETE FROM `market_zamowienia` WHERE `id` > 1';
		$zadanie = $db_PDO->query($a);
		
		$a = 'DELETE FROM `detale` WHERE `id` > 1';
		$zadanie = $db_PDO->query($a);
		
		$a = 'DELETE FROM `market_stan_detali` WHERE `id` > 1';
		$zadanie = $db_PDO->query($a);
		
		$a = 'DELETE FROM `market_zamowienia_archiwum` WHERE `id` > 1';
		$zadanie = $db_PDO->query($a);
		
		$a = 'UPDATE
					`market_stan_detali`
				SET
					`status` = 0
				WHERE
					`id` > 1';
		
		$zadanie = $db_PDO->query($a);
		
		$a = 'DELETE FROM `hala_c_stan_detali` WHERE `id` > 1';
		$zadanie = $db_PDO->query($a);

		
		
		
