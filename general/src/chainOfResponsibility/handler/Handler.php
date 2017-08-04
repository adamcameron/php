<?php

namespace me\adamcameron\general\chainOfResponsibility\handler;

interface Handler {

    public function perform($request, $response);

}