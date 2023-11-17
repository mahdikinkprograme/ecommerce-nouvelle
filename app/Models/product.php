<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    protected $table = 'product190';
    protected $fillable = ['name','price','description','image','date','is_item'];
    use HasFactory;


    public function multiimg(): BelongsTo
    {
        return $this->belongsTo(multiimg::class);
    }

}
