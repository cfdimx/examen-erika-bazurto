<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Test1Controller extends Controller
{
    //
    public function index()
    {

        $URL = 'https://jsonplaceholder.typicode.com/photos';
        # code...
        $curl = curl_init();
        curl_setopt_array(
            $curl, [
                CURLOPT_URL => $URL,
                CURLOPT_RETURNTRANSFER => TRUE
            ]
        );
        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);
        $dataArray = json_decode($response, true);

        $dataFilter = [];


        $dataFilter = collect($dataArray)->filter(function ($value, $key) {
            return $value['albumId'] == 1;
        })->all();

        // dd($dataFilter);

        return view('view_imgs', ['imgs' => $dataFilter]);

    }
}
