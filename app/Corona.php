<?php

namespace App;

use Sushi\Sushi;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Model;

class Corona extends Model
{
    use Sushi;

    public function getRows()
    {
        return Cache::remember('covid19', Carbon::parse('10 minutes'), function () {
            return Http::get('https://corona.richardkeep.dev/countries')->json();
        });
    }
}
