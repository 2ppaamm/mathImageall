<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $hidden = ['user_id'];
    protected $fillable = ['level', 'description', 'age', 'lowest_maxile_level','highest_maxile_level',
        'image', 'status'];
    // Relationships
    public function user(){
        return $this->belongsTo('App\User');
    }
}
