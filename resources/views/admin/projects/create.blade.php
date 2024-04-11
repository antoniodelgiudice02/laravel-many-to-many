@extends('layouts.app')

@section('content')

<section>
    <div class="container">
        
        <h1>Nuovo Progetto</h1>

        <!-- ERROR MESSAGES -->

        {{-- @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                 @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
                </ul>
            </div>
        @endif --}}

        <!-- CREATE FORM -->

        <form action="{{ route('admin.projects.store')}}" method="POST" class='row'>
        @csrf

        <!-- TITLE INPUT -->

        <div class="mb-3 col-3">
            <label for="title" class="form-label">Title</label>
            <div class="input-group ">
                <input type="text" value=' {{old('title')}}' class="form-control @error('title') is-invalid @enderror" id="title" aria-describedby="basic-addon3 basic-addon4" name='title'>
                
                @error('title')
                <div class="invalid-feedback">{{$message}}</div>
                @enderror

            </div>
        </div>

        <!-- TYPE SELECT -->

        <div class="mb-3 col-3">
            
            <label for="type_id" class="form-label">Tipologia</label>
            <div class="input-group ">

                <select class="form-select  @error('type_id') is-invalid  @enderror" value=' {{old('type_id')}}' id='type_id' name='type_id' aria-label="Default select example">
                    
                    <option selected class='d-none'>Tipologia</option>

                    @foreach( $types as $type )
                        <option  value='{{ $type->id }}' @if( old('type_id') == $type->id ) selected @endif>{{ $type->label }}</option>
                    @endforeach

                </select>

                @error('type_id')
                <div class="invalid-feedback">{{$message}}</div>
                @enderror

            </div>
        </div>

        <!-- TECHNOLOGIES CHECKBOXES -->

        @foreach( $technologies as $technology)

            <div class="form-check">
                <input @if( old('technologies') == 'on' ) checked @endif class="form-check-input @error('technologies') is-invalid  @enderror" type="checkbox" value="{{ $technology->id }}" id="technology-{{ $technology->id }}" name='technologies[]'>
                <label class="form-check-label"  for="technology-{{ $technology->id }}">
                    {{$technology->label}}
                </label>
            </div>

        @endforeach

        @error('technologies')
            <div class="invalid-feedback">{{$message}}</div>
        @enderror

        <!-- CONTENT AREA -->

        <div class="mb-3 col-3">

            <label for="content" class="form-label">Content</label>
            <div class="input-group ">
                <textarea type="text" class="form-control @error('content') is-invalid  @enderror" id="content" aria-describedby="basic-addon3 basic-addon4" name='content'>{{old('content')}}</textarea>
            </div>

        </div>

        <!-- SAVE BUTTON -->

        <div class="col-3">
            <button class="btn btn-primary">save</button>
        </div>


        </form>
    </div>
  </section>

@endsection

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection