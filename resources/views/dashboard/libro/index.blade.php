@extends('dashboard.master')

@section('content')

<div class="card mt-4">
    <div class="card-header">
        Listado de Libros Mongo
    </div>
    <div class="card-body">

        <a class="text-white btn btn-success my-2" href="{{route('libro.create')}}"><i class="fa fa-plus"></i> Crear</a>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Creación</th>
                    <th>Actualido</th>
                    <th>Años</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($libros as $b)
                <tr>
                    <td>{{ $b->_id }}</td>
                    <td>{{ $b->title }}</td>
                    <td>{{ $b->created_at->format('d-m-Y') }}</td>
                    <td>{{ $b->updated_at->format('d-m-Y') }}</td>
                    <td>{{ $b->age }}</td>
                    <td>
                        <a class="btn btn-sm btn-success" href="{{ route('libro.edit', $b->_id) }}"><i class="fa fa-edit text-white"></i></a>
                        <form action="{{ route('libro.destroy',$b->_id) }}" method="post">
                            @method('DELETE')
                            @csrf
                            <input type="submit" value="Eliminar" class="mt-3 btn btn-danger">
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $libros->links() }}
    </div>
</div>



@endsection
