<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class certsController extends Controller
{
    public function open()
    {
        return view('main');
    }
    public function Search(Request $request)
    {
        $domain  = $request->input('domain');
        $certNumber = $request->input('certnumber');
        $certificateDetails = $this->fetchCertificateDetails($domain);
        $cert = $certificateDetails[$certNumber];
        return view("main", ["domain" => $domain, "cert" => $cert , 'certNumber' => $certNumber]);
    }
    private function fetchCertificateDetails($domain)
    {
        $client = new Client();
        $url = "https://crt.sh/?q=" . urlencode($domain) . "&output=json";

        try {
            $response = $client->get($url);
            $data = json_decode($response->getBody(), true);
            return $data;
        } catch (\Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }
}
