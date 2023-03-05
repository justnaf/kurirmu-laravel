<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    protected $table = 'data';
    protected $primarykey = "id";
    protected $fillable = [ 'nopol','owner','alamat','desa','kecamatan','model'];

    public function entry()
    {
        return $this->hasOne(Entry::class);
    }
}
