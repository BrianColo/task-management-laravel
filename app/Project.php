<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model {

	protected $table = 'projects';
	protected $fillable = ['name','description','status_id'];
	protected $dates = ['created_at','updated_at'];
    
}