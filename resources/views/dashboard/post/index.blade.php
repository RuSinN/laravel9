@extends('dashboard.layout')
@section('content')

    <a class="btn btn-success my-3" href="{{route('post.create')}}">Crear Post</a>

    <table class="table mb-3">
        <thead>
            <tr>
                <th>Titulo</th>
                <th>Categoria</th>
                <th>Posted</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>            
            @foreach ($posts as $p)
                <tr>
                    <td>{{ $p->title }}</td>
                    <td>{{ $p->category->title}}</td>
                    <td>{{ $p->posted }}</td>
                    <td>
                        <a class="btn my-2 btn-primary" href="{{route('post.edit',$p)}}">Editar</a> 
                        <a class="btn my-2 btn-success" href="{{route('post.show',$p)}}">Ver</a> 
                        <form class="inline-block" action="{{ route('post.destroy',$p) }}" method="post">
                            @method("DELETE")
                            @csrf
                            <button class="btn my-2 btn-danger" type="submit">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $posts->links() }}
@endsection