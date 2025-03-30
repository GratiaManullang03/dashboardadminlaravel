<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Popup extends Model
{
    use HasFactory;
    
    protected $table = 'pazar.popup';
    
    protected $primaryKey = 'pu_id';
    
    public $timestamps = false;
    
    protected $fillable = [
        'pu_image',
        'pu_link',
        'pu_is_active'
    ];
    
    protected $casts = [
        'pu_is_active' => 'boolean'
    ];
}