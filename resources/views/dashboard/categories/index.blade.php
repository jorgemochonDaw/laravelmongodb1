@extends('dashboard.master')

@section('content')

<div class="card mt-4">
    <div class="card-header">
        Listado de Libros Mongo
    </div>
    <div class="card-body">

        <a class="text-white btn btn-success my-2" href="{{route('category.create')}}"><i class="fa fa-plus"></i> Crear</a>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
            </thead>
            <tbody>

                @foreach ($categories as $c)
                <tr>
                    <td>{{ $c->_id }}</td>
                    <td>{{ $c->title }}</td>
                    <td>{{ $c->created_at->format('d-m-Y') }}</td>
                    <td>{{ $c->updated_at->format('d-m-Y') }}</td>
                    <td>
                        <a class="btn btn-sm btn-success" href="{{ route('category.edit', $c->_id) }}"><i class="fa fa-edit text-white"></i></a>
                        <form action="{{ route('category.destroy',$c->_id) }}" method="post">
                            @method('DELETE')
                            @csrf
                            <input type="submit" value="Eliminar" class="mt-3 btn btn-danger">
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $categories->links() }}
    </div>
</div>



@endsection
