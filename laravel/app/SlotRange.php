<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SlotRange extends Model
{
	public $timestamps = true;
    protected $table = 'slot_range';

    protected $fillable = [
		'user_id', 'user_type', 'slot_date','end_time','start_time','slot_time_in_minute','type','created_by','id'
	];

	//Define model Level laravel relationship
    public function provider()
    {
        return $this->hasOne('App\User','id','user_id');
    }
}
