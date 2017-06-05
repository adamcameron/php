<?php

namespace me\adamcameron\cor\handler;

interface Handler {

    public function perform($request, $response);

}