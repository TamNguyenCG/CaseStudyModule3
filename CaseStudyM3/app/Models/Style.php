<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Style extends Model
{
    use HasFactory;
    public $table = 'styles';

    public function products(): HasMany
    {
        return $this->hasMany(Product::class,'style_id');
    }
}
