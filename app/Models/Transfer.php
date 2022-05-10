<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transfer extends Model
{
    use HasFactory;

    protected $fillable = [
        'username',
        'item_id',
        'taken_date',
        'return_date',
        'taken_issue',
        'return_issue'
    ];

    protected $table = 'transfer';


    public function items(){
        return $this->belongsTo(Items::class, 'item_id');
    }

    public function users(){
        return $this->belongsTo(Users::class, 'username');
    }
}
