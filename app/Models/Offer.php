<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function scopeFilter($query, array $filter)
    {
        $query->when($filter['search'] ?? false,  function ($query, $search) {
            $query->where('creator_name', 'like', '%' . $search . '%')
                ->orWhere('client_candidate', 'like', '%' . $search . '%')
                ->orWhere('address', 'like', '%' . $search . '%')
                ->orWhere('date', 'like', '%' . $search . '%')
                ->orWhere('valid_date', 'like', '%' . $search . '%')
                ->orWhere('pic', 'like', '%' . $search . '%')
                ->orWhere('telephone', 'like', '%' . $search . '%')
                ->orWhere('service', 'like', '%' . $search . '%')
                ->orWhere('period_time', 'like', '%' . $search . '%')
                ->orWhere('price', 'like', '%' . $search . '%')
                ->orWhere('information', 'like', '%' . $search . '%')
                ->orWhere('offer_status', 'like', '%' . $search . '%');
        });
    }
}
