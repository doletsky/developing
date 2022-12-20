<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");?>
<?if(1){
echo "<pre>"; print_r($_POST); echo "</pre>";
require($_SERVER["DOCUMENT_ROOT"].'/include/tcpdf/tcpdf.php');
$old=iconv( "windows-1251", "utf-8", file_get_contents ( $_SERVER["DOCUMENT_ROOT"]."/upload/tests/".$_POST['fn'].".csv"));
//$old=file_get_contents ( $_SERVER["DOCUMENT_ROOT"]."/upload/tests/".$_POST['fn'].".csv");

if(substr_count($_POST['fn'],"_")>1) {echo "+";echo $old=str_replace("\n",";",$old);}

if(substr_count($_POST['fn'],"_")>1) echo $old=str_replace("\n",";",$old);
$Rep=array();
$test=array();
$arStr=explode("\n",$old);

foreach($arStr as $str){
 $arLine=explode(";",$str);
 $name=explode(",",$arLine[0]);
 $test[$name[0]][$arLine[1]]['date']=$arLine[2];
 for($i=3;$i<count($arLine)-1;$i=2+$i)
  {
	
	$test[$name[0]][$arLine[1]][$arLine[$i]]=$arLine[$i+1];
  }

}
echo "<pre>"; print_r($Rep); echo "</pre>";
echo "<pre>"; print_r($test); echo "</pre>";


// Extend the TCPDF class to create custom Header and Footer
class MYPDF extends TCPDF {

    //Page header
    public function Header() {
        // Logo
        //$image_file = $_SERVER["DOCUMENT_ROOT"].'test/report/'.$_POST['logo'].'/logo_test.png';
        //$this->Image($image_file, 10, 10, '', '', 'PNG', '', 'N', false, 300, 'R', false, false, 0, false, true, false);
        // Set font
        $this->SetFont('dejavusanscondensed', 'I', 18);
        $this->SetTextColor(66,170,255);
	$this->SetY(20);
        // Title
        $title=iconv( "windows-1251", "utf-8",'Демонстрационная генерация PDF отчета');
        $this->Cell(0, 15, $title, 0, false, 'L', 0, '', 0, false, 'T', 'T');
        //$this->SetY( 1.5 * 72, true );
        $this->SetLineStyle( array( 'width' => 2, 'color' => array( 100,149,237) ) );
        $this->Line( 20, 30, $this->getPageWidth() - 10, 30 );
    }

    // Page footer
    public function Footer() {
        // Position at 15 mm from bottom
        $this->SetY(-15);
    $this->SetLineStyle( array( 'width' => 0.5, 'color' => array( 100,149,237) ) );
        $this->Line( 20, $this->getPageHeight()-15, $this->getPageWidth() - 10, $this->getPageHeight()-15 );
        // Set font
        $this->SetFont('dejavusanscondensed', '', 8);
        // Page number
        $ftxt=iconv( "windows-1251", "utf-8",'Страница '.$this->getAliasNumPage().' из '.$this->getAliasNbPages());
        $this->Cell(0, 10, $ftxt, 0, false, 'L', 0, 'R', 0, false, 'T', 'M');
    $this->Cell(0, 10, iconv( "windows-1251", "utf-8",'Консалтинговая группа '), 0, false, 'R', 0, 'L', 0, false, 'T', 'M');
    $this->SetFont('dejavusanscondensed', 'B', 8);
    $this->Cell(0, 10, 'BI TO BE', 0, false, 'L', 0, '', 0, false, 'T', 'M');
    }
}

// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('BI TO BE');
$pdf->SetTitle(iconv( "windows-1251", "utf-8",'Демонстрационная генерация PDF отчета'));
//$pdf->SetSubject('TCPDF Tutorial');
//$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

//set margins
$pdf->SetMargins(20, 40, 21);
$pdf->SetHeaderMargin(150);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

//set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

//set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

//set some language-dependent strings
$pdf->setLanguageArray($l);

// ---------------------------------------------------------

// set font
$pdf->SetFont('dejavusanscondensed', '', 34);

// add a page
$pdf->AddPage();


foreach($test as $fio=>$tst){

$pdf->SetTextColor('0','0','0'); 
$txt_n =  $fio;//'Иванов Иван Иванович';
$pdf->SetFont('dejavusanscondensed', '', 18);
$pdf->Write($h=0, $txt_n, $link='', $fill=0, $align='L', $ln=true, $stretch=0, $firstline=false, $firstblock=false, $maxh=0);

foreach($tst as $tname=>$arPar){
	
	$pdf->SetTextColor('0','0','0'); 
	$pdf->SetFont('dejavusanscondensed', '', 16);
	$pdf->Write($h=0, $tname, $link='', $fill=0, $align='L', $ln=true, $stretch=0, $firstline=false, $firstblock=false, $maxh=0);
	
	
	foreach($arPar as $s=>$v){

			$pdf->SetTextColor('79','129','189'); 
			$pdf->SetFillColor(60,100,150);
			$pdf->SetFont('dejavusanscondensed', '', 10);
			$pdf->Cell(80, 6, $s.":".$v, false , 0, 'R',0);
			$pdf->ln(10);

			

		}
			

 }

}
//$fn2=str_replace("_","",$_POST['fn']);
$pdf->Output($_SERVER["DOCUMENT_ROOT"].'/upload/tests/'.$_POST['fn'].'.pdf', 'F');
}
?>