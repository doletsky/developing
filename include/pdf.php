<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");?>
<?php
echo "<pre>"; print_r($_POST); echo "</pre>";
//require($_SERVER["DOCUMENT_ROOT"].'/include/tcpdf/tcpdf.php');
$old=file_get_contents ( $_POST["fn"]);

$Rep=array();
$arStr=explode("\n",$old):
foreach($arStr as $str){
 $arLine=explode(";",$str);
 for($i=4;$i<count($arLine)-1;$i+=2)
 $Rep[$arLine[0]]['test'][$arLine[2]][$arLine[$i]]=[$arLine[$i+1]];
$Rep[$arLine[0]]['test'][$arLine[2]]['data']=[$arLine[3]];
}
echo "<pre>"; print_r($Rep); echo "</pre>";die;

// Extend the TCPDF class to create custom Header and Footer
class MYPDF extends TCPDF {

    //Page header
    public function Header() {
        // Logo
        //$image_file = $_SERVER["DOCUMENT_ROOT"].'test/report/'.$_POST['logo'].'/logo_test.png';
        //$this->Image($image_file, 10, 10, '', '', 'PNG', '', 'N', false, 300, 'R', false, false, 0, false, true, false);
        // Set font
        $this->SetFont('dejavusanscondensed', 'I', 14);
    $this->SetTextColor(66,170,255); 
        // Title
        $this->Cell(0, 15, 'Демонстрационная генерация PDF отчета', 0, false, 'L', 0, '', 0, false, 'M', 'M');
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
        $ftxt='Страница '.$this->getAliasNumPage().' из '.$this->getAliasNbPages();
        $this->Cell(0, 10, $ftxt, 0, false, 'L', 0, 'R', 0, false, 'T', 'M');
    $this->Cell(0, 10, 'Консалтинговая группа ', 0, false, 'R', 0, 'L', 0, false, 'T', 'M');
    $this->SetFont('dejavusanscondensed', 'B', 8);
    $this->Cell(0, 10, 'BI TO BE', 0, false, 'L', 0, '', 0, false, 'T', 'M');
    }
}

// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('BI TO BE');
$pdf->SetTitle('Демонстрационная генерация PDF отчета');
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

$txt_n = $_POST['name'];//'Иванов Иван Иванович';

$pdf->Write($h=70, $txt_n, $link='', $fill=0, $align='L', $ln=true, $stretch=0, $firstline=false, $firstblock=false, $maxh=0);

$pdf->SetFont('dejavusanscondensed', '', 24);
// set some text to print
$txt = $_POST['logo'].'

'.$_POST['data'];
$max=0;
$mkey=array();
$v_motiv="";
$armotiv=array('избегательная','хозяйская','патриотическая','профессиональная','инструментальная');
arsort($_POST['res']);
$max=current($_POST['res']);
$v_motiv=$armotiv[key($_POST['res'])];
$mkey[]=key($_POST['res']);
next($_POST['res']);
if($max-current($_POST['res'])<0.03)
    {
    $v_motiv.=" и ".$armotiv[key($_POST['res'])];
    $mkey[]=key($_POST['res']);
    next($_POST['res']);
    if($max-current($_POST['res'])<0.03)
        {
        $v_motiv = str_replace(" и ", ", ", $v_motiv);
        $v_motiv.=" и ".$armotiv[key($_POST['res'])];
        $mkey[]=key($_POST['res']);
        }
    }

// print a block of text using Write()
$pdf->Write($h=0, $txt, $link='', $fill=0, $align='L', $ln=true, $stretch=0, $firstline=false, $firstblock=false, $maxh=0);

//Уважаемый коллега!
//Как Вы знаете, в Вашей компании была проведена диагностика трудовых мотивов работников. 
$txt_ob='Ваш мотивационный профиль:';

$txt2='Вашим ведущим типом мотивации является '.$v_motiv.' мотивация.';

// add a page
$pdf->AddPage();
$image_file1 = $_SERVER["DOCUMENT_ROOT"].'test/img/pr001.png';
$pdf->Image($image_file1, 17, 35, $pdf->getPageWidth()-30, '', 'PNG', '', 'N', true, 300, 'L', false, false, 0, false, false, false);

$pdf->SetFont('dejavusanscondensed', '', 11);
$pdf->SetTextColor('79','129','189'); 
$pdf->Write($h=0, $txt_ob, $link='', $fill=0, $align='L', $ln=true, $stretch=0, $firstline=false, $firstblock=false, $maxh=0);
$pdf->SetFillColor(60,100,150);
$pdf->SetFont('dejavusanscondensed', '', 8);
$pdf->Cell(2, 5, '', false, 1, 'R', 0);
$pdf->Cell(40, 6, 'Инструментальная', false , 0, 'R',0);
$pdf->SetCellMargins(0,0,1,0);
$pdf->Cell(2, 6, '', array('TR' => array('width' => '0,7', 'color' => array(150,150,150))), 0, 'R', 0);
$pdf->SetCellMargins(0,0,0,0);
$pdf->Cell(120*$_POST['res'][4], 1, '', array('T' => array('width' => 2, 'color' => array(255,255,255))), 0, 'R', 1);
$pdf->Cell(10, 6, $_POST['res'][4], false, 1, 'R', 0);
$pdf->Cell(40, 6, 'Профессиональная', false , 0, 'R',0);
$pdf->SetCellMargins(0,0,1,0);
$pdf->Cell(2, 6, '', array('TR' => array('width' => '0,7', 'color' => array(150,150,150))), 0, 'R', 0);
$pdf->SetCellMargins(0,0,0,0);
$pdf->Cell(120*$_POST['res'][3], 1, '', array('T' => array('width' => 2, 'color' => array(255,255,255))), 0, 'R', 1);
$pdf->Cell(10, 6, $_POST['res'][3], false, 1, 'R', 0);
$pdf->Cell(40, 6, 'Патриотическая', false , 0, 'R',0);
$pdf->SetCellMargins(0,0,1,0);
$pdf->Cell(2, 6, '', array('TR' => array('width' => '0,7', 'color' => array(150,150,150))), 0, 'R', 0);
$pdf->SetCellMargins(0,0,0,0);
$pdf->Cell(120*$_POST['res'][2], 1, '', array('T' => array('width' => 2, 'color' => array(255,255,255))), 0, 'R', 1);
$pdf->Cell(10, 6, $_POST['res'][2], false, 1, 'R', 0);
$pdf->Cell(40, 6, 'Хозяйская', false, 0, 'R', 0);
$pdf->SetCellMargins(0,0,1,0);
$pdf->Cell(2, 6, '', array('TR' => array('width' => '0,5', 'color' => array(150,150,150))), 0, 'R', 0);
$pdf->SetCellMargins(0,0,0,0);
$pdf->Cell(120*$_POST['res'][1], 1, '', array('T' => array('width' => 2, 'color' => array(255,255,255))), 0, 'R', 1);
$pdf->Cell(10, 6, $_POST['res'][1], false, 1, 'R', 0);
$pdf->Cell(40, 6, 'Избегательная', false , 0, 'R',0);
$pdf->SetCellMargins(0,0,1,0);
$pdf->Cell(2, 6, '', array('TRB' => array('width' => '0,5', 'color' => array(150,150,150))), 0, 'R', 0);
$pdf->SetCellMargins(0,0,0,0);
$pdf->Cell(120*$_POST['res'][0], 1, '', array('T' => array('width' => 2, 'color' => array(255,255,255))), 0, 'R', 1);
$pdf->Cell(10, 6, $_POST['res'][0], false, 1, 'R', 0);
$pdf->Cell(2, 5, '', false, 1, 'R', 0);

$pdf->SetFont('dejavusanscondensed', '', 11);
$pdf->SetTextColor('79','129','189'); 
//$pdf->Cell(15, 15, 'Вывод: ', false , 0, 'L',0);
$pdf->Write($h=0, 'Вывод: ', $link='', $fill=0, $align='L', $ln=false, $stretch=0, $firstline=false, $firstblock=false, $maxh=0);

$pdf->SetTextColor('0','0','0'); 
$pdf->Write($h=0, ' Вашим ведущим типом мотивации является ', $link='', $fill=0, $align='L', $ln=false, $stretch=0, $firstline=false, $firstblock=false, $maxh=0);

//$pdf->Cell(90, 15, 'Вашим ведущим типом мотивации является ', false , 0, 'L',0);
$pdf->SetTextColor('79','129','189');
$pdf->Write($h=0, $v_motiv, $link='', $fill=0, $align='L', $ln=false, $stretch=0, $firstline=false, $firstblock=false, $maxh=0);
 
//$pdf->Cell(false, 15, $v_motiv, false , 0, 'L',0);
$pdf->SetTextColor('0','0','0'); 
$pdf->Write($h=0, ' мотивация.', $link='', $fill=0, $align='L', $ln=true, $stretch=0, $firstline=false, $firstblock=false, $maxh=0);

//$pdf->Cell(false, 15, ' мотивация.', false , 1, 'L',0);
$pdf->AddPage();
$image_file1 = $_SERVER["DOCUMENT_ROOT"].'test/img/pr002v6.png';
$pdf->Image($image_file1, 17, 35, $pdf->getPageWidth()-30, '', 'PNG', '', 'N', true, 300, 'L', false, false, 0, false, false, false);

