<?php

namespace App\Models\Hr\ManageProgram;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = ['school_id','name'];

    public function school()
    {
        return $this->belongsTo(School::class);
    }
}
