@extends('layouts.app')

@section('content')
<div class="container">
    @include('components.flash-messages')
    <h4>@lang('Listado empleados')</h4>
    <hr />
    <div class="text-right">
        <a class="btn btn-primary" href="{{ route('employees.create') }}"><i class="fa fa-plus"></i></a>
    <div>
    <div class="card mt-3">
        <div class="card-body p-0">
            <table class="table m-0">
                <thead>
                    <tr>
                        <th class="text-right">@lang('Código')</th>
                        <th>@lang('Nombre')</th>
                        <th class="text-right">@lang('Salario (USD)')</th>
                        <th class="text-right">@lang('Salario (MXN)')</th>
                        <th>@lang('Correo electrónico')</th>
                        <th class="text-center">@lang('Activo')</th>
                        <th class="text-center">@lang('Acciones')</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pagination['results'] as $employee)
                        <tr>
                            <td class="text-right">{{ $employee['code'] }}</td>
                            <td>{{ $employee['name'] }}</td>
                            <td class="text-right">$ {{ number_format($employee['salary_usd'], 2) }}</td>
                            <td class="text-right">$ {{ number_format($employee['salary_mxn'], 2) }}</td>
                            <td>{{ $employee['email'] }}</td>
                            <td class="text-center">
                                @if($employee['enabled'])
                                    <i class="fa fa-check text-success"></i>
                                @else
                                    <i class="fa fa-close text-danger"></i>
                                @endif
                            </td>
                            <td class="text-center">
                                <a class="btn btn-secondary btn-sm m-1 btn-icon-sm" href="{{ route('employees.edit', [ 'employee' => $employee['id'] ]) }}"><i class="fa fa-edit"></i></a>
                                <form class="m-1"
                                    action="{{ route('employees.destroy', [ 'employee' => $employee['id'] ]) }}"
                                    onsubmit="return confirm('@lang('¿Estás seguro de eliminar este empleado?')');"
                                    method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm btn-icon-sm"><i class="fa fa-trash"></i></button>
                                </form>
                                @if($employee['enabled'])
                                    <form class="m-1"
                                        action="{{ route('employees.disable', [ 'employee' => $employee['id'] ]) }}"
                                        method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-warning btn-sm m-1 btn-icon-sm"><i class="fa fa-lock"></i></button>
                                    </form>
                                @else
                                    <form class="m-1"
                                        action="{{ route('employees.enable', [ 'employee' => $employee['id'] ]) }}"
                                        method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-info btn-sm m-1 btn-icon-sm"><i class="fa fa-unlock"></i></button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="mt-3">
        <div class="float-right">
        {!! $pagination['html_links'] !!}
        </div>
    </div>
</div>
@endsection