$pdf->AddPage();
$image_file1 = $_SERVER["DOCUMENT_ROOT"].'test/img/pr003v6.png';
$pdf->Image($image_file1, 17, 35, $pdf->getPageWidth()-30, '', 'PNG', '', 'N', true, 300, 'L', false, false, 0, false, false, false);

$pdf->AddPage();
$image_file1 = $_SERVER["DOCUMENT_ROOT"].'test/img/pr004.png';
$pdf->Image($image_file1, 17, 35, $pdf->getPageWidth()-30, '', 'PNG', '', 'N', true, 300, 'L', false, false, 0, false, false, false);

$pdf->AddPage();
$image_file1 = $_SERVER["DOCUMENT_ROOT"].'test/img/pr005.png';
$pdf->Image($image_file1, 17, 35, $pdf->getPageWidth()-30, '', 'PNG', '', 'N', true, 300, 'L', false, false, 0, false, false, false);

$pdf->AddPage();
$image_file1 = $_SERVER["DOCUMENT_ROOT"].'test/img/pr006.png';
$pdf->Image($image_file1, 17, 35, $pdf->getPageWidth()-30, '', 'PNG', '', 'N', true, 300, 'L', false, false, 0, false, false, false);

$pdf->AddPage();
$image_file1 = $_SERVER["DOCUMENT_ROOT"].'test/img/pr007v6.png';
$pdf->Image($image_file1, 17, 35, $pdf->getPageWidth()-30, '', 'PNG', '', 'N', true, 300, 'L', false, false, 0, false, false, false);

$pdf->AddPage();
$image_file1 = $_SERVER["DOCUMENT_ROOT"].'test/img/pr008.png';
$pdf->Image($image_file1, 17, 35, $pdf->getPageWidth()-30, '', 'PNG', '', 'N', true, 300, 'L', false, false, 0, false, false, false);

$pdf->AddPage();
$image_file1 = $_SERVER["DOCUMENT_ROOT"].'test/img/pr009.png';
$pdf->Image($image_file1, 17, 35, $pdf->getPageWidth()-30, '', 'PNG', '', 'N', true, 300, 'L', false, false, 0, false, false, false);

$pdf->AddPage();
$image_file1 = $_SERVER["DOCUMENT_ROOT"].'test/img/pr010.png';
$pdf->Image($image_file1, 17, 35, $pdf->getPageWidth()-30, '', 'PNG', '', 'N', true, 300, 'L', false, false, 0, false, false, false);


