<?php
require_once __DIR__ . '/autoload.php'; 

use SimpleApp\Configs;
use SimpleApp\Utils;

$baseConfig = new Configs\Base;
$viewEngine = new Utils\ViewEngine(__DIR__, $baseConfig->getTemplatePath());
$jsonLoader = new Utils\JsonLoader(__DIR__);
$markdownLoader = new Utils\MarkdownLoader(__DIR__);

$homeMessages = $jsonLoader->load_home_messages();
$mdText = $markdownLoader->load_page('home');

/* For demonstration purpose */
$json_home_messages = str_replace('\n', '<br />', $jsonLoader->load_json_file_demo(__DIR__ . "/data/home_messages.json"));
$mdHtml = $markdownLoader->convert_markdown_html($mdText);
/* END For demonstration purpose */

$variables = [
    'currentPage' => 'home',
    'homeMessages' => $homeMessages,
    'mdText' => $mdText,

    /* For demonstration purpose */
    'mdHtml' => $mdHtml,
    'json_home_messages' => $json_home_messages,
    /* END For demonstration purpose */
];

$variables = array_merge($baseConfig->getBaseInfo(), $variables);

echo $viewEngine->getEngine()->run('pages.home', $variables);
