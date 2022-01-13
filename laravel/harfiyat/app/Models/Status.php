<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $table = 'Durum';
    
    protected $primaryKey = 'DurumId';

    protected $fillable = ['Durum'];
}
