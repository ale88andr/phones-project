<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Department;
use App\Employee;

class Organisation extends Model
{
    protected $fillable = ['title', 'short_title'];

    public function departments()
    {
        return $this->hasMany(Department::class);
    }

    public function employees()
    {
        return $this->hasMany(Employee::class);
    }
}
