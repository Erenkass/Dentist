<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProcessDetail extends Model
{
    use HasFactory;
    protected $table = 'process_detail';// override yapmak için
    protected $fillable = ['patient_id', 'tooth_id', 'process_id'];


    /*public function product(){
        return $this->belongsTo(Patient::class,'product_id','id'); // birebir ilişki olduğu için belongsTo
    }*/

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function tooth()
    {
        return $this->belongsTo(Tooth::class);
    }

    public function process()
    {
        return $this->belongsTo(Process::class);
    }
}
