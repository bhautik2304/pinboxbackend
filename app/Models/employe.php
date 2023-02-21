<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class employe extends Model
{
    use HasFactory;

    protected $fillable = [
        "FIRSTNME",
        "MIDINIT",
        "LASTNAME",
        "WORKDEPT",
        "PHONENO",
        "HIREDATE",
        "JOB",
        "EDLEVEL",
        "SEX",
        "BIRTHDATE",
        "SALARY",
        "BONUS",
        "COMM",
    ];
}
