<!-- resources/views/positions/index.blade.php -->

@extends('layouts.backend')

@section('content')

    <div class="card bg-light">
        <div class="card-header">Редактирование '{{ $organisation->title }}'</div>
            <div class="card-body">
                <!-- Отображение ошибок проверки ввода -->
                @include('common.errors')

                <!-- Форма новой задачи -->
                <form action="{{ url('backend/organisation/'.$organisation->id) }}" method="POST" class="form-inline">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}

                    <!-- Наименование -->
                    <div class="form-group col-9">
                        <label for="organisation" class="col-2 control-label">Наименование</label>

                        <div class="col-10">
                            <input type="text" name="title" id="organisation-title" class="form-control" placeholder="Наименование" value="{{ $organisation->title }}" style="width: 100%">
                        </div>
                    </div>

                    <!-- Краткое наименование -->
                    <div class="form-group col-9">
                        <label for="organisation" class="col-2 control-label">Сокращенное наименование</label>

                        <div class="col-10">
                            <input type="text" name="short_title" id="organisation-title" class="form-control" placeholder="Сокращение" value="{{ $organisation->short_title }}" style="width: 100%">
                        </div>
                    </div>

                    <div class="form-group col-3">
                        <div class="col-sm-3">
                        <button type="submit" class="btn btn-success">
                            <i class="fa fa-plus"></i> Сохранить изменения
                        </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection