<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QRCode extends Model
{
    use HasFactory;

    protected $table = 'qr_codes'; // Specify the table name

    protected $fillable = [
        'name',
        'address',
        'designation',
        'website',
        'email',
        'phone',
        'sms',
        'image',
        'user_id',
    ];
}
