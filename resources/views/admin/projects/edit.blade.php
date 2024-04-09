@extends('layouts.app')

@section('content')

<section>
    <div class="container">
        
        <h1>Nuovo Progetto</h1>
        <form action="{{ route('admin.projects.update', $project)}}" method="POST" class='row'>
        @method('PATCH')
        @csrf
        <div class="mb-3 col-3">
            <label for="title" class="form-label">Title</label>
            <div class="input-group">
                <input type="text" class="form-control" id="title" aria-describedby="basic-addon3 basic-addon4" name='title' value='{{ $project->title}}'>
            </div>
        </div>
        <div class="mb-3 col-3">
            <label for="type_id" class="form-label">Tipologia</label>
            <div class="input-group">
                <select class="form-select" id='type_id' name='type_id' aria-label="Default select example">
                    
                    <option selected class='d-none'>Tipologia</option>
                    @foreach( $types as $type )
                        <option  value='{{ $type->id }}'>{{ $type->label }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="mb-3 col-3">
            <label for="content" class="form-label">Content</label>
            <div class="input-group">
                <textarea type="text" class="form-control" id="content" aria-describedby="basic-addon3 basic-addon4" name='content'>{{ $project->content }}</textarea>
            </div>
        </div>

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