<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    use HasFactory;
    protected $fillable = ['role','company','location','type','start_date','end_date','is_current','description','order_index'];
    protected $casts = ['start_date' => 'date','end_date' => 'date','is_current' => 'boolean'];
}
