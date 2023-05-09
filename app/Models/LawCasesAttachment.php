<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LawCasesAttachment extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function CasesDocument()
    {
        return $this->belongsTo(CasesDocument::class);
    }
}
