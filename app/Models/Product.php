<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'price', 'description'];

    // Define an accessor for formatted price
    public function getFormattedPriceAttribute(): string
    {
        return '$' . number_format($this->price, 2);
    }

    // Scope for filtering products by min stock
    public function scopeAvailable($query, int $minStock = 1)
    {
        return $query->where('description', '>=', $minStock);
    }
}
