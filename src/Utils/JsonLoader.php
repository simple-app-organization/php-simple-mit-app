<?php
namespace SimpleApp\Utils;

use SimpleApp\Models;

/**
 * Utility to retrieve data from json files
 */
class JsonLoader {
    private $baseDir;

    /**
     * Costruction set the base path of the json files
     *
     * @param [string] $baseDir     path to folder of json files
     */
    public function __construct($baseDir = __DIR__)
    {
        $this->baseDir = $baseDir;
    }

    /**
     * Load data for Home page messages
     *
     * @return array of HomeMessage
     */
    public function load_home_messages() {
        $json_data = $this->load_json_file($this->baseDir . "/data/home_messages.json");

        $homeMessages = [];

        foreach($json_data as $json_message) {
            $homeMessage = new Models\HomeMessage;
            foreach ($json_message as $key => $value) {
                switch(strtolower($key)) {
                    case 'id':
                        $homeMessage->setId($value);
                        break;
                    case 'title':
                        $homeMessage->setTitle($value);
                        break;
                    case 'text':
                        $homeMessage->setText($value);
                        break;
                    case 'imagesrc':
                        $homeMessage->setImageSrc($value);
                        break;
                    case 'link':
                        $homeMessage->setLink($value);
                        break;
                }
            }
            array_push($homeMessages, $homeMessage);
        }
        return $homeMessages;
    }

    /**
     * Load paragraph text for pages
     *
     * @param string $pageName      the name file / page name
     * @return array of Paragraph
     */
    public function load_paragraphs($pageName = 'home') {
        $json_data = $this->load_json_file($this->baseDir . "/data/pages/". $pageName .".json");

        $paragraphs = [];

        foreach($json_data as $json_paragraph) {
            foreach ($json_paragraph as $key => $value) {
                switch(strtolower($key)) {
                    case 'paragraphs':
                        foreach ($value as $key1 => $value1) {
                            foreach ($value1 as $key2 => $value2) {
                                $paragraph = new Models\Paragraph;
                                switch(strtolower($key2)) {
                                    case 'text':
                                        $paragraph->setText($value2);
                                        break;
                                }
                            }
                            array_push($paragraphs, $paragraph);
                        }
                    break;
                }
            }
        }
        return $paragraphs;
    }

    /**
     * Load People data for page who are
     *
     * @return array of Person
     */
    public function load_people() {
        $json_data = $this->load_json_file($this->baseDir . "/data/people.json");

        $people = [];

        foreach($json_data as $json_person) {
            $person = new Models\Person;
            foreach ($json_person as $key => $value) {
                switch(strtolower($key)) {
                    case 'id':
                        $person->setId($value);
                        break;
                    case 'name':
                        $person->setName($value);
                        break;
                    case 'surname':
                        $person->setSurname($value);
                        break;
                    case 'shortbio':
                        $person->setShortBio($value);
                        break;
                    case 'email':
                        $person->setEmail($value);
                        break;
                    case 'profilesrc':
                        $person->setProfileSrc($value);
                        break;
                }
            }
            array_push($people, $person);
        }
        return $people;
    }

    /**
     * Load Place data for page where are
     *
     * @return array of Place
     */
    public function load_places() {
        $json_data = $this->load_json_file($this->baseDir . "/data/places.json");

        $places = [];

        foreach($json_data as $json_place) {
            $place = new Models\Place;
            foreach ($json_place as $key => $value) {
                switch(strtolower($key)) {
                    case 'id':
                        $place->setId($value);
                        break;
                    case 'title':
                        $place->setTitle($value);
                        break;
                    case 'address':
                        $place->setAddress($value);
                        break;
                    case 'country':
                        $place->setCountry($value);
                        break;
                    case 'phone':
                        $place->setPhone($value);
                        break;
                    case 'description':
                        $place->setDescription($value);
                        break;
                }
            }
            array_push($places, $place);
        }
        return $places;
    }

    /**
     * Utility function to retrieve content from file json
     *
     * @param [string] $fileName        file name
     * @return string
     */
    private function load_json_file($fileName) {
        $string = file_get_contents($fileName);
        if ($string === false) {
            die("Error to read json data file");
        }

        $json_data = json_decode($string, true);
        if ($json_data === null) {
            die("Error to decode json data");
        }

        return $json_data;
    }


    /**
     * ** JUST FOR DEMO **
     * Return string of JSON content
     *
     * @param [string] $fileName        file name
     * @return string
     */
    public function load_json_file_demo($fileName) {
        $string = file_get_contents($fileName);

        return $this->json_format($string);
    }


// original code: http://www.daveperrett.com/articles/2008/03/11/format-json-with-php/
// adapted to allow native functionality in php version >= 5.4.0

/**
* ** JUST FOR DEMO **
* Format a flat JSON string to make it more human-readable
*
* @param string $json The original JSON string to process
*        When the input is not a string it is assumed the input is RAW
*        and should be converted to JSON first of all.
* @return string Indented version of the original JSON string
*/
private function json_format($json) {
    if (!is_string($json)) {
      if (phpversion() && phpversion() >= 5.4) {
        return json_encode($json, JSON_PRETTY_PRINT);
      }
      $json = json_encode($json);
    }
    $result      = '';
    $pos         = 0;               // indentation level
    $strLen      = strlen($json);
    $indentStr   = "\t";
    $newLine     = "\n";
    $prevChar    = '';
    $outOfQuotes = true;
  
    for ($i = 0; $i < $strLen; $i++) {
      // Speedup: copy blocks of input which don't matter re string detection and formatting.
      $copyLen = strcspn($json, $outOfQuotes ? " \t\r\n\",:[{}]" : "\\\"", $i);
      if ($copyLen >= 1) {
        $copyStr = substr($json, $i, $copyLen);
        // Also reset the tracker for escapes: we won't be hitting any right now
        // and the next round is the first time an 'escape' character can be seen again at the input.
        $prevChar = '';
        $result .= $copyStr;
        $i += $copyLen - 1;      // correct for the for(;;) loop
        continue;
      }
      
      // Grab the next character in the string
      $char = substr($json, $i, 1);
      
      // Are we inside a quoted string encountering an escape sequence?
      if (!$outOfQuotes && $prevChar === '\\') {
        // Add the escaped character to the result string and ignore it for the string enter/exit detection:
        $result .= $char;
        $prevChar = '';
        continue;
      }
      // Are we entering/exiting a quoted string?
      if ($char === '"' && $prevChar !== '\\') {
        $outOfQuotes = !$outOfQuotes;
      }
      // If this character is the end of an element,
      // output a new line and indent the next line
      else if ($outOfQuotes && ($char === '}' || $char === ']')) {
        $result .= $newLine;
        $pos--;
        for ($j = 0; $j < $pos; $j++) {
          $result .= $indentStr;
        }
      }
      // eat all non-essential whitespace in the input as we do our own here and it would only mess up our process
      else if ($outOfQuotes && false !== strpos(" \t\r\n", $char)) {
        continue;
      }
  
      // Add the character to the result string
      $result .= $char;
      // always add a space after a field colon:
      if ($outOfQuotes && $char === ':') {
        $result .= ' ';
      }
  
      // If the last character was the beginning of an element,
      // output a new line and indent the next line
      else if ($outOfQuotes && ($char === ',' || $char === '{' || $char === '[')) {
        $result .= $newLine;
        if ($char === '{' || $char === '[') {
          $pos++;
        }
        for ($j = 0; $j < $pos; $j++) {
          $result .= $indentStr;
        }
      }
      $prevChar = $char;
    }
  
    return $result;
  }

}