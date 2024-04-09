<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Task;
use Livewire\Attributes\Validate;
use Livewire\Attributes\On;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;

class TaskForm extends Component
{
    Use WithFileUploads;

    public $taskId = null;

    #[Validate]
    public $taskName;
    
    #[Validate]
    public $taskPriority = 'bassa';

    public $photo;

    public $priorities = ['bassa', 'media', 'alta'];

    protected function rules()
    {
        return [
            'taskName' => 'required|max:100',
            'taskPriority' => 'required|in:bassa,media,alta'
        ];
    }

    protected function messages()
    {
        return [
            'taskName.required' => 'Il campo nome è obbligatorio',
        ];
    }

    public function store()
    { 
        $this->validate();

        if ($this->taskId) {
            $task = Task::find($this->taskId);

            $task->update([
                'name' => $this->taskName,
                'priority' => $this->taskPriority,
            ]);

            session()->flash('success', 'Task modificato correttamente.');
        } else {
            Task::create([
                'name' => $this->taskName,
                'priority' => $this->taskPriority,
                'user_id' => Auth::id(), // Utilizzo corretto di Auth::id() per ottenere l'ID dell'utente autenticato
            ]);

            if ($this->photo) {
                $this->photo->store('public/images');
            }           
            
            session()->flash('success', 'Task creato correttamente.');

            $this->resetForm();
        }
  
        $this->dispatch('task-created');
    }

    public function resetForm()
    {
        $this->taskId = null;
        $this->taskName = '';
        $this->taskPriority = 'bassa';
    }

    #[On('task-edit')]
    public function edit($taskId)
    {
        $task = Task::find($taskId);

        $this->taskId = $task->id;
        $this->taskName = $task->name;
        $this->taskPriority = $task->priority;
    }

    public function render()
    {
        return view('livewire.task-form');
    }
}
