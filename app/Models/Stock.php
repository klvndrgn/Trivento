<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Stock extends Model
{
    protected $table = 't_stock';
    protected $fillable = ['user_id', 'stock_in_qty', 'stock_out_qty', 'stock_date', 'description', 'status', 'balance', 'updated_by'];
    /**
     * Get the user that owns the Stock
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(Users::class);
    }
    public function item()
    {
        return $this->hasMany(Items::class);
    }
}
