<?php 
// define("ROOT_PATH", $_SERVER['DOCUMENT_ROOT'] . "/");

// define('URL', 'http://'.$_SERVER['SERVER_NAME'] . "/al/");

function dzielnik($x){
		require('../database/db.php');
		$ass ='SELECT * FROM `pojemniki` WHERE pojemnik="' . $x . '"';
		$zadanie_ass = $db_PDO->query($ass);
		$wiersz_ass = $zadanie_ass->fetch();
		$dzielnik = $wiersz_ass['dzielnik'];
		return $dzielnik;
		}
		
function apns($x){
		require('../database/db.php');
		$as ='SELECT * FROM `strefa_czyszczenia_ilosc-opakowan` WHERE pojemnik="' . $x . '"';
		$zadanie_as = $db_PDO->query($as);
		$wiersz_as = $zadanie_as->fetch();
		$aktualna = $wiersz_as['ilosc'];
		return $aktualna;
		}
		
function ompas($x, $y){
			
			require ('../database/db.php');
			$b = 'SELECT `dzielnik` FROM `pojemniki` WHERE `pojemnik`="' . $x . '"';
			$zadanie_b = $db_PDO->query($b);
			$wiersz_b = $zadanie_b->fetch();
			$dzielnik = $wiersz_b['dzielnik'];
			$total = $y / $dzielnik;
			$total_f = floor($total) * $dzielnik;
			$total_ff = $y - $total_f;
			
			
			return ''.$total_f."|".$total_ff.'';
			}
			
function ompasIP($x, $y){
			
			require ('../database/db.php');
			$b = 'SELECT `dzielnik` FROM `pojemniki` WHERE `pojemnik`="' . $x . '"';
			$zadanie_b = $db_PDO->query($b);
			$wiersz_b = $zadanie_b->fetch();
			$dzielnik = $wiersz_b['dzielnik'];
			$total = $y / $dzielnik;
			$total_f = floor($total) * $dzielnik;
			$total_ff = $y - $total_f;
			
			
			return ''.$total_f."|".$total_ff.'';
			}
			
function podwozia($x, $y){
			
			require ('../database/db.php');
			$b = 'SELECT `dzielnik` FROM `pojemniki` WHERE `pojemnik`="' . $x . '"';
			$zadanie_b = $db_PDO->query($b);
			$wiersz_b = $zadanie_b->fetch();
			$dzielnik = $wiersz_b['dzielnik'];
			$total = $y / $dzielnik;
			$total_f = floor($total);
			
			
			return $total_f;
			}
			
function podwozia_r($x, $y){
			
			require ('../database/db.php');
			$b = 'SELECT `dzielnik` FROM `pojemniki` WHERE `pojemnik`="' . $x . '"';
			$zadanie_b = $db_PDO->query($b);
			$wiersz_b = $zadanie_b->fetch();
			$dzielnik = $wiersz_b['dzielnik'];
			$total = $y / $dzielnik;
			$total_f = floor($total) * $dzielnik;
			$total_ff = $y - $total_f;
			
			
			return $total_ff;
			}

				
				
?>

			

				
				