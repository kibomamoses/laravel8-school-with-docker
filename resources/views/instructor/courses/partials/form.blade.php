<div class="mb-4">
    {!! Form::label('title', 'Title of the course') !!}
    {!! Form::text('title', null, ['class' => 'form-input block w-full mt-1' . ($errors->has('title') ? ' border-red-600' : '')]) !!}

    @error('title')
        <strong class="text-xs text-red-600"> {{$message}} </strong>
    @enderror
</div>

<div class="mb-4">
    {!! Form::label('slug', 'Slug of the course') !!}
    {!! Form::text('slug', null, ['readonly' => 'readonly', 'class' => 'form-input block w-full mt-1' . ($errors->has('slug') ? ' border-red-600' : '')]) !!}
    @error('slug')
    <strong class="text-xs text-red-600"> {{$message}} </strong>
    @enderror
</div>

<div class="mb-4">
    {!! Form::label('subtitle', 'Subtitle of the course') !!}
    {!! Form::text('subtitle', null, ['class' => 'form-input block w-full mt-1'  . ($errors->has('subtitle') ? ' border-red-600' : '')]) !!}
    @error('subtitle')
    <strong class="text-xs text-red-600"> {{$message}} </strong>
    @enderror
</div>

<div class="mb-4">
    {!! Form::label('description', 'Description of the course') !!}
    {!! Form::textarea('description', null, ['class' => 'form-input block w-full mt-1'  . ($errors->has('description') ? ' border-red-600' : '')]) !!}
    @error('description')
    <strong class="text-xs text-red-600"> {{$message}} </strong>
    @enderror
</div>

<div class="grid grid-cols-3 gap-4">
    <div>
        {!! Form::label('category_id', 'Category:') !!}
        {!! Form::select('category_id', $categories, null, ['class' => 'form-input block w-full mt-1']) !!}
    </div>
    <div>
        {!! Form::label('level_id', 'Level:') !!}
        {!! Form::select('level_id', $levels, null, ['class' => 'form-input block w-full mt-1']) !!}
    </div>
    <div>
        {!! Form::label('price_id', 'Price:') !!}
        {!! Form::select('price_id', $prices, null, ['class' => 'form-input block w-full mt-1']) !!}
    </div>
</div>

<h1 class="text-2xl font-bold mt-6 mb-2">Image of the course</h1>
<div class="grid grid-cols-2 gap-4">
    <figure>
        @isset($course->image)
            <img id="picture" class="w-full h-64 object-cover object-center" src=" {{Storage::url($course->image->url)}} " alt="">
        @else
            <img id="picture" class="w-full h-64 object-cover object-center" src=" https://cdn.pixabay.com/photo/2020/05/05/12/12/coffee-5132832__340.jpg " alt="">
        @endisset
    </figure>
    <div>
        <p class="mb-2">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Aliquam, porro explicabo blanditiis nihil sit officia rem error quae dolorem nostrum doloremque animi a eius quod est harum. Quod, dolores dolor!</p>
        {!! Form::file('file', ['class' => 'form-input w-full'. ($errors->has('file') ? ' border-red-600' : ''), 'id' => 'file', 'accept' => 'image/*']) !!}
        @error('file')
            <strong class="text-xs text-red-600"> {{$message}} </strong>
        @enderror
    </div>
</div>