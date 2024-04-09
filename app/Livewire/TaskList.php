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
            $this->tasks = Task::where('user_id', Auth::id())->get();
        } elseif (Auth::user()->role === 'superuser') {
            $this->tasks = Task::whereHas('user', function ($query) {
                $query->where('role', 'user')->where('assigned_by', Auth::id());
            })->get();
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
        // Se l'utente è un superuser, mostra tutti i task assegnati agli utenti
        $tasks = Task::whereNotNull('assigned_to')->get();
    } else {
        // Altrimenti, mostra i task dell'utente corrente e quelli assegnati da un superuser
        $tasks = Task::where(function ($query) {
                $query->where('user_id', Auth::id())
                      ->orWhere('assigned_to', Auth::id());
            })
            ->orWhereHas('assignedBy', function ($query) {
                $query->where('role', 'superuser');
            })
            ->get();
    }

    return view('livewire.task-list', ['tasks' => $tasks]);
}
}
