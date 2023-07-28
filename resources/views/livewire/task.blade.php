<div class="">
  <li class="flex shadow m-2 items-center p-2 ">
    <input wire:click="update" wire:model="checked" type="checkbox" class="mr-2 form-checkbox h-5 w-5 text-blue-500 cursor-pointer " />
    <span class="{{$task->done ? 'line-through' :''}} mr-32">{{$task->body}}</span>

    <button wire:click="delete" class="ml-auto "><i class="fas fa-trash text-red-500"></i></button>

  </li>

  <!-- Add more tasks here -->
</div>
