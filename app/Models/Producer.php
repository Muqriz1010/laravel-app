<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producer extends Model
{
    protected $table = 'producers';

    public function movies()
    {
        return $this->hasMany(Movie::class);
    }
}
