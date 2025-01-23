<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id', 'id');
    }
    public function trainee()
    {
        return $this->belongsTo(Trainee::class, 'trainee_id', 'id');
    }
    public function batch()
    {
        return $this->belongsTo(Batch::class, 'batch_id', 'id');
    }

    public function versity()
    {
        return $this->belongsTo(Versity::class);
    }
    public function department()
    {
        return $this->belongsTo(Department::class);
    }

}
