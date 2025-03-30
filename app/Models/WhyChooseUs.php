<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WhyChooseUs extends Model
{
    use HasFactory;
    
    protected $table = 'pazar.why_choose_us';
    
    protected $primaryKey = 'w_id';
    
    public $timestamps = false;
    
    protected $fillable = [
        'w_title_id',
        'w_title_en',
        'w_description_id',
        'w_description_en',
        'w_icon'
    ];
}