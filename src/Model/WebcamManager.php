<?php


namespace App\Model;

use Symfony\Component\HttpClient\HttpClient;

class WebcamManager
{
    public function selectAllCity()
    {
        $client = HttpClient::create();
        $url = 'https://api.windy.com/api/webcams/v2/list/webcam=';
        $listCam = '1484444428,1349984404,1280161113,1461792534,1570233383?show=webcams:image';
        $response = $client->request('GET', $url . $listCam . ',location,player&key=mBdIU57w2qavbCxCWYFlj96tenbqc3UW');
        $statusCode = $response->getStatusCode(); // get Response status code 200
        if ($statusCode === 200) {
            $content = $response->getContent();
            // get the response in JSON format

            $content = $response->toArray();
            $content = $content['result']['webcams'];
            $posXY=[[57,52],[90,36],[63,57],[66,47],[63,49]];
            $cpt=0;
            $cities = [];
            foreach ($content as $value) {
                $cities+=[
                    $value['location']['city'] => [
                        "wiki"=> $value["location"]["wikipedia"],
                        "embed" => $value["player"]["day"]["embed"],
                        "posXY" => $posXY[$cpt],
                        "id" => ($cpt+1)]];
                $cpt++;
            }
            return $cities;
        }
    }
}
