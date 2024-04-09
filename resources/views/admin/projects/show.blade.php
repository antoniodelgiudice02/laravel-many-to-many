@extends('layouts.app')

@section('content')

<div class="container p-3">

    <div>
        <h1>{{ $project->title }}</h1>
    </div>

    <a class='btn btn-success' href="{{ route('admin.projects.index')}}">Torna Ai Progetti</a>

    <table class='table mt-3'>
        <thead>
            <tr>
                <th>ID</th>
                <th>Tipologia</th>
                <th>Contenuto</th>
                <th>Tecnologie</th>
                <th>Slug</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            
                <tr>
                    <td>{{ $project->id }}</td>

                    <td>{{ $project->type->label }}</td>

                    <td>{{ $project->content }}</td>

                    <td>
                        <ul>

                            @foreach($project->technologies as $technology)
                                <li>{{ $technology->label }}</li>
                            @endforeach

                        </ul>
                        
                    </td>

                    <td>{{ $project->slug }}</td>

                    <td>
                        <a class='btn btn-success' href="{{ route('admin.projects.edit', $project)}}"><i class="fa-solid fa-pen-nib"></i></a>
                    </td>
                    <td>
                        
                        <a class='btn btn-danger' href="{{ route('admin.projects.destroy', $project)}}"><i class="fa-solid fa-trash-can"></i></a>

                    </td>
                </tr>

            
        </tbody>

        
    </table>
</div>

@endsection

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection