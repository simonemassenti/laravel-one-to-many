<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Portfolio extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable=['title', 'description', 'slug'];


    //Mutator che setta lo slug in base al titolo
    public function setTitleAttribute($_title){
        $this->attributes['title'] = $_title;
        $this->attributes['slug'] = Str::slug($_title);
    }
}
