<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\SertificateDiscriptions;

class Sertificate extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'sertificate_discription_id', 
        'uuid'
    ];


    public function sertificate_discription()
    {
        return $this->hasOne(SertificateDiscriptions::class, 'id', 'sertificate_discription_id');
    }
}
