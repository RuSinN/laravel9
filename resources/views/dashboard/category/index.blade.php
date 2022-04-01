@extends('dashboard.layout')
@section('content')

    <a class="btn btn-success my-3" href="{{route('category.create')}}">Crear Categoria</a>

    <table class="table mb-3">
        <tr>
            <th>Titulo</th>
            <th>Slug</th>
            <th>Acciones</th>
        </tr>
        <tbody>            
            @foreach ($categories as $c)
                <tr>
                    <td>{{ $c->title }}</td>
                    <td>{{ $c->slug }}</td>
                    <td>
                        <a class="btn btn-primary" href="{{route('category.edit',$c)}}">Editar</a> 
                        <a class="btn btn-success" href="{{route('category.show',$c)}}">Ver</a> 
                        <form class="inline-block" action="{{ route('category.destroy',$c) }}" method="post">
                            @method("DELETE")
                            @csrf
                            <button class="btn btn-danger" type="submit">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $categories->links() }}
@endsection