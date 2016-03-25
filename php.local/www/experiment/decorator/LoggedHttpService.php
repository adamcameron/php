<?php
namespace me\adamcameron\experiment;

class LoggedHttpService implements IHttpService {

    private $httpService;
    private $logger;

    public function __construct($httpService, $logger){
        $this->httpService = $httpService;
        $this->logger = $logger;
    }

    public function doGet($url, $headers, $parameters){
        // do stuff to make an HTTP GET and return response
    }
    public function doPost($url, $headers, $parameters){
        // do stuff to make an HTTP POST and return response
    }

}
