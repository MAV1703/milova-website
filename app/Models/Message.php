<?php

namespace App\Models;

use App\Model\File;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    public function files()
    {
        return $this->morphMany(File::class, 'fileable');
    }
}
