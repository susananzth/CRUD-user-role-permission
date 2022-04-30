<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'code',
        'symbol',
    ];

    /**
     * The countries that belong to the currency.
     */
    public function countries()
    {
        return $this->belongsToMany(Country::class);
    }
}
