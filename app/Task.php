<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $guarded = ['id'];
    public $timestamps = false;

    public function setCreatedAttribute($value)
    {
        $this->attributes['created'] = Carbon::createFromTimestamp($value);
    }

    public function setDueAttribute($value)
    {
        $this->attributes['due'] = Carbon::createFromTimestamp($value);
    }

    public function getDueAttribute()
    {
        return Carbon::createFromFormat('Y-m-d h:i:s', $this->attributes['due']);
    }
}
