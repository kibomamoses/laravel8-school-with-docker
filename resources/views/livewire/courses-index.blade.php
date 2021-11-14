<div>

    <div class="bg-green-200 py-4">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex">
            <button class="bg-white shadow h-12 px-4 rounded-lg text-gray-700 mr-4 focus:outline-none"
                    wire:click="resetFilters">
                <i class="fas fa-chalkboard-teacher text-xs mr-2"></i>
                All Courses
            </button>
   
        <!-- Dropdown Categories-->
        <div class="relative mr-4" x-data="{ open: false }">
            <button class="px-4 text-gray-700 block h-12 rounded-lg overflow-hidden focus:outline-none bg-white shadow" x-on:click="open = true">
                <i class="fas fa-tags mr-2"></i>
                Category
                <i class="fas fa-angle-down ml-2"></i>
            </button>
            <!-- Dropdown Body -->
            <div class="absolute right-0 w-40 mt-2 py-2 bg-white border rounded shadow-xl" x-show="open" x-on:click.away="open = false">   
                @foreach ($categories as $category)
                    <a class="cursor-pointer transition-colors duration-200 block px-4 py-2 text-normal text-gray-900 rounded hover:bg-green-500 hover:text-white"
                        wire:click="$set('category_id', {{$category->id}})"
                        x-on:click="open = false">
                        {{ $category->name }}
                    </a>
                @endforeach
            </div>
            <!-- // Dropdown Body -->
        </div>
        <!-- // Dropdown Categories-->

         <!-- Dropdown Levels -->
         <div class="relative" x-data="{ open: false }">
            <button class="px-4 text-gray-700 block h-12 rounded-lg overflow-hidden focus:outline-none bg-white shadow" x-on:click="open = true">
                <i class="fas fa-tags mr-2"></i>
                Levels
                <i class="fas fa-angle-down ml-2"></i>
            </button>
            <!-- Dropdown Body -->
            <div class="absolute right-0 w-40 mt-2 py-2 bg-white border rounded shadow-xl" x-show="open" x-on:click.away="open = false">   
                @foreach ($levels as $level)
                    <a class="cursor-pointer transition-colors duration-200 block px-4 py-2 text-normal text-gray-900 rounded hover:bg-green-500 hover:text-white"
                        wire:click="$set('level_id', {{$level->id}})"
                        x-on:click="open = false">
                        {{ $level->name }}
                    </a>
                @endforeach
            </div>
            <!-- // Dropdown Body -->
        </div>
        <!-- // Dropdown Levels-->

    </div>

    <div class="mt-16 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4  gap-x-6 gap-y-8">
        @foreach ($courses as $course)
            <x-course-card :course="$course"/>
        @endforeach
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-4 mb-8">
        {{$courses->links()}}
    </div>

</div>
