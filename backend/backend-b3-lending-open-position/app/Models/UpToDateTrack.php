<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UpToDateTrack extends Model
{
    protected $table = 'UpToDateTrack';
    protected $primaryKey = 'id';
    protected $fillable = [
        'date',
    ];
    
    use HasFactory;
}
