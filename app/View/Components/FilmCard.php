<?php

namespace App\View\Components;

use App\Models\FilmApi;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Mockery\Undefined;

class FilmCard extends Component
{
    protected string $tempsDepuisSortie = "";
    protected string $duree = "00h00min";
    protected string $originalLanguage = "";
    protected array $originalCountry = array();
    /**
     * Create a new component instance.
     */
    public function __construct(public object $filmApi, public int $index)
    {
        if(isset($filmApi->release_date))
            $this->tempsDepuisSortie = date_diff(date_create($filmApi->release_date), date_create(date('Y-m-d')))->format('%y ans');
        
        if(isset($filmApi->original_language))
            $this->originalLanguage = locale_get_display_language($filmApi->original_language, 'fr');

        if(isset($filmApi->runtime)){
            $minutes = $filmApi->runtime;
                $this->duree = floor($minutes/60) . "h" . ($minutes % 60) . "min" ;
        }

        if(isset($filmApi->origin_country)){
            for($i=0; $i < sizeof($filmApi->origin_country) ;$i++) {
            $code = strlen($filmApi->origin_country[$i]) == 2 ? "-".$filmApi->origin_country[$i] : $filmApi->origin_country[$i];
            array_push($this->originalCountry,  locale_get_display_region($code));
            //$this->originalCountry = $this->originalCountry + locale_get_display_region($code);
          }
        }
        
    }

    

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return view('components.film-card', ['temps' => $this->tempsDepuisSortie, "countries" => $this->originalCountry, "lang" => $this->originalLanguage, "duree" => $this->duree]);
    }
}
