<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function category() {
        return $this->belongsTo(Category::class);
    }
    
    public function supplier() {
        return $this->belongsTo(Supplier::class);
    }

    public function unit() {
        return $this->belongsTo(Unit::class);
    }
}
