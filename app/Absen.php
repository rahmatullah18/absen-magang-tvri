<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Absen extends Model
{
    //
    protected $table = 'absen';
    protected $fillable = ['user_id', 'date', 'time_in', 'time_out', 'note'];

    public function user()
    {
        return $this->belongsTo("App\user");
    }
}
