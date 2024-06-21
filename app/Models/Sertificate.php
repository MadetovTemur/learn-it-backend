<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\SertificateDiscriptions;
use Carbon\Carbon;

class Sertificate extends Model
{
    use HasFactory;



    protected $fillable = [
        'full_name',
        'discription', 
        'telephone',
        'uuid'
    ];



}
