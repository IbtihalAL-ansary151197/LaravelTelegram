<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Porducts extends Model
{
    use HasFactory;
    protected $fillable = [
        'ProductTitle',
        'Descripion',
        'photos',
      
    ];

}
