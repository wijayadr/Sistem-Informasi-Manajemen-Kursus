<?php

namespace App\Models\Regulation;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name'];
    protected $table = 'regulation_categories';

    public function regulations()
    {
        return $this->hasMany(Regulation::class, 'regulation_category_id');
    }
}
