<?php

namespace App\Models\Teacher\Teaching;

use App\User;
use Illuminate\Database\Eloquent\Model;

class CourseDetail extends Model
{

    protected $fillable =
        [
            'user_id',
            'course_level',
            'program',
            'course_title',
            'course_code',
            'semester',
            'assessments',
            'makeup_classes',
            'student_feedback'
        ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
