<?php
namespace SimpleApp\Configs;

class Base {
    /**
     * Return the path of the blade theme
     *
     * @return string
     */
    public function getTemplatePath() {
        return '/views/themes/bootstrap';
    }

    /**
     * Return the basic configuration of the website
     *
     * @return array
     */
    public function getBaseInfo() {
        return [
            'appName' => 'php-simple-app',
            'appVersion' => '1.0.0',
            // the uri where you publish your web site
            'publicUrl' => 'http://magicianred.altervista.org/gigs/php-simple-app/',
            'extFile' => '.php', // Remove for url rewrite
        ];
    }


    public function getEmailConfig() {
        $from   = '"My website" <webmaster@example.com>';
        $to     = 'magicianred@gmail.com';     // your address
        return [
            'to'        =>  $to,
            'headers'   =>  'From: ' . $from . "\r\n" .
                            'Reply-To: ' . $to . "\r\n" .
                            'X-Mailer: PHP/' . phpversion(),
        ];
    }
}