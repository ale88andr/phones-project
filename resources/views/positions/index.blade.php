<!-- resources/views/positions/index.blade.php -->

@extends('layouts.backend')

@section('content')

    <div class="card bg-light">
        <div class="card-header">Добавление новой должности</div>
            <div class="card-body">
                <!-- Отображение ошибок проверки ввода -->
                @include('common.errors')

                <!-- Форма новой задачи -->
                <form action="{{ url('backend/position') }}" method="POST" class="form-inline">
                    {{ csrf_field() }}

                    <!-- Наименование отдела -->
                    <div class="form-group col-sm-9">
                        <label for="position" class="col-sm-4 control-label">Наименование должности</label>

                        <div class="col-sm-8">
                            <input type="text" name="title" id="position-title" class="form-control" placeholder="Наименование" style="width: 100%;">
                        </div>
                    </div>

                    <div class="form-group col-sm-3">
                        <div class="col-sm-3">
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-plus"></i> Добавить должность
                        </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <br>

    <div class="container">
        <!-- Должности -->
        @if (count($positions) > 0)
            <div class="col-8 mx-auto">
                <h2>Список должностей:</h2>

                <table class="table table-hover">
                    <thead>
                        <tr class="table-info">
                            <th>Наименование</th>
                            <th>Кол-во сотрудников</th>
                            <th>Действия</th>
                        </tr>
                    </thead>
                <tbody>
                    @foreach ($positions as $position)
                        <tr>
                            <!-- Наименование должности -->
                            <td class="table-text">
                                <div><b class="text-info">{{ $position->title }}</b></div>
                            </td>
                            <td class="table-text">
                                <span class="badge badge-primary badge-pill">{{ $position->employees_count }}</span>
                            </td>
                            <td>
                                <form action="{{ url('backend/position/'.$position->id) }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}

                                    <button type="submit" class="btn btn-danger">
                                        <i class="fa fa-trash"></i> Удалить
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection