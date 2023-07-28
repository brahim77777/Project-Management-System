<?php

namespace App\Http\Livewire;

use App\Http\Controllers\TaskController;
use Livewire\Component;

class Task extends Component
{
    public $task;
    public $checked ;

    public function mount(){
        $this->checked= $this->task->done;
    }
    public function update(){
        $this->task->done = $this->checked;
        $this->task->save();
        

    }
    public function delete(){
        $this->task->delete();
        $this->emit('deleted');
    }
    public function render()
    {
        return view('livewire.task');
    }
}
