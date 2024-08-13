<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bonus extends Model
{
    use HasFactory;

    // Assuming net_value_1 and net_value_2 are columns in your database
    protected $appends = ['bonus_value'];

    public function getBonusValueAttribute()
    {
        return $this->net_value_1 + $this->net_value_2;
    }
}
