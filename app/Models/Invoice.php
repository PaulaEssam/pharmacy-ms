<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    public function getCustomerName()
    {
        return $this->belongsTo(Customers::class,'customer_id');
    }
}
