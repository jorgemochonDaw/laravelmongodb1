@extends('dashboard.master')
@section('content')
    <div class="card mt-4">
        <div class="card-header">
            Editar libro: {{ $libro->title }}
        </div>
        <div class="card-body">
            @include('dashboard.partials.errors-form')
            <form action="{{ route('libro.update',$libro->_id) }}" method="post">
                @method('PUT')
                @include('dashboard.libro._form')
                <input type="submit" value="Actualizar" class="mt-3 btn btn-success">
            </form>
        </div>
    </div>
@endsection
