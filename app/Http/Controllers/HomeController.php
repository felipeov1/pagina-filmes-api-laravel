<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Pagination\LengthAwarePaginator;

class HomeController extends Controller
{
    public function listarFilmes()
    {
        $client = new Client();
        $response = $client->request('GET', 'https://moviesdatabase.p.rapidapi.com/titles', [
            'headers' => [
                'X-RapidAPI-Host' => 'moviesdatabase.p.rapidapi.com',
                'X-RapidAPI-Key' => '2fa8020d5amsh5f69e5b44681e4cp132f37jsn4db6f5c797fb',
            ],
            'verify' => base_path('cacert.pem'),
        ]);

        $data = json_decode($response->getBody(), true);
        $filmes = $data['results'];


        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $perPage = 4;
        $currentPageItems = array_slice($filmes, ($currentPage - 1) * $perPage, $perPage);
        $paginatedItems= new LengthAwarePaginator($currentPageItems, count($filmes), $perPage);
        $paginatedItems->setPath(request()->url());

        return view('filmes.index', ['filmes' => $paginatedItems]);
    }
}
