<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'surname',
        'phonenumber',
        'email',
        'photograph',
        'birthday',
        'address',
        'bank',
        'payment_method',
        'nickname', // Add 'nickname' to the fillable array
    ];
}
