<?php
namespace SimpleApp\Utils;

use SimpleApp\Models;

/**
 * Utility to retrieve data from markdown files
 */
class MarkdownLoader {
    private $baseDir;
    private $markdownParser;

    /**
     * Costruction set the base path of the markdown files
     *  and instance of Markdown Parser
     *
     * @param [string] $baseDir     path to folder of json files
     */
    public function __construct($baseDir = __DIR__)
    {
        $this->markdownParser = new MarkdownParser();
        $this->baseDir = $baseDir;
    }

    /**
     * Load text data for page
     *
     * @param string $pageName      file name / page name
     * @return string
     */
    public function load_page($pageName = 'home') {
        $data = $this->load_markdown_file($this->baseDir . "/data/pages/". $pageName .".md");
        return $data;
    }

    /**
     * Convert Markdown text in Html text
     *
     * @param [string] $string      text of Markdown
     * @return string
     */
    public function convert_markdown_html($string) {
        $data = $this->markdownParser->getText($string);
        if ($data === null) {
            die("Error to transform markdown data");
        }

        return $data;
    }

    /**
     * Utility function to retrieve content from file markdown
     *
     * @param [string] $fileName        file name
     * @return string
     */
    private function load_markdown_file($fileName) {
        $string = file_get_contents($fileName);
        if ($string === false) {
            die("Error to read markdown data file");
        }

        return $string;
    }
}