<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductDetail extends Model
{
    use HasFactory;
    
    protected $table = 'pazar.product_detail';
    
    protected $primaryKey = 'pd_id';
    
    public $timestamps = false;
    
    protected $fillable = [
        'pd_id_product',
        'pd_longdesc_id',
        'pd_longdesc_en',
        'pd_history_id',
        'pd_history_en',
        'pd_link_shopee',
        'pd_link_tokopedia',
        'pd_link_blibli',
        'pd_link_lazada',
        'pd_created_by',
        'pd_updated_by'
    ];
    
    protected $casts = [
        'pd_created_at' => 'datetime',
        'pd_updated_at' => 'datetime'
    ];
    
    /**
     * Get the product that owns the detail.
     */
    public function product()
    {
        return $this->belongsTo(Product::class, 'pd_id_product', 'p_id');
    }
    
    /**
     * Set the created_at timestamp when creating a new record.
     */
    protected static function boot()
    {
        parent::boot();
        
        static::creating(function ($model) {
            $model->pd_created_at = now();
        });
        
        static::updating(function ($model) {
            $model->pd_updated_at = now();
        });
    }
}