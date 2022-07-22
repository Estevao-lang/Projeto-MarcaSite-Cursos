<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inscricao extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'email','cpf','address','telephone','cel', 'type_user','course','password'];
}
