<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function scopeFilter($query, array $filter)
    {
        $query->when($filter['search'] ?? false,  function ($query, $search) {
            $query->where('client_candidate', 'like', '%' . $search . '%')
                ->orWhere('address', 'like', '%' . $search . '%')
                ->orWhere('pic', 'like', '%' . $search . '%')
                ->orWhere('telephone', 'like', '%' . $search . '%')
                ->orWhere('service', 'like', '%' . $search . '%')
                ->orWhere('price', 'like', '%' . $search . '%')
                ->orWhere('valid_date', 'like', '%' . $search . '%');
        });
    }
}
