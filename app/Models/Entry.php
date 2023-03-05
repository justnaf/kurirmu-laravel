<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entry extends Model
{
    protected $table = 'entry';
    protected $primarykey = "id";
    protected $fillable = [ 'user_id','data_id','no_telp','status','notes'];

    public function data()
    {
        return $this->belongsTo(Data::class);
    }
    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
