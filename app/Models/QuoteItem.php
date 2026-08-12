<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuoteItem extends Model
{
    protected $fillable = [
        'quote_request_id',
        'product_id',
        'product_name',
        'part_number',
        'model_number',
        'manufacturer_name',
        'quantity',
        'unit_price',
        'total_price'
    ];

    public function quoteRequest()
    {
        return $this->belongsTo(QuoteRequest::class, 'quote_request_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
