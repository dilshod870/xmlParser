<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catalog extends Model
{
    use HasFactory;
    protected $fillable = [
        "id",
        "mark",
        "model",
        "generation",
        "year",
        "run",
        "color",
        "body_type",
        "engine_type",
        "transmission",
        "gear_type",
        "generation_id",
    ];
}