<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LostItem extends Model
{
    use HasFactory, SoftDeletes;
 
    protected $primaryKey = 'id';
 
    protected $fillable = [
        'item_name',
        'Quantity',
        'LocationID',
        'userID',
        'date_reported',
        'remarks',
    ];
 
    public function location()
    {
        return $this->belongsTo(Location::class, 'LocationID'); // LocationID is the foreign key in the items table
    }
}
