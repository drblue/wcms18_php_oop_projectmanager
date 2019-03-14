<?php

namespace App;

use App\Project;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'title', 'project_id', 'completed',
	];

	public function project() {
		return $this->belongsTo(Project::class);
	}
}
