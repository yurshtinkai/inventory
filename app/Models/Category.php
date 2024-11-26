<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['CategoryName'];
    protected $primaryKey = 'CategoryID';


    public function items()
    {
        return $this->hasMany(Item::class, 'CategoryID'); // CategoryID is the foreign key in the items table
    }
}   