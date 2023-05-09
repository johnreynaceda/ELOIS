<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LawyerAppointment extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function lawyer()
    {
        return $this->belongsTo(Lawyer::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
