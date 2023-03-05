<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengguna extends Model
{
    protected $table = 'users';
    protected $primarykey = "id";
    protected $fillable = [
        'role',
        'name',
        'email',
        'password',
    ];
    public function entry()
    {
        return $this->hasMany(Entry::class);
    }
}
