<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Http\Request;

class Movie extends Model
{
    protected $table = 'movies';

     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'plot',
        'year_of_release',
        'image',
        'producer_id'
    ];

    public function actors(): BelongsToMany
    {
        return $this->belongsToMany(Actor::class)->withTimestamps();
    }

    public function producer(): BelongsTo
    {
        return $this->belongsTo(Producer::class);
    }

}
