<div>
    <div>
        <label for="search-users">Ricerca Utente</label>
        <input type="text" id="search-users" class="form-control" wire:model.live="search">
    </div>
    
    <div class="mt-4">
        <h3>Utenti</h3>

        <div class="mt-3">
            <table class="table table-bordered ">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nome</th>
					    <th>E-mail</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
				<tr>
					<td> {{ $user->id }} </td>
					<td> {{ $user->name }} </td>
					<td> {{ $user->email }} </td>
				</tr>
				@endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
