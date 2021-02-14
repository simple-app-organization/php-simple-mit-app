<?php
require_once __DIR__ . '/../autoload.php';

use SimpleApp\Configs;
use SimpleApp\Utils;

$baseConfig = new Configs\Base;
$viewEngine = new Utils\ViewEngine(__DIR__ . '/../');
$jsonLoader = new Utils\JsonLoader(__DIR__ . '/../');
$markdownLoader = new Utils\MarkdownLoader(__DIR__ . '/../');

$places = $jsonLoader->load_places();
$mdText = $markdownLoader->load_page('whereare');
/* For demonstration purpose */
$json_places = str_replace('\n', '<br />', $jsonLoader->load_json_file_demo(__DIR__ . '/../' . "/data/places.json"));
$mdHtml = $markdownLoader->convert_markdown_html($mdText);
/* END For demonstration purpose */

$variables = [
    'currentPage' => 'whereare',
    'places' => $places,
    'mdText' => $mdText,

    /* For demonstration purpose */
    'mdHtml' => $mdHtml,
    'json_places' => $json_places,
    /* END For demonstration purpose */
];

$variables = array_merge($baseConfig->getBaseInfo(), $variables);

echo $viewEngine->getEngine()->run('pages.whereare', $variables);
