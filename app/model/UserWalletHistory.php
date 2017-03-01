<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserWalletHistory extends Model
{
    protected $table = 'user_wallet_histories';
    protected $primaryKey = 'id';
    protected $fillable = ['user_id','date','poin','type','description'];
}
