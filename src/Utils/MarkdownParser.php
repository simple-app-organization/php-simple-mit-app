<?php
namespace SimpleApp\Utils;

use Parsedown;

/**
 * Class wrapper for Markdown Parser
 */
class MarkdownParser {
    private $safeMode;
    private $parser;

    public function __construct($safeMode = true)
    {
        $this->safeMode = $safeMode;
        $this->parser = new Parsedown();
    }

    public function getText($mdText) 
    {
        return $this->parser->text($mdText);
    }
}