<?php
namespace SimpleApp\Utils;

use eftec\bladeone\BladeOne;

/**
 * Class wrapper for View Engine
 */
class ViewEngine {
    private $baseDir;
    private $viewsPath;
    private $cachePath;
    private $engine;

    /**
     * Constructor for ViewEngine
     *
     * @param [type] $baseDir
     * @param string $viewsPath
     * @param string $cachePath
     */
    public function __construct($baseDir = __DIR__, $viewsPath = '/views/themes/bootstrap', $cachePath = '/cache')
    {
        $this->baseDir = $baseDir;
        $this->viewsPath = $baseDir . $viewsPath;
        $this->cachePath = $baseDir . $cachePath;
        $this->engine = new BladeOne($this->viewsPath, $this->cachePath, BladeOne::MODE_AUTO);
        
        /** Directive blade for exclude escape of some HTML tags, edit here for add or remove */
        $this->engine->directive('stripHtml', function ($expression) {
            return strip_tags($expression, '<h1><h2><h3><ol><ul><li><p><i><b><a><em><strong>');
        });
    }

    /**
     * Return the selected View Engine
     *
     * @return object
     */
    public function getEngine() 
    {
        return $this->engine;
    }
}