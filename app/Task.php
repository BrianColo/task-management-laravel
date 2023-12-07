<?php
namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Task extends Model {

	protected $table = 'tasks';
	protected $fillable = ['tittle','description','status_id','date_end'];
	protected $dates = ['created_at','updated_at'];
    
}