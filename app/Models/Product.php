<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    
    protected $table = 'pazar.product';
    
    protected $primaryKey = 'p_id';
    
    public $timestamps = false;
    
    protected $fillable = [
        'p_title_id',
        'p_title_en',
        'p_id_product_category',
        'p_description_id',
        'p_description_en',
        'p_image',
        'p_link',
        'p_created_by',
        'p_updated_by',
        'p_is_active'
    ];
    
    protected $casts = [
        'p_is_active' => 'boolean',
        'p_created_at' => 'datetime',
        'p_updated_at' => 'datetime'
    ];
    
    /**
     * Get the category that owns the product.
     */
    public function category()
    {
        return $this->belongsTo(ProductCategory::class, 'p_id_product_category', 'pc_id');
    }
    
    /**
     * Get the product detail for the product.
     */
    public function detail()
    {
        return $this->hasOne(ProductDetail::class, 'pd_id_product', 'p_id');
    }
    
    /**
     * Set the created_at timestamp when creating a new record.
     */
    protected static function boot()
    {
        parent::boot();
        
        static::creating(function ($model) {
            $model->p_created_at = now();
        });
        
        static::updating(function ($model) {
            $model->p_updated_at = now();
        });
    }
}