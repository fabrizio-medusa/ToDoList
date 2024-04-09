<?php

namespace App\Livewire;

use App\Models\Task;
use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;

class TaskForm extends Component
{
    use WithFileUploads;

    public $taskId = null;

    #[Validate]
    public $taskName;
    
    #[Validate]
    public $taskPriority = 'bassa';

    public $photo;

    public $priorities = ['bassa', 'media', 'alta'];

    public $assignedUser = null;

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
            $taskData = [
                'name' => $this->taskName,
                'priority' => $this->taskPriority,
                'user_id' => Auth::id(),
            ];

            // Se l'utente è un superuser e ha assegnato un utente user, popola le colonne assigned_to e assigned_by
            if (Auth::user()->role === 'superuser' && $this->assignedUser) {
                $taskData['assigned_to'] = $this->assignedUser;
                $taskData['assigned_by'] = Auth::id();
            }
            

            Task::create($taskData);

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
        $this->assignedUser = null;
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
        // Solo gli utenti superuser possono vedere tutti gli utenti registrati per assegnare il task
        $users = [];
        if (Auth::user()->role === 'superuser') {
            $users = User::all();
        }
        
        return view('livewire.task-form', ['users' => $users]);
    }
}
