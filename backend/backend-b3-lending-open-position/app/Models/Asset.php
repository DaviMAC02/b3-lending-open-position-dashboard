<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    protected $table = 'Asset';
    protected $primaryKey = 'id';
    protected $fillable = [
        'RptDt',
        'TckrSymb',
        'ISIN',
        'Asst',
        'BalQty',
        'TradAvrgPric',
        'PricFctr',
    ];

    use HasFactory;
}
