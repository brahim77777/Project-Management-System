<x-app-layout>
    <div class="navigation"></div>


    <div class="flex flex-col justify-center">
        <div class=" p-20">
            <div class="flex">
                <a class="mr-auto" href="/projects">\projects</a>
                <a class="text-white bg-blue-500 px-10 py-2" href="/projects/create">add new</a>
            </div>
        </div>

        <div class="justify-center flex cards flex-wrap gap-5 pb-20">

            @foreach($projects as $project)

            <div class="card w-[25rem] relative">
            <a href="/projects/{{$project->id}}">

                    <span class="font-bold {{$project->status == 'active' ? 'text-yellow-500': ($project->status == 'done' ? 'text-lime-600' :' text-rose-500') }} ">{{$project->status}}</span>
                    <h2 class="text-purple-800 font-bold text-4xl	">{{$project->title}}</h2>
                    <p class="mb-20">{{$project->description}}</p>
            </a>
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
            @endforeach
        </div>
    </div>
</x-app-layout>