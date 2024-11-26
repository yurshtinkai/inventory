<?php

// app/Models/Location.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $fillable = ['LocationName'];
    protected $primaryKey = 'LocationID'; 

    public function items()
    {
        return $this->hasMany(Item::class, 'LocationID'); // LocationID is the foreign key in the items table
    }
}
