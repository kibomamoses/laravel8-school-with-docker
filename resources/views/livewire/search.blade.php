<form class="relative text-gray-600" autocomplete="off">
    <input wire:model="search" type="search" name="serch" placeholder="Search" class="bg-white h-10 px-5 pr-10 rounded-full text-sm focus:outline-none w-full">
    <button type="submit" class="uppercase px-8 py-2 rounded bg-green-600 text-blue-50 max-w-max shadow-sm hover:shadow-lg absolute right-0 top-0">Search</button>
    @if ($search)
        <ul class="absolute z-50 left-0 w-full bg-white mt-1 rounded-lg overflow-hidden">
            @forelse ($this->results as $result)
                <li class="leading-10 px-5 text-sm cursor-pointer hover:bg-gray-300"> 
                    <a href=" {{route('courses.show', $result)}} ">{{$result->title}}</a> 
                </li>
                @empty
                    <li class="leading-10 px-5 text-sm cursor-pointer hover:bg-gray-300"> 
                        There is no coincidence :(
                    </li>
            @endforelse
        </ul>
    @endif
</form>