<?php 
require_once(__DIR__.'/../../../Autoloader.php');

use MDword\WordProcessor;


$template = __DIR__.'/temple.docx';
$rtemplate = __DIR__.'/r-temple.docx';

$TemplateProcessor = new WordProcessor();
$TemplateProcessor->load($template);


$TemplateProcessor->clones('row',3);
$TemplateProcessor->setValue('rowIndex#0',0);
$TemplateProcessor->setValue('rowIndex#1',1);
$TemplateProcessor->setValue('rowIndex#2',2);
$TemplateProcessor->setValue('rowIndex#2',3);
$TemplateProcessor->setValue('rowIndex#2',4);

$TemplateProcessor->setImageValue('rowImage#0',dirname(__FILE__).'/img.jpg');
$TemplateProcessor->setImageValue('rowImage#1',dirname(__FILE__).'/img2.bmp');

$rows = [
    ['index'=>2,'image'=> dirname(__FILE__).'/img.jpg'],
    ['index'=>3,'image'=> dirname(__FILE__).'/img3.png'],
    ['index'=>4,'image'=> dirname(__FILE__).'/img3.png'],
];

$bind = $TemplateProcessor->getBind($rows);
$bind->bindValue('row#2',[])
->bindValue('rowIndex#2',['index'],'row#2')
->bindValue('rowImage#2',['image'],'row#2',MDWORD_IMG)
;

$TemplateProcessor->setImageValue('rowImage#2#0',dirname(__FILE__).'/img.jpg');

$TemplateProcessor->setImageValue('image insert', dirname(__FILE__).'/img3.png');

$TemplateProcessor->setImageValue('image replace', dirname(__FILE__).'/img.jpg');

//replace image by md5
$Medies = $TemplateProcessor->getMedies();
foreach($Medies as $Medie) {
    if('2529be7711acbb60c7e4ac1693c680a0' === $Medie['md5']) {
        $TemplateProcessor->setImageValue($Medie['md5'], dirname(__FILE__).'/img.jpg');
    }
}


$TemplateProcessor->saveAs($rtemplate);

