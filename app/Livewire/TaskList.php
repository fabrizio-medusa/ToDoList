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
        $user = Auth::user();
        $this->tasks = Task::where('user_id', $user->id)->orderBy('id', 'DESC')->get();
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
        return view('livewire.task-list');
    }
}
