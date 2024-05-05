<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Pagination\LengthAwarePaginator;

// class FilmesController extends Controller
// {
//     public function todosFilmes()
//     {
//         $client = new Client();
//         $response = $client->request('GET', 'https://api.themoviedb.org/3/movie/11?api_key=848a219d1e25ebb5aece5418fe0b57a9', [
//             'verify' => base_path('cacert.pem'),
//         ]);

//         $data = json_decode($response->getBody(), true);
//         $filmes = $data['results'];

//
//     }
// }



class FilmesController extends Controller
{
    public function todosFilmes()
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

        var_dump($movie_data);

        if (isset($movie_data) && !empty($movie_data)) {
            return view('filmes.catalago', ['movie_data' => $movie_data]);
        } else {
            return "Erro ao obter informações do filme.";
        }

    }
}
