<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class EmailTemplates extends Model
{
    public $timestamps = true;
    protected $table = 'email_templates';    
    public static function get_details($id = '') {
        return  self::where('id','=',$id)
                    ->where('status','Active')
                    ->first();
    }
}
