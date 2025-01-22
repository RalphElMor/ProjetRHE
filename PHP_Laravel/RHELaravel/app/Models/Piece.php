<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Piece extends Model
{
    use HasFactory;
    protected $fillable = ['partName', 'supplier','photo','user_id','price','carModel'];


    public function commandes()
    {
        return $this ->hasMany(Commande::class,'piece_id');
    }  
    
    public function user()
    {
        return $this ->belongTo(User::class);
    }  



}

