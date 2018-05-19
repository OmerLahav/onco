<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class CronJobsLogs extends Model
{
    public $timestamps = false;
    protected $table = 'cron_jobs_logs';   
}
