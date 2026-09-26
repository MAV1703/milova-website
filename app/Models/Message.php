<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Model\File;

class Message extends Model
{

    public function files()
	{
		return $this->morphMany(File::class, 'fileable');
	}
}
