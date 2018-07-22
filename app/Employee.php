<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Organisation;
use App\Position;
use App\Department;

class Employee extends Model
{
    protected $fillable = ['fullname', 'organisation_id', 'position_id', 'department_id', 'ip', 'city'];

    public function organisation()
    {
        return $this->belongsTo(Organisation::class);
    }

    public function position()
    {
        return $this->belongsTo(Position::class);
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}
