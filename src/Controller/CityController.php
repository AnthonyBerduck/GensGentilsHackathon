<?php


namespace App\Controller;

use App\Model\WebcamManager;

class CityController extends AbstractController
{
    public function index()
    {
        $webcamManager = new WebcamManager();
        $cities = $webcamManager->selectAllCity();
        return $this->twig->render('City/index.html.twig', ['cities' => $cities]);
    }
}
