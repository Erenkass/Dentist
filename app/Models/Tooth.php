<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tooth extends Model
{
    use HasFactory;
    protected $table = 'tooth';// override yapmak için
    protected $fillable = [''];

    public function details(){
        return $this->hasMany(ProcessDetail::class);
    }
}
