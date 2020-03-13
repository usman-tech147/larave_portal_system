<?php

namespace App\Models\Hr\ManageProgram;

use App\User;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    protected $fillable = ['name'];

    public function departments()
    {
        return $this->hasMany(Department::class);
    }
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
