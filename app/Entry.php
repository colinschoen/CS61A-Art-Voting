<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Entry extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'entries';

    public function votes() {
        return $this->hasMany('App\Vote', 'entry', 'id');
    }
}
