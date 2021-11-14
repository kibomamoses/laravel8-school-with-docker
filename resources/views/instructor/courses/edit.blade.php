<x-instructor-layout>

    <x-slot name="course">
        {{$course->slug}}
    </x-slot>

    <h1 class="text-2xl font-bold">INFORMATION OF THE COURSE</h1>
    <hr class="mt-2 mb-6">

    {!! Form::model($course, ['route' => ['instructor.courses.update', $course], 'method' => 'put', 'files' => true]) !!}

       @include('instructor.courses.partials.form')

        <div class="flex justify-end">
            {!! Form::submit('Update information', ['class' => 'btn btn-green']) !!}
        </div>

    {!! Form::close() !!}


    <!--slot with name, pass a variable like slot to render
    for the app.blade.php -->
    <x-slot name="js">
        <script src="https://cdn.ckeditor.com/ckeditor5/24.0.0/classic/ckeditor.js"></script>
        <script src=" {{asset('js/instructor/courses/form.js')}} "></script>
    </x-slot>

</x-instructor-layout>