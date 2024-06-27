<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calculate extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function scopeFilter($query, array $filter)
    {
        $query->when($filter['search'] ?? false, function ($query, $search) {
            $query->where('client_candidate', 'like', '%' . $search . '%')
                ->orWhere('contract_value', 'like', '%' . $search . '%')
                ->orWhere('commission_price', 'like', '%' . $search . '%')
                ->orWhere('software_price', 'like', '%' . $search . '%')
                ->orWhere('employee1', 'like', '%' . $search . '%')
                ->orWhere('percent1', 'like', '%' . $search . '%')
                ->orWhere('employee2', 'like', '%' . $search . '%')
                ->orWhere('percent2', 'like', '%' . $search . '%')
                ->orWhere('net_value1', 'like', '%' . $search . '%')
                ->orWhere('net_value2', 'like', '%' . $search . '%');
        });
    }
}
