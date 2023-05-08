<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actor extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'actors';

    protected $fillable = ['name'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function peliculas()
    {
        return $this->hasMany('App\Models\Pelicula', 'actor_id', 'id');
    }
    
}
