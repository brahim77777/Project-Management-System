<?php

namespace App\Http\Livewire;

use App\Models\Task;
use Livewire\Component;

class Tasks extends Component
{
    public $tasks ;
    public $project;
    public $count;


    protected $listeners = ['deleted' => '$refresh'];
    public function mount(){
        $this->tasks = Task::where('project_id' , '=', $this->project->id)->get();
        $this->count = $this->tasks->count();
        
    }

    public function hydrateTasks(){
        $this->count = $this->tasks->count();
    }

    public function render()
    {
        return view('livewire.tasks');
    }
}
