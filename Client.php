<?php

class Client
{
    /**
     * @var \GuzzleHttp\Client
     */
    private $http;

    /**
     * Client constructor.
     * @param \GuzzleHttp\Client $http
     */
    public function __construct(\GuzzleHttp\Client $http)
    {
        $this->http = $http;
    }

    /**
     * @param string $uri
     * @param array $options
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function post($uri, array $options = [])
    {
        $defaultHeaders = [
            'Accept' => 'application/json, text/javascript, */*; q=0.01',
            'Accept-Encoding' => 'gzip, deflate',
            'Accept-Language' => 'pt-BR,pt;q=0.8,en-US;q=0.6,en;q=0.4',
            'Connection' => 'keep-alive',
        ];

        $headers = (!isset($options['headers'])) ? [] : $options['headers'];
        $options['headers'] = array_merge($defaultHeaders, $headers);
        return $this->http->post($uri, $options);
    }
}