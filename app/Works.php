<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Works extends Model
{
    use HasFactory;

    /**
     * $table->foreignId('haircut_id')->references('id')->on('haircuts');
     * $table->foreignId('client_id')->references('id')->on('clients');
     *
     * @var array
     */
    protected $fillable = [
        'haircut_id',
        'client_id',
    ];

    public function client()
    {
        return $this->belongsTo(Clients::class);
    }

    public function haircut()
    {
        return $this->belongsTo(Haircuts::class);
    }
}
