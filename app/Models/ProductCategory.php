<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    use HasFactory;
    
    protected $table = 'pazar.product_category';
    
    protected $primaryKey = 'pc_id';
    
    public $timestamps = false;
    
    protected $fillable = [
        'pc_title_id',
        'pc_title_en',
        'pc_description_id',
        'pc_description_en',
        'pc_image',
        'pc_link'
    ];
    
    /**
     * Get the products for the category.
     */
    public function products()
    {
        return $this->hasMany(Product::class, 'p_id_product_category', 'pc_id');
    }
}