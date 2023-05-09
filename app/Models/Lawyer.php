<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lawyer extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function appointments()
    {
        return $this->hasMany(LawyerAppointment::class);
    }
}
