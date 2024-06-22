<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\SertificateDiscriptions;
use Carbon\Carbon;

class Sertificate extends Model
{
    use HasFactory, SoftDeletes;


    protected $fillable = [
        'full_name',
        'discription', 
        'telephone',
        'uuid'
    ];



}
