<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Header extends Model
{
    use HasFactory;
    
    protected $table = 'pazar.headers';
    
    protected $primaryKey = 'h_id';
    
    public $timestamps = false;
    
    protected $fillable = [
        'h_page_name',
        'h_title_id',
        'h_title_en',
        'h_description_id',
        'h_description_en',
        'h_image',
        'h_link'
    ];
}