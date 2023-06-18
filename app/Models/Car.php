<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;
    protected $guarded = false;

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }

    public function scopeFilter($query)
    {
        if (request('price_from') || request('price_to')) {
            $query->where('priceForSession', '>=', request('price_from', 0))->where('priceForSession', '<=', request('price_to', 9999999999999));
        }

        if (request('branch_id')) {
            $query->where('branch_id', request('branch_id'));
        }

        return $query->get();
    }

}
