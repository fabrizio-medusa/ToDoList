<?php

namespace App\Livewire;

use Livewire\Component;

class SearchUsers extends Component
{

    public $search;

    public function render()

    {
        return view('livewire.search-users', [
		'users' => \App\Models\User::search($this->search),
	]);
    }
}
