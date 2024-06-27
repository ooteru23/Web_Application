<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function scopeFilter($query, array $filter)
    {
        $query->when($filter['search'] ?? false,  function ($query, $search) {
            $query->where('name', 'like', '%' . $search . '%')
                ->orWhere('job_title', 'like', '%' . $search . '%')
                ->orWhere('status', 'like', '%' . $search . '%')
                ->orWhere('salary', 'like', '%' . $search . '%');
        });
    }
}
