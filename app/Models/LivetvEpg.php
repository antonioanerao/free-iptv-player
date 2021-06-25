<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LivetvEpg extends Model
{
    use HasFactory;
    protected $table = 'livetv_epg';
    protected $guarded = [];
}
