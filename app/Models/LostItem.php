<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LostItem extends Model
{
    use HasFactory, SoftDeletes;

    protected $primaryKey = 'lostID'; // Only needed if your table name is not 'items'

    protected $fillable = [
        'item_name',
        'LocationID',
        'userID',
        'Quantity',
        'Status',
        'DateAdded',
        'Notes',
    ];

    public function location()
    {
        return $this->belongsTo(Location::class, 'LocationID'); // LocationID is the foreign key in the items table
    }
}
