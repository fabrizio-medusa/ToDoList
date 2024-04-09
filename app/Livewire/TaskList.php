<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Task;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Auth;

class TaskList extends Component
{
    public $tasks = [];

    public function mount()
    {
        $this->loadTasks();
    }

    #[On('task-created')]
    public function loadTasks()
    {
        if (Auth::user()->role === 'user') {
            // Carica i task dell'utente corrente, quelli assegnati ad esso dai superuser
            // e quelli autoassegnati dall'utente corrente
            $this->tasks = Task::where('user_id', Auth::id())
            ->orWhere('assigned_to', Auth::id()) // Task autoassegnati
            ->orWhereHas('assignedBy', function ($query) {
                $query->where('role', 'superuser');
            })
            ->orderByDesc('created_at')
            ->get();
        } elseif (Auth::user()->role === 'superuser') {
            // Carica i task assegnati dal superuser corrente agli utenti
            $this->tasks = Task::where('assigned_by', Auth::id())
                               ->whereNotNull('assigned_to')
                               ->orderByDesc('created_at')
                               ->get();
        }
    }
    
    public function isCompleted($taskId)
    {
        $task = Task::find($taskId);

        if ($task) {
            $task->completed = true;
            $task->save();
        }

        $this->loadTasks();
    }

    public function edit($taskId)
    {
        $this->dispatch('task-edit', $taskId);
    }

    public function delete($taskId)
    {
        $task = Task::find($taskId);

        $task->delete();

        $this->loadTasks();
    }

    public function render()
{
    $tasks = [];

    if (Auth::user()->role === 'superuser') {
        // Query per gli utenti superuser
        $tasks = Task::where('assigned_by', Auth::id())
                     ->whereNotNull('assigned_to')
                     ->get();
    } else {
        // Query per gli utenti user
        $tasks = Task::where('user_id', Auth::id())
                     ->orWhere('assigned_to', Auth::id())
                     ->orWhereHas('assignedBy', function ($query) {
                         $query->where('role', 'superuser');
                     })
                     ->get();
    }

    return view('livewire.task-list', ['tasks' => $tasks]);
}

}
