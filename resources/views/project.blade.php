<x-app-layout>
    <div class="flex px-48">
        <div class="flex flex-col p-20">
            <div class="card w-[25rem] relative mb-5">

                <span class="font-bold {{$project->status == 'active' ? 'text-yellow-500': ($project->status == 'done' ? 'text-lime-600' :' text-rose-500') }} ">{{$project->status}}</span>
                <h2 class="text-purple-800 font-bold text-4xl	">{{$project->title}}</h2>
                <p class="mb-20">{{$project->description}}</p>
                <div class="absolute bottom-3">
                    <div class="bottom-0  flex gap-4">
                        <p>{{$project->created_at->diffForHumans()}}</p>
                        <p><i class="fa-solid fa-list-check mr-2 ml-5" style="color: #2a5cb2;"></i>{{$project->count()}}</p>
                        <form action="/projects/{{$project->id}}" method="post" class="ml-auto">
                            @csrf
                            @method('delete')

                            <button><i class="fas fa-trash text-red-500"></i></button>
                        </form>
                    </div>
                    <span class="text-sm text-gray-500">Elapsed Time</span>
                    <div class="bg-gray-100 rounded-full w-[22rem] mx-auto">
                        <div class="w-[{{getIndecator($project->dead_line)}}%] rounded-full bg-blue-500 text-lime-600 h-3 "></div>
                    </div>
                </div>



            </div>

            <div class="flex items-center">
                <form id="StatusForm" action="{{url('/projects/'.$project->id)}}" method="post">
                    @csrf
                    @method('patch')
                    <label for="status" class="mr-2">Status:</label>
                    <select id="status" name="status" class="mr-2">
                        <!-- Your select options go here -->
                        <option value="active" {{$project->status == "active" ? 'selected' : ''}}>active</option>
                        <option value="done" {{$project->status == "done" ? 'selected' : ''}}>done</option>
                        <option value="failed" {{$project->status == "failed" ? 'selected' : ''}}>failed</option>
                    </select>
                </form>
                <button class="ml-auto px-4 py-2 bg-blue-500 text-white rounded" form="StatusForm">Apply</button>

            </div>

        </div>
        <div class="p-20 ml-auto">
            @livewire('tasks' , ['project'=>$project])
        </div>

</div>
</x-app-layout>