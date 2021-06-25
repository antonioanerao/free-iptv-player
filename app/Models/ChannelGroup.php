<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChannelGroup extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function channels() {
        return $this->hasMany(Channel::class, 'group-title', 'group-title');
    }
}
