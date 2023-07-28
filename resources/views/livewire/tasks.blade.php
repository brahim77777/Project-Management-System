<div>
    {{-- Success is as dangerous as failure. --}}
    <div class="flex items-center my-2">
    <span class="">Tasks : {{$count}}</span>

        <form id="TaskForm" action="tasks/create">
            <input type="number" hidden name="id" value="{{$project->id}}">
        </form>
        <button href="/tasks/create" class="ml-auto px-4 py-2 bg-blue-500 text-white rounded" form="TaskForm" >Add Task</button>

    </div>

    <ul class="bg-white p-10 w-full rounded-md">
    @forelse($project->tasks as $task)
        @livewire('task' , ['task'=>$task] , key(''.$task->id))
    @empty
        <ul class="w-full  p-20">
            <li>No Tasks.</li>
        </ul>
    @endforelse
    </ul>

</div>
