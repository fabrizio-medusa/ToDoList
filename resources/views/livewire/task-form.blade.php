
            <div class="card mb-2">
                <div class="card-header bg-warning">
                    @if($taskId)
                    <h3 class="text-center">Modifica Task</h3>
                    @else
                    <h3 class="text-center">Crea un nuovo Task</h3>
                    @endif
                </div>

                <div class="card-body">
                    <form wire:submit.prevent="store">
                        <div class="row g-3">
                            <div class="col-12">
                                <x-success />
                                <label for="name">Task</label>
                                <input type="text" id="name" class="form-control" wire:model.live="taskName" placeholder="Max 100 caratteri">
                                @error('taskName') <span class="text-danger small "> {{ $message }} </span> @enderror
                            </div>
                            <div class="col-12">
                                @if(Auth::user()->role === 'superuser')
                                    <!-- Visualizza la select box per selezionare l'utente -->
                                    <label for="assigned_user">Assegna a utente:</label>
                                    <select id="assigned_user" class="form-control" wire:model="assignedUser">
                                        <option>Scegli qui</option>
                                        @foreach($users as $user)
                                            @if($user->role === 'user')
                                                <option value="{{$user->id}}">{{$user->name}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                @endif
                            </div>                            
                            <div class="col-12">
                                <label for="priority">Priorità</label>
                                <select id="priority" class="form-control" wire:model="taskPriority">
                                    @foreach($priorities as $priority)
                                    <option value="{{$priority}}">{{ucfirst($priority)}}</option>
                                    @endforeach
                                </select>
                                @error('taskPriority') <span class="text-danger small "> {{ $message }} </span> @enderror
                            </div>
                            <div class="col-12">
                                @if($taskId)
                                    <button type="submit" class="btn btn-warning">Modifica</button>
                                @else
                                    <button type="submit" class="btn btn-warning">Crea</button>
                                @endif
                            </div>
                        </div>
                    </form>
                    @if($taskId)
                    <button class="btn btn-secondary mt-1" wire:click="resetForm">Crea Nuovo Task</button>
                    @endif
                </div> 
            </div>    
