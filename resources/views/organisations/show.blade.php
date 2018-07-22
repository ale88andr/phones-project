<!-- resources/views/organisations/show.blade.php -->

@extends('layouts.app')

@section('content')

<p class="text-muted">Всего: <span class="badge badge-light">{{ $employees_counter }}</span></p>
<div class="row">
    <!-- Список сотрудников -->
    <div class="col-12">
        <!-- Должности -->
        @if ($employees_counter > 0)
            <table class="table table-hover">
                <thead>
                    <tr class="table-primary">
                        <th scope="row">#</th>
                        <th>Должность</th>
                        <th>Сотрудник</th>
                        <th>Организация</th>
                        <th>Подразделение</th>
                        <th>IP телефон</th>
                        <th>Телефон</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($employees as $employee)
                        <tr>
                            <td scope="row">{{ $loop->iteration }}</td>
                            <td>
                                <div><span class="text-muted">{{ $employee->position->title }}</span></div>
                            </td>
                            <td>
                                <b class="text-primary">{{ $employee->fullname }}</b>
                            </td>
                            <td>
                                <div><span class="text-muted">{{ $employee->organisation->title }}</span></div>
                            </td>
                            <td>
                                <div><span class="text-muted">{{ $employee->department->title }}</span></div>
                            </td>
                            <td>
                                <div>(8692) <b class="text-primary">{{ $employee->ip }}</b></div>
                            </td>
                            <td>
                                <div class="text-muted">{{ $employee->city or 'Не указан' }}</div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>

@endsection
