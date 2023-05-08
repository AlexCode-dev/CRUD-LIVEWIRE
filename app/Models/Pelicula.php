<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelicula extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'peliculas';

    protected $fillable = ['titulo','duracion','sinopsis','imagen','actor_id'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function actor()
    {
        return $this->hasOne('App\Models\Actor', 'id', 'actor_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function favoritos()
    {
        return $this->hasMany('App\Models\Favorito', 'pelicula_id', 'id');
    }
    
}
