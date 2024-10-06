<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use App\Models\Order;
use App\Models\User;
class Order extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'email', 'address', 'state', 'city', 'country', 'user_id', 'zipcode', 'products'];

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
