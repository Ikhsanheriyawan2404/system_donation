<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $fillable = ['name', 'description', 'nominal', 'donation_id', 'date'];

    public function donation()
    {
        return $this->belongsTo(Report::class);
    }
}
