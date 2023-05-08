<?php

namespace App\Http\Livewire;
use Livewire\WithFileUploads;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Pelicula;

class Peliculas extends Component
{
    use WithPagination;
    use WithFileUploads;
	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $titulo, $duracion, $sinopsis, $imagen, $actor_id;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.peliculas.view', [
            'peliculas' => Pelicula::first() //lastest empieza de la ultima  first desde la primera
						->orWhere('titulo', 'LIKE', $keyWord)
						->orWhere('duracion', 'LIKE', $keyWord)
						->orWhere('sinopsis', 'LIKE', $keyWord)
						->orWhere('imagen', 'LIKE', $keyWord)
						->orWhere('actor_id', 'LIKE', $keyWord)
						->paginate(10),
        ]);
    }
	
    public function cancel()
    {
        $this->resetInput();
    }
	
    private function resetInput()
    {		
		$this->titulo = null;
		$this->duracion = null;
		$this->sinopsis = null;
		$this->imagen = null;
		$this->actor_id = null;
    }

    public function store()
    {
        
        $this->validate([
		'titulo' => 'required',
		'duracion' => 'required',
		'sinopsis' => 'required',
		'imagen' => 'image|max:1024',
		'actor_id' => 'required',
        ]);

        Pelicula::create([ 
			'titulo' => $this-> titulo,
			'duracion' => $this-> duracion,
			'sinopsis' => $this-> sinopsis,
            'imagen' => $this-> imagen->store('public/uploads'),
			'actor_id' => $this-> actor_id
            
        ]);
      
        
        $this->resetInput();
		$this->dispatchBrowserEvent('closeModal');
		session()->flash('message', 'Pelicula Successfully created.');
    }

    public function edit($id)
    {
        $record = Pelicula::findOrFail($id);
        $this->selected_id = $id; 
		$this->titulo = $record-> titulo;
		$this->duracion = $record-> duracion;
		$this->sinopsis = $record-> sinopsis;
		$this->imagen = $record-> imagen;
		$this->actor_id = $record-> actor_id;
    }

    public function update()
    {
        $this->validate([
		'titulo' => 'required',
		'duracion' => 'required',
		'sinopsis' => 'required',
		'imagen' => 'required',
		'actor_id' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Pelicula::find($this->selected_id);
            $record->update([ 
			'titulo' => $this-> titulo,
			'duracion' => $this-> duracion,
			'sinopsis' => $this-> sinopsis,
			'imagen' => $this-> imagen->store('public/uploads'),
			'actor_id' => $this-> actor_id
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
			session()->flash('message', 'Pelicula Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            Pelicula::where('id', $id)->delete();
        }
    }
}