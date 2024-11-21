<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicinesStock extends Model
{
    use HasFactory;
    public function medicineName()
    {
        return $this->belongsTo(Medicines::class, 'medicine_id');
    }
}
