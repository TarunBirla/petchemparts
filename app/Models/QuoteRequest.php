<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuoteRequest extends Model
{
    protected $fillable = [
        'quote_no',
        'name',
        'email',
        'phone',
        'company_name',
        'message',
        'status',
        'user_id'
    ];

    public function items()
    {
        return $this->hasMany(QuoteItem::class, 'quote_request_id');
    }

    public static function countPending()
    {
        return self::where('status', 'pending')->count();
    }
}
