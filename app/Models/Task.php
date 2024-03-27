<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $fillable=[
        'customer_id',
        'description',
        'price',
        'assign',
        'status',
        'duedate',
        'priority'
    ];

    public function customer(){
        return $this->belongsTo(Customer::class);
    }

}
