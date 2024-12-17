<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bus extends Model
{
    /** @use HasFactory<\Database\Factories\BusFactory> */
    use HasFactory;

    protected $fillable = [
        'leaves_at',
        'arrives_at',
        'ticket_price',
    ];
    public function festivals()
    {
        return $this->belongsTo(festivals::class);
    }

//    public function festival()
//    {
//        return $this->belongsTo(festival::class);
//    }
}
