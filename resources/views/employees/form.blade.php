@extends('layouts.app')

@section('content')
<div class="container">
    @include('components.flash-messages')
    <h4>{{ $employee['id'] ? __('Editar empleado') : __('Agregar empleado') }}</h4>
    <hr />
    @if ($errors->count() > 0)
    <div class="alert alert-danger my-2">
        <div class="alert alert-danger">
            <ul class="mb-0 mt-2">
            @foreach($errors->all() as $message)
                <li>
                    - <span>{{ $message }}</span>
                </li>
            @endforeach
            </ul>
        </div>
    </div>
    @endif
    <div class="card mt-3">
        <div class="card-body">
            <form class="form">
                    @include('components.form-input', [ 'name' => 'code', 'title' => __('Código') ])
                    @include('components.form-input', [ 'name' => 'name', 'title' => __('Nombre') ])
                    @include('components.form-input', [ 'name' => 'name', 'title' => __('Nombre') ])
                    @include('components.form-input', [ 'name' => 'salary_usd', 'title' => __('Salario en Dólares') ])
                    @include('components.form-input', [ 'name' => 'salary_mxn', 'title' => __('Salario en Pesos') ])
                    @include('components.form-input', [ 'name' => 'address', 'title' => __('Dirección') ])
                    @include('components.form-input', [ 'name' => 'city', 'title' => __('Ciudad') ])
                </div>
            </form>
        </div>
    </div>
</div>
@endsection