<?php 
require_once(__DIR__.'/../../../Autoloader.php');

use MDword\WordProcessor;


$template = __DIR__.'/temple.docx';
$rtemplate = __DIR__.'/r-temple.docx';

$TemplateProcessor = new WordProcessor();
$TemplateProcessor->load($template);

$TemplateProcessor->setValue('value', 'r-value');
$TemplateProcessor->setValue('value', 'r-value2');

$TemplateProcessor->setImageValue('image', dirname(__FILE__).'/logo.jpg');

$TemplateProcessor->clones('people', 3);

$TemplateProcessor->setValue('name#0', 'colin0');
$TemplateProcessor->setValue('name#1', [['type'=>MDWORD_PAGE_BREAK]]);
$TemplateProcessor->setValue('name#2', 'colin2');

$TemplateProcessor->setValue('sex#1', 'woman');

$TemplateProcessor->setValue('age#0', '280');
$TemplateProcessor->setValue('age#1', '281');
$TemplateProcessor->setValue('age#2', '282');

$TemplateProcessor->deleteP('style');

$TemplateProcessor->saveAs($rtemplate);

