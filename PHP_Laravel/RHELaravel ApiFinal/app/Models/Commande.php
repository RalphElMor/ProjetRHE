<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    use HasFactory;

    protected $fillable = ['author','piece_id'];
    public function piece()
    {
        return $this->belongsTo(Piece::class);
    }

}
