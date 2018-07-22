<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Organisation;
use App\Employee;

class Department extends Model
{
    protected $fillable = ['title', 'organisation_id'];

    public function organisation()
    {
        return $this->belongsTo(Organisation::class);
    }

    public function employees()
    {
        return $this->hasMany(Employee::class);
    }
}
