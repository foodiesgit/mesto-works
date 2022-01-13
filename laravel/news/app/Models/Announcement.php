<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    use HasFactory;
    protected $table="announcement";
    protected $fillable=['announcement-title','announcement-content','announcement-user','announcement-source'];
}
