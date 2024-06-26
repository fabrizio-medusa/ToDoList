<div>
    <div class="card">
        <div class="card-header bg-warning">
            <h3 class="text-center">Elenco Task</h3>
        </div>
        <div class="card-body">
            @foreach($tasks as $task)
                @if(Auth::user()->role === 'superuser' || Auth::user()->id === $task->assigned_to || Auth::user()->id === $task->assigned_by)
                    <div class="border-bottom bg-light rounded-3 px-2 py-1 mb-2"> 
                        <div class="row align-items-center ">
                            <div class="col-md-10">
                                @if($task->completed)
                                    <h5 class="text-decoration-line-through">{{ $task->name }}</h5>
                                @else
                                    <h5>{{ $task->name }}</h5>
                                @endif    
                                <div>
                                    @if($task->priority == 'alta')
                                        <span class="text-danger fw-bold">{{ ucfirst($task->priority) }}</span>
                                    @elseif($task->priority == 'media')
                                        <span class="text-warning fw-bold">{{ ucfirst($task->priority) }}</span>
                                    @else
                                        <span class="text-success fw-bold">{{ ucfirst($task->priority) }}</span>
                                    @endif
                                </div>
                                <div>
                                    @if(Auth::user()->role === 'superuser' || $task->assigned_to || ($task->assigned_by && $task->assignedBy->role === 'superuser'))
                                        @if($task->assigned_to && Auth::user()->role === 'superuser')
                                            <span class="fst-italic fw-bold">Assegnato a: {{ ucfirst($task->assignedTo->name) }}</span>
                                        @endif
                                        @if($task->assigned_by && Auth::user()->role !== 'superuser')
                                            <span class="fst-italic fw-bold">Assegnato da: {{ ucfirst($task->assignedBy->name) }}</span>
                                        @endif
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-2 text-end">
                                <button class="btn btn-sm text-success" wire:click="isCompleted({{ $task->id }})">
                                    <i class="fa-solid fa-check" style="color: #4bc516;"></i>
                                </button>
                                <button class="btn btn-sm" wire:click="edit({{  $task->id }})">
                                    <i class="fa-solid fa-pen-to-square text-primary"></i>
                                </button>
                                <button class="btn btn-sm text-danger" wire:click="delete({{ $task->id }})">
                                    <i class="fa-regular fa-trash-can"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
                
    </div>    
</div>
