<?php
/**
 * Created by PhpStorm.
 * User: joaopaulodunder
 * Date: 09/11/18
 * Time: 14:28
 */

class DomParser
{
    private $domDocument;
    private $xpath;

    public function __construct()
    {
        $this->domDocument = new DOMDocument();
    }

    private function loadDocument($html){
        $this->domDocument->loadHTML($html);
        $this->xpath = new DOMXPath($this->domDocument);
    }

    public function getOriginalToken($html){
        $this->loadDocument($html);
        return $this->xpath->query('//*[@id="token"]')->item(0)->getAttribute('value');
    }

    public function getAnswer($html){
        $this->loadDocument($html);
        return $this->xpath->query('//*[@id="answer"]')->item(0)->textContent;
    }


}