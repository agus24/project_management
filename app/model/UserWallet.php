<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class UserWallet extends Model
{
    protected $table = 'user_wallet';
    protected $primaryKey = "id";
    protected $fillable = ['user_id', 'poin'];
}
