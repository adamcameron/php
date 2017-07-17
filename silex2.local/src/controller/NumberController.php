<?php

namespace me\adamcameron\silex2\controller;

use me\adamcameron\silex2\repository\NumberRepository;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/** @codeCoverageIgnore */
class NumberController
{

    /** @var NumberRepository  */
    private $numberRepository;

    public function __construct(NumberRepository $numberRepository)
    {
        $this->numberRepository = $numberRepository;
    }

    public function doGetByIdAndLanguage(Request $request)
    {
        $id = $request->get('id');
        $lang = $request->get('lang');

        $number = $this->numberRepository->getNumberByIdAndLanguage($id, $lang);

        return new JsonResponse($number, Response::HTTP_OK);
    }
}
