<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'votes';

	public function entry() {
		return $this->hasOne('App\Entry', 'id', 'entry');
	}

}
