<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class patientModel extends Model
{
    protected $table = 'patients';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'sex', 'religion', 'phone', 'address', 'nik'];

    use HasFactory;
}
