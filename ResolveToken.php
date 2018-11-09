<?php

class ResolveToken
{

    private $replacements = array(
        'a' => 'z',
        'b' => 'y',
        'c' => 'x',
        'd' => 'w',
        'e' => 'v',
        'f' => 'u',
        'g' => 't',
        'h' => 's',
        'i' => 'r',
        'j' => 'q',
        'k' => 'p',
        'l' => 'o',
        'm' => 'n',
        'n' => 'm',
        'o' => 'l',
        'p' => 'k',
        'q' => 'j',
        'r' => 'i',
        's' => 'h',
        't' => 'g',
        'u' => 'f',
        'v' => 'e',
        'w' => 'd',
        'x' => 'c',
        'y' => 'b',
        'z' => 'a'
    );

    private $token;


    public function __construct($token)
    {
        $token = preg_split('//', $token, -1, PREG_SPLIT_NO_EMPTY);

        for ($i = 0; $i < count($token); $i++) {
            $token[$i] = (array_key_exists($token[$i],$this->replacements)) ? $this->replacements[$token[$i]] : $token[$i];
        }

        $this->setToken(join("",$token));
    }

    private function setToken($token){
        $this->token = $token;
    }

    public function getTokenSolved(){
        return $this->token;
    }
}