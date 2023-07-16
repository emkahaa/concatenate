<?php

namespace App\Http\Controllers;

use App\Http\Requests\CekOngkirRequest;
use Illuminate\Http\Request;

class CekOngkirController extends Controller
{
    function index() {

        $data['cities'] = json_decode(env("CITIES"));
            
        return view('cekOngkir.index', compact('data'));
    }

    function hasil(CekOngkirRequest $request) {
        $asal = $request->asal;
        $tujuan = $request->tujuan;
        $berat = $request->berat;

        foreach (json_decode(env("COURIERS")) as $value) {
            $response = rajaOngkir($asal, $tujuan, $berat, $value->data);
            $origin = $response['origin_details'];
            $destination = $response['destination_details'];

            $results[$response['results'][0]['code']] = $response['results'][0];
        };

        $data = array(
            'origin' => $origin,
            'destination' => $destination,
            'results' => $results,
            'cities' => json_decode(env("CITIES")),
            'request' => $request
        );

        return view('cekOngkir.hasil', compact('data'));
    }
}
