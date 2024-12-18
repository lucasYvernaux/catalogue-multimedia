<?php

namespace App\Http\Controllers;

use App\Models\Film;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Exception;

class FilmController extends Controller
{
    
    /**
     * Test call api movies.
     */
    public function callApi(): View
    {
        //$result[] = array();
        $client = new \GuzzleHttp\Client(['verify' => public_path('certificat/cacert.pem')]);
        
        $reponse = $client->get('https://api.themoviedb.org/3/movie/tt6334354?language=fr-FR', [
            'headers' => [
              'Authorization' => 'Bearer eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiI1MTFlZmYwMTA1M2ZmNjhiYWMzNzBiN2JlMGI0NjgxNSIsInN1YiI6IjY1MmQ0ZmI5ZWE4NGM3MDBjYTExZGEwYiIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.1gSXkgwZ_EibUo9QDOJYvppsKAu3lWz9mQ9SstVndro',
              'accept' => 'application/json',
            ],
          ]);
            
          $resultTmp = json_decode($reponse->getBody()->getContents());
          //array_unshift($result, $resultTmp);
          

        return view('film.api', ['result' => ($resultTmp)]);
    }

    /**
     * Display the list of movies.
     */
    public function show(Request $request): View
    {
        $films = Film::paginate(25);
        if($request->tri)
            $films = Film::query()->orderBy('titre')->paginate(25);
        return view('film.list', ['movies' => $films]);
    }

    /**
     * Search in the list of movies.
     */
    public function search(Request $request): View
    {
        $search = $request->input('search');
        if ($search) {
            $films = Film::query()->where('titre', 'LIKE', '%' . $search . '%')->orderBy('titre')->paginate(15);
        }
        return view('film.list', ['movies' => $films, 'search' => $search]);
    }



    /**
     * Add movies.
     */
    public function addMovie(Request $request): RedirectResponse
    {
        try {
            $film = new Film();

            $film->type = $request->type;
            $film->titre = $request->titre;
            $film->duree = $request->duree;
            $film->genres = $request->genres;
            $film->rangement = $request->rangement;
            $film->nbreCD = $request->nbreCD;
            $film->fonctionne = $request->fonctionne;
            $film->titre_alternatif = $request->titre_alternatif;
            $film->remarques = $request->remarques;

            $film->save();

            return Redirect::route('films');
        } catch (Exception $e) {
            return Redirect::route('dashboard' , ['message' => $e]);
        }
    }


    /**
     * Display one movie.
     */
    public function showMovie($id): View
    {
        $film = Film::findOrFail($id);

        $client = new \GuzzleHttp\Client(['verify' => public_path('certificat/cacert.pem')]);
        $movie='';

        /*$requestSession = $client->get('https://api.themoviedb.org/3/authentication/',[
            'headers' => [
                'Authorization' => 'Bearer eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiI1MTFlZmYwMTA1M2ZmNjhiYWMzNzBiN2JlMGI0NjgxNSIsIm5iZiI6MTY5NzQ2ODM0NS44NjYsInN1YiI6IjY1MmQ0ZmI5ZWE4NGM3MDBjYTExZGEwYiIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.NBiHpElKMQvLYT6vyQry0GW1yJ04jicqN2vWv1gyFbI',
                'accept' => 'application/json',
            ],
        ]);

        $sessionLucas = json_decode($requestSession->getBody()->getContents());
    
        dd($sessionLucas);*/
        
        $reponse = $client->get('https://api.themoviedb.org/3/search/movie?query='.trim($film->titre).'&language=fr-FR', [
            'headers' =>  [
                'Authorization' => 'Bearer eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiI1MTFlZmYwMTA1M2ZmNjhiYWMzNzBiN2JlMGI0NjgxNSIsIm5iZiI6MTY5NzQ2ODM0NS44NjYsInN1YiI6IjY1MmQ0ZmI5ZWE4NGM3MDBjYTExZGEwYiIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.NBiHpElKMQvLYT6vyQry0GW1yJ04jicqN2vWv1gyFbI',
                'accept' => 'application/json',
             
              ],
          ]);
            
          $result = json_decode($reponse->getBody()->getContents());

          if($result->total_results == 1){
            $reponseMovie = $client->get('https://api.themoviedb.org/3/movie/'.$result->results[0]->id.'?&language=fr-FR', [
                'headers' =>  [
                    'Authorization' => 'Bearer eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiI1MTFlZmYwMTA1M2ZmNjhiYWMzNzBiN2JlMGI0NjgxNSIsIm5iZiI6MTY5NzQ2ODM0NS44NjYsInN1YiI6IjY1MmQ0ZmI5ZWE4NGM3MDBjYTExZGEwYiIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.NBiHpElKMQvLYT6vyQry0GW1yJ04jicqN2vWv1gyFbI',
                    'accept' => 'application/json',
                 
                  ],
              ]);

              $movie = json_decode($reponseMovie->getBody()->getContents());

              $movie->original_language = locale_get_display_language($movie->original_language);

              for($i=0; $i < sizeof($movie->origin_country) ;$i++) {
                $code = strlen($movie->origin_country[$i]) == 2 ? "-".$movie->origin_country[$i] : $movie->origin_country[$i];
                $movie->origin_country[$i] = locale_get_display_region($code);
              }
          }

          //dd($result->results);
          
        return view('film.info', ['movie' => $film, "result" => $movie, 'result_size' => $result->total_results]);
    }

    /**
     * Display the list of movies.
     */
    public function showEditMovie($id): View
    {
        $film = Film::findOrFail($id);
        return view('film.edit', ['movie' => $film]);
    }

    /**
     * Edit movies.
     */
    public function editMovie(Request $request): RedirectResponse
    {
        try {
            $film = Film::findOrFail($request->id);

            $film->type = $request->type;
            $film->titre = $request->titre;
            $film->duree = $request->duree;
            $film->genres = $request->genres;
            $film->rangement = $request->rangement;
            $film->nbreCD = $request->nbreCD;
            $film->fonctionne = $request->fonctionne;
            $film->titre_alternatif = $request->titre_alternatif;
            $film->remarques = $request->remarques;

            $film->save();

            return Redirect::route('film.info', ['idFilm' => $film->id]);
        } catch (Exception $e) {
            Log::debug('test pedro log');
            return Redirect::route('dashboard' , ['message' => $e]);
        }
    }
}
