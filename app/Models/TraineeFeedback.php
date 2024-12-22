<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TraineeFeedback extends Model
{
    use HasFactory;

    public function trainee()
    {
        return $this->belongsTo(Trainee::class);
    }
}
