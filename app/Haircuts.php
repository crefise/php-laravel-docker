<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Haircuts extends Model
{
    use HasFactory;

    /*
        $table->string('name');
        $table->float('cost');
        $table->enum('sex', ['male', 'female']);
     */
    protected $fillable = [
        'name',
        'cost',
        'sex',
    ];
}
