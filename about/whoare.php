<?php
require_once __DIR__ . '/../autoload.php';

use SimpleApp\Configs;
use SimpleApp\Utils;

$baseConfig = new Configs\Base;
$viewEngine = new Utils\ViewEngine(__DIR__ . '/../');
$jsonLoader = new Utils\JsonLoader(__DIR__ . '/../');
$markdownLoader = new Utils\MarkdownLoader(__DIR__ . '/../');

$people = $jsonLoader->load_people();
$mdText = $markdownLoader->load_page('whoare');

/* For demonstration purpose */
$json_people = str_replace('\n', '<br />', $jsonLoader->load_json_file_demo(__DIR__ . '/../' . "/data/people.json"));
$mdHtml = $markdownLoader->convert_markdown_html($mdText);
/* END For demonstration purpose */

$variables = [
    'currentPage' => 'whoare',
    'people' => $people,
    'mdText' => $mdText,

    /* For demonstration purpose */
    'mdHtml' => $mdHtml,
    'json_people' => $json_people,
    /* END For demonstration purpose */
];

$variables = array_merge($baseConfig->getBaseInfo(), $variables);

echo $viewEngine->getEngine()->run('pages.whoare', $variables);
