@extends('dashboard.master')

@section('content')

<div class="card mt-4">
    <div class="card-header">
        Crear libro
    </div>
    <div class="card-body">
        @include('dashboard.partials.errors-form')
        <form action="{{ route('libro.store') }}" method="post">
            @include('dashboard.libro._form')
            <input type="submit" value="Enviar" class="mt-3 btn btn-success">
        </form>
    </div>
</div>

@endsection
