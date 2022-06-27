<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sell extends Model
{
    use HasFactory;

    protected $fillable = [
        'sell_amount',
        'client',
        'cpf_client',
        'user_id',
        'product_id'
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function product()
    {
        return $this->hasOne(Products::class, 'id', 'product_id');
    }

    public function getAll($return = 'get', $paginate = '*')
    {
        if(strpos($paginate, ','))
        {
            list($param1, $param2) = explode(',', $paginate);
            str_replace(' ', '', $param1);
            str_replace(' ', '', $param2);

            return $this->latest()
                    ->$return($param1, $param2);
        }

        return $this->latest()
                    ->$return($paginate);
    }
}
