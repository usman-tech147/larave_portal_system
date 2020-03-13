<?php

namespace App\Models\Teacher\Teaching;

use Illuminate\Database\Eloquent\Model;
use App\User;

class CourseAssessment extends Model
{
    protected $fillable =
        [
            'user_id',
            'course_level',
            'program',
            'course_title',
            'course_code',
            'semester',
            'final_result_submission',
            'moodle_usage_status',
        ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
