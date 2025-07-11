<?php

namespace App\Models\Regulation;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Regulation extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'regulation_category_id', 'document_type', 'document_value', 'description'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'regulation_category_id');
    }
}
