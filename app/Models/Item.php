<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;

class Item extends Model
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;
    protected $primaryKey = 'ItemID'; // Only needed if your table name is not 'items'

    protected $fillable = [
        'CategoryID',
        'LocationID',
        'userID',
        'Quantity',
        'Status',
        'DateAdded',
        'Notes',
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'userID');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'CategoryID'); // CategoryID is the foreign key in the items table
    }

    public function location()
    {
        return $this->belongsTo(Location::class, 'LocationID'); // LocationID is the foreign key in the items table
    }


}
