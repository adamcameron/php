<?php
namespace me\adamcameron\experiment;

interface IHttpService {

    public function doGet($url, $headers, $parameters);
    public function doPost($url, $headers, $parameters);

}