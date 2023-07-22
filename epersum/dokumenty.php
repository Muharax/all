<?php 

require ('../js/tcpdf/tcpdf.php');
require ('../database/db.php');
$f = 18;
$a = "SELECT * FROM `users` WHERE `id`='".$f."'";
$zadanie = $db_PDO->query($a);
$wiersz = $zadanie->fetch();
$imie = $wiersz['imie'];
$nazwisko = $wiersz['nazwisko'];
$data_rejestracji = $wiersz['data_rejestracji'];
$nr = $wiersz['nr_tel'];
$adr = $wiersz['adres'];
$id = $wiersz['id'];


$ilosc_godz = $wiersz['ilosc_godz'];
$stawka = $wiersz['stawka'];
$pokazz = $ilosc_godz * $stawka;
$pokaz = $ilosc_godz.' x '.$stawka;
$pkt = $pokazz.' PLN';

$pensja_brutto = $ilosc_godz * $stawka;
$pbruttoo = $pensja_brutto * 0.92;
$pbrutto = round($pbruttoo, 2); 
$pok = $pbrutto.' PLN';

$kacz = $pbrutto * 0.71;
$pokaczynskimm = round($kacz, 2);
$pokaczynskim = $pokaczynskimm.' PLN';

$tusk = $pbrutto * 0.44;
$potuskumm = round($tusk, 2);
$potusku = $potuskumm.' PLN';

$ppen = floatval($pensja_brutto);
$ppenn = floatval($potusku);
$kosztpracownikaa = $ppen - $ppenn;

$kosztpracownika = $kosztpracownikaa.' PLN';




$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Adrian Gajda');
$pdf->SetTitle('Pasek wynagrodzenia za miesiąc Styczeń 2022');
$pdf->SetSubject('PASEK WYNAGRODZENIA');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
$pdf->setFooterData(array(0,64,0), array(0,64,128));
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set default font subsetting mode
$pdf->setFontSubsetting(true);

// Set font
// dejavusans is a UTF-8 Unicode font, if you only need to
// print standard ASCII chars, you can use core fonts like
// helvetica or times to reduce file size.
$pdf->SetFont('dejavusans', '', 10, '', true);

// Add a page
// This method has several options, check the source code documentation for more information.
$pdf->AddPage();

// set text shadow effect
$pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));

// Set some content to print
$html = <<<EOD

<style>
	table.ab td{
		font-size:9px;
		border-bottom:1px solid black;
	}
	table.ab th {
		border:1px solid black;
		font-size:10px;
		font-weight:900;
		text-align:center;
		background-color:grey;
		color:white;
	}
</style>

<div>
<table style="border:1px solid black;">
<tr>
<td>Imie</td><td>$imie</td>
</tr>
<tr>
<td>Nazwisko</td><td>$nazwisko</td>
</tr>
<tr>
<td>Numer pracownika</td><td>$id</td>
</tr>
<tr>
<td>Numer Tel</td><td>$nr</td>
</tr>
<tr>
<td>Data zatrudnienia</td><td>$data_rejestracji</td>
</tr>
<tr>
<td>Adres</td><td>$adr</td>
</tr>
</table>

<div style="height:10px;width:100%;"></div>
<table class="ab">
<thead>
<tr>
	<th>KOD PODATKU</th>
	<th>NAZWA</th>
	<th>CZAS PRACY</th>
	<th>STAWKA</th>
	<th>WYLICZENIA</th>
	<th>BRUTTO</th>
	<th>PODATEK</th>
	<th>NETTO</th>
</tr>
</thead>
<tr>
	<td>707</td>
	<td>PRACA</td>
	<td>$ilosc_godz</td>
	<td>$stawka</td>
	<td>$pokaz</td>
	<td>$pkt</td>
	<td>8%</td>
	<td>$pok</td>
	
</tr>
<tr style="border:1px solid black;">
	<td>708</td>
	<td>UTRZYMANIE KACZYŃSKIEGO</td>
	<td>-</td>
	<td>-</td>
	<td>-</td>
	<td>-</td>
	<td>29%</td>
	<td>$pokaczynskim</td>
	
</tr>

<tr style="border:1px solid black;">
	<td>708</td>
	<td>UTRZYMANIE TUSKA I JEGO BANDY NIEUDACZNIKÓW</td>
	<td>-</td>
	<td>-</td>
	<td>-</td>
	<td>-</td>
	<td>66%</td>
	<td>$potusku</td>
	
</tr>
</table>
</div>

<div style="text-align:right;margin-top:-15px;background-color:black;color:white;">
KWOTA DO WYPŁATY: <B>$potusku</B>
</div>

<table>
<tr>
<td>KOSZT PRACOWNIKA</td><td>$kosztpracownika</td>
</tr>
<tr>
<td>KOSZT PRACODAWCY</td><td>11457.44 PLN</td>
</tr>
</table>
<div></div>
<table>
<tr>
	<td>
		WKŁADCY PCK:
	</td>
	<td>
		115 ZŁ
	</td>
</tr>

</table>
EOD;

// Print text using writeHTMLCell()
$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

// ---------------------------------------------------------

// Close and output PDF document
// This method has several options, check the source code documentation for more information.
$pdf->Output('example_001.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+