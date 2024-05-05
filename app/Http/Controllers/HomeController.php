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

        $response = $client->request('GET', 'https://api.themoviedb.org/3/discover/movie?include_adult=false&include_video=false&language=en-US&page=1&sort_by=popularity.desc', [
            'headers' => [
                'Authorization' => 'Bearer eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiI4NDhhMjE5ZDFlMjVlYmI1YWVjZTU0MThmZTBiNTdhOSIsInN1YiI6IjY2MmExZjlkNTBmN2NhMDBiNGM4ODMxMyIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.9TTD9k6U2iwxq5UAwzqfZfi2Q4P5fG6Q0GXeVAema6s',
                'accept' => 'application/json',
            ],
            'verify' => base_path('cacert.pem'),
        ]);


        $filmes = $response->getBody();
        $movie_data = json_decode($filmes);


        if (isset($movie_data) && !empty($movie_data)) {
            return view('filmes.index', ['movie_data' => $movie_data]);
        } else {
            return "Erro ao obter informações do filme.";
        }

    }
}