if(0){
$pdf->SetFont('dejavusanscondensed', 'B', 12);
$pdf->SetTextColor(200,0,0); 
$pdf->Cell(2, 10, '', false, 1, 'R', 0);
$pdf->Cell(0, 10, 'Краткая характеристика различных типов мотивации', false, 1, 'L', 0);
$pdf->SetTextColor(0,0,0); 

if(in_array(4,$mkey)){
$pdf->Cell(2, 10, '', false, 1, 'R', 0);
$pdf->Cell(0, 10, 'Инструментальная.', false, 1, 'L', 0);
$pdf->SetFont('dejavusanscondensed', '', 12);
$txt_inst=<<<EOD
Сама работа не является для такого работника сколько-нибудь значимой ценностью и рассматривается только как источник заработка и других благ, получаемых в качестве вознаграждения за труд. Но его интересуют не любые деньги, а именно заработок; поэтому он будет работать с максимальной отдачей на любой работе, если его труд будет справедливо и высоко (в его понимании) оплачиваться.
Предпочтительные формы стимулирования для работника с данным типом мотивации:
• Денежные – зарплата, премии, доплаты.
• Натуральные – покупка или аренда жилья, предоставление автомобиля и др.

EOD;
$pdf->Write($h=0, $txt_inst, $link='', $fill=0, $align='L', $ln=true, $stretch=0, $firstline=false, $firstblock=false, $maxh=0);
}
if(in_array(3,$mkey)){
$pdf->Cell(2, 10, '', false, 1, 'R', 0);
$pdf->SetFont('dejavusanscondensed', 'B', 12);
$pdf->Cell(0, 10, 'Профессиональная.', false, 1, 'L', 0);
$pdf->SetFont('dejavusanscondensed', '', 12);
$txt_inst=<<<EOD
 Работник этого типа ценит в работе ее содержание, возможность проявить себя и доказать (не только окружающим, но и себе), что он может справиться с трудным заданием, которое не каждому посильно. Отличается развитым профессиональным достоинством. К руководителю чаще всего относится с известной долей иронии. 
Предпочтительные формы стимулирования для работника с данным типом мотивации:
• Организационные – содержанием, условиями и организацией работы.
• Денежные – зарплата, премии, доплаты.
• Моральные.
• Привлечение к участию в управлении.
EOD;
$pdf->Write($h=0, $txt_inst, $link='', $fill=0, $align='L', $ln=true, $stretch=0, $firstline=false, $firstblock=false, $maxh=0);
}
if(in_array(2,$mkey)){
$pdf->Cell(2, 10, '', false, 1, 'R', 0);
$pdf->SetFont('dejavusanscondensed', 'B', 12);
$pdf->Cell(0, 10, 'Патриотическая.', false, 1, 'L', 0);
$pdf->SetFont('dejavusanscondensed', '', 12);
$txt_inst=<<<EOD
Основана на высоких моральных, религиозных, идеологических соображениях, на убеждении работника в своей нужности для организации. Такой работник способен «загореться» перспективной стратегией, выдвинутой руководством, и будет работать с полной отдачей, способствуя воплощению этой стратегии. Он более всего ценит результативность общего дела, в котором участвует, и общественное признание своего участия, выраженное более в моральных (нежели в материальных) знаках и оценках.
Предпочтительные формы стимулирования для работника с данным типом мотивации:
• Моральные.
• Негативные – неудовольствие, наказания, угроза потери работы.
• Патернализм (забота о работнике).
• Натуральные – покупка или аренда жилья, предоставление автомобиля и др.
• Привлечение к участию в управлении.
EOD;
$pdf->Write($h=0, $txt_inst, $link='', $fill=0, $align='L', $ln=true, $stretch=0, $firstline=false, $firstblock=false, $maxh=0);
}
if(in_array(1,$mkey)){
$pdf->Cell(2, 10, '', false, 1, 'R', 0);
$pdf->SetFont('dejavusanscondensed', 'B', 12);
$pdf->Cell(0, 10, 'Хозяйская.', false, 1, 'L', 0);
$pdf->SetFont('dejavusanscondensed', '', 12);
$txt_inst=<<<EOD
Выражается в добровольном принятии работником на себя полной  ответственности за выполняемую работу. Работник с таким типом мотивации будет выполнять свою работу с максимальной отдачей, не настаивая на ее особой интересности или высокой оплате, не требуя ни дополнительных указаний, ни постоянного контроля. Но хозяином очень трудно управлять - он суверенен и не только не нуждается в приказаниях или наказаниях (свойственных распространенному у нас административному стилю управления), но и не терпит их.
Предпочтительные формы стимулирования для работника с данным типом мотивации:
• Привлечение к участию в управлении.
• Организационные – содержанием, условиями и организацией работы.
• Денежные – зарплата, премии, доплаты.
EOD;
$pdf->Write($h=0, $txt_inst, $link='', $fill=0, $align='L', $ln=true, $stretch=0, $firstline=false, $firstblock=false, $maxh=0);
}
if(in_array(0,$mkey)){
$pdf->Cell(2, 10, '', false, 1, 'R', 0);
$pdf->SetFont('dejavusanscondensed', 'B', 12);
$pdf->Cell(0, 10, 'Избегательный работник.', false, 1, 'L', 0);
$pdf->SetFont('dejavusanscondensed', '', 12);
$txt_inst=<<<EOD
Обладает очень слабой мотивацией к эффективной работе. У него низкая квалификация и он не стремится ее повышать; он безответственен и старается избежать любой работы, связанной с личной ответственностью; он сам не проявляет никакой активности и негативно относится к активности других. Его основное стремление - минимизировать свои трудовые усилия на уровне, допустимом со стороны непосредственного руководителя. В силу этих качеств он как работник ценится невысоко, не может обеспечить себя своим трудом и смирился с этим!
Зато он удобен: ему можно поручить работу, на которую не согласятся работники других типов мотивации; он выступает за уравнительность и согласен на достаточно низкий заработок, лишь бы никто другой не получал существенно больше; он чрезвычайно зависим от руководителя и принимает эту зависимость как должное. Кроме того, люмпенизированный работник – единственный, по отношению к которому административный стиль управления может быть эффективным, а потому оправданным.
Предпочтительные формы стимулирования для работника с данным типом мотивации:
• Негативные – неудовольствие, наказания, угроза потери работы.
• Натуральные – покупка или аренда жилья, предоставление автомобиля и др.
• Патернализм (забота о работнике).
EOD;
$pdf->Write($h=0, $txt_inst, $link='', $fill=0, $align='L', $ln=true, $stretch=0, $firstline=false, $firstblock=false, $maxh=0);
}
}
// ---------------------------------------------------------




    //$pdf->Output($_SERVER["DOCUMENT_ROOT"].'upload/test/'.$_POST["fname"].'.pdf', 'F'); ?>