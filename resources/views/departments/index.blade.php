<!-- resources/views/departments/index.blade.php -->

@extends('layouts.backend')

@section('content')

    <div class="card bg-light">
        <div class="card-header">Добавление нового подразделения</div>
            <div class="card-body">
                <!-- Отображение ошибок проверки ввода -->
                @include('common.errors')

                <!-- Форма новой задачи -->
                <form action="{{ url('backend/department') }}" method="POST" class="form-inline">
                    {{ csrf_field() }}

                    <!-- Наименование отдела -->
                    <div class="form-group col-5">
                        <label for="department" class="col-3 control-label">Наименование отдела</label>

                        <div class="col-9">
                            <input type="text" name="title" id="department-title" class="form-control" placeholder="Наименование" style="width: 100%;">
                        </div>
                    </div>

                    <!-- Организация -->
                    <div class="form-group col-4">
                      <label for="department" class="col-3 control-label">Организация</label>

                      <div class="col-9">
                          <select name="organisation_id" id="organisations" class="custom-select">
                              @foreach($organisations_list as $organisation)
                                  <option value='{{ $organisation->id }}' >{{ $organisation->title }}</option>
                              @endforeach
                          </select>
                      </div>
                    </div>

                    <div class="form-group col-3">
                      <button type="submit" class="btn btn-primary">
                        <i class="fa fa-plus"></i> Создать подразделение
                      </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <br>

    <div class="container">
        <!-- отделы -->
        @if (count($departments) > 0)
            <div class="col-10 mx-auto">
                <h2>Список структурных подразделений:</h2>

                <table class="table table-hover">
                    <thead>
                        <tr class="table-info">
                            <th>Наименование подразделения</th>
                            <th>Организация подразделения</th>
                            <th>Действия</th>
                        </tr>
                    </thead>
                <tbody>
                    @foreach ($departments as $department)
                        <tr>
                            <!-- Наименование подразделения -->
                            <td class="table-text">
                                <div><b class="text-info">{{ $department->title }}</b></div>
                            </td>

                            <!-- Наименование организации подразделения -->
                            <td class="table-text">
                                <div><b class="text-default">{{ $department->organisation->title }}</b></div>
                            </td>

                            <td>
                                <form action="{{ url('backend/department/'.$department->id) }}" method="POST">
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