<?php
/**
 * Created by PhpStorm.
 * User: aurelwcs
 * Date: 08/04/19
 * Time: 18:40
 */

namespace App\Controller;

use App\Model\WebcamManager;

class HomeController extends AbstractController
{

    /**
     * Display home page
     *
     * @return string
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function index()
    {
        $webcamManager = new WebcamManager();
        $cities = $webcamManager->selectAllCity();
        var_dump($cities);
        return $this->twig->render('Home/index.html.twig', ['cities' => $cities]);
    }
}
