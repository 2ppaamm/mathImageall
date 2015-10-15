<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $hidden = ['user_id'];
    protected $fillable = ['date_of_report', 'maxile_achieved', 'report_text', 'status_id'];
    // Relationships
    public function user(){
        return $this->belongsTo('App\User');
    }
}
