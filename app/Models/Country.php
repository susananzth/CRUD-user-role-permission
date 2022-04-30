<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'iso_2',
        'iso_3',
        'iso_number',
        'phone_code',
    ];

    /**
     * The currencies that belong to the country.
     */
    public function currencies()
    {
        return $this->belongsToMany(Currency::class);
    }

    /**
     * Get the states for the country.
     */
    public function states()
    {
        return $this->hasMany(State::class);
    }

    /**
     * Get the users for the country.
     */
    public function users()
    {
        return $this->hasMany(User::class, 'phone_code_id');
    }
}
