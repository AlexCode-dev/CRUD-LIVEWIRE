<!-- Add Modal -->
<div wire:ignore.self class="modal fade" id="createDataModal" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="createDataModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createDataModalLabel">Create New Pelicula</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="titulo"></label>
                        <input wire:model="titulo" type="text" class="form-control" id="titulo" placeholder="Titulo">@error('titulo') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="duracion"></label>
                        <input wire:model="duracion" type="text" class="form-control" id="duracion" placeholder="Duracion">@error('duracion') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="sinopsis"></label>
                        <input wire:model="sinopsis" type="text" class="form-control" id="sinopsis" placeholder="Sinopsis">@error('sinopsis') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                     <!-- wire:model  sincronizamos con la propiedad imagen -->
                        <input type="file" wire:model="imagen" class="custom-file-input" id="customFile">
                            <img src="{{asset('storage'.'/'.$imagen)}}" style="width:200px">             
                    </div>
                    <div class="form-group">
                        <label for="actor_id"></label>
                        <input wire:model="actor_id" type="text" class="form-control" id="actor_id" placeholder="Actor Id">@error('actor_id') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close-btn" data-bs-dismiss="modal">Close</button>
                <button type="button" wire:click.prevent="store()" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>

<!-- Edit Modal -->
<div wire:ignore.self class="modal fade" id="updateDataModal" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateModalLabel">Update Pelicula</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <input type="hidden" wire:model="selected_id">
                    <div class="form-group">
                        <label for="titulo"></label>
                        <input wire:model="titulo" type="text" class="form-control" id="titulo" placeholder="Titulo">@error('titulo') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="duracion"></label>
                        <input wire:model="duracion" type="text" class="form-control" id="duracion" placeholder="Duracion">@error('duracion') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="sinopsis"></label>
                        <input wire:model="sinopsis" type="text" class="form-control" id="sinopsis" placeholder="Sinopsis">@error('sinopsis') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="imagen"></label>
                        <input wire:model="imagen" type="text" class="form-control" id="imagen" placeholder="Imagen">@error('imagen') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="actor_id"></label>
                        <input wire:model="actor_id" type="text" class="form-control" id="actor_id" placeholder="Actor Id">@error('actor_id') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" wire:click.prevent="cancel()" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" wire:click.prevent="update()" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>