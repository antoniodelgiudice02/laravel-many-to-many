@extends('layouts.app')

@section('content')

<div class="container">

    <div>
        <h1>Progetti</h1>
    </div>

    <a class='btn btn-success' href="{{ route('admin.projects.create')}}">Aggiungi Progetto</a>

    <table class='table'>
        <thead>
            <tr>
                <th>ID</th>
                <th>Titolo</th>
                <th>Tipologia</th>
                <th>Contenuto</th>
                <th>Slug</th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            
            @forelse($projects as $project)
                <tr>
                    <td>{{ $project->id }}</td>
                    <td>{{ $project->title }}</td>
                    <td>{!! $project->type?->getLabel() !!}</td>
                    <td>{{ $project->getContent(50) }}</td>
                    <td>{{ $project->slug }}</td>

                    <!-- VISUALIZZA -->
                    <td>
                        <a class='btn btn-success' href="{{ route('admin.projects.show', $project)}}"><i class="fa-solid fa-eye"></i></a>
                    </td>

                    <!-- MODIFICA -->
                    <td>
                        <a class='btn btn-success' href="{{ route('admin.projects.edit', $project)}}"><i class="fa-solid fa-pen-nib"></i></a>
                    </td>

                    <!-- ELIMINA -->
                    <td>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete-{{$project->id}}">
                        <i class="fa-solid fa-trash-can"></i>
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="delete-{{$project->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Eliminare {{ $project->title }}?</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Se elimini questo progetto non potrai più recuperarlo.
                                    </div>
                                    <div class="modal-footer">
                                        
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>

                                        <form action="{{ route('admin.projects.destroy', $project)}}" method='POST'>
                                        @csrf
                                        @method('DELETE')
                                        <button class='btn btn-danger'>Elimina</button>
                                        </form>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>

                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan='100%'>
                        no projects
                    </td>
                </tr>
            @endforelse

            
        </tbody>

        
    </table>
    {{$projects->links()}}
</div>

@endsection

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection