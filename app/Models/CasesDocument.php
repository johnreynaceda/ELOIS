<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CasesDocument extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function LawCasesAttachments()
    {
        return $this->hasMany(LawCasesAttachment::class);
    }
}
