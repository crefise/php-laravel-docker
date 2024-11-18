<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clients extends Model
{
    use HasFactory;
    /*
        $table->string('first_name');
        $table->string('second_name');
        $table->string('third_name');
        $table->enum('sex', ['male', 'female']);
     */
    protected $fillable = [
        'first_name',
        'second_name',
        'third_name',
        'sex',
        'has_discount',
    ];

    public function works()
    {
        return $this->hasMany(Works::class);
    }
}
