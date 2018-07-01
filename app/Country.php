<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\CountryTranslation;

use \Dimsav\Translatable\Translatable;

class Country extends Model
{
    use Translatable;

    public $translatedAttributes = ['name', 'text'];
// to chagne trasnaltion model
    // public $translationModel = 'App\CountryTranslation';
}
