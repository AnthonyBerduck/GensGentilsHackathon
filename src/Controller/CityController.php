<?php


namespace App\Controller;

use App\Model\WebcamManager;

class CityController extends AbstractController
{
    public function showCityName()
    {
        $webcamManager = new WebcamManager();
        $webcams = $webcamManager->selectAllCity();
        return $this->twig->render('City/index.html.twig', ['webcams' => $webcams]);
    }
}
