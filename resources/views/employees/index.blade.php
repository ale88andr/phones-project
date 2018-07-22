<!-- resources/views/employees/index.blade.php -->

@extends('layouts.backend')

@section('content')

    <div class="card bg-light">
        <div class="card-header">Добавление нового сотрудника</div>
            <div class="card-body">
                <!-- Отображение ошибок проверки ввода -->
                @include('common.errors')

                <!-- Форма новой задачи -->
                <form action="{{ url('backend/employee') }}" method="POST" class="form-vertical">
                    {{ csrf_field() }}

                    <!-- Наименование отдела -->
                    <div class="form-group col-6">
                        <label for="fullname" class="control-label">ФИО сотрудника</label>

                        <div class="col-9">
                            <input type="text" name="fullname" id="employee-fullname" class="form-control" placeholder="Фамилия, Имя, Отчество" style="width: 100%;">
                        </div>
                    </div>

                    <!-- Организация -->
                    <div class="form-group col-6">
                      <label for="organisation" class="control-label">Организация</label>

                      <div class="col-9">
                          <select name="organisation_id" id="organisation" class="custom-select">
                              @foreach($organisations_list as $organisation)
                                  <option value='{{ $organisation->id }}' >{{ $organisation->title }}</option>
                              @endforeach
                          </select>
                      </div>
                    </div>

                    <!-- Подразделение -->
                    <div class="form-group col-6">
                      <label for="department" class="control-label">Подразделение</label>

                      <div class="col-9">
                          <select name="department_id" id="department" class="custom-select">
                              @foreach($departments_list as $department)
                                  <option value='{{ $department->id }}' >{{ $department->title }}</option>
                              @endforeach
                          </select>
                      </div>
                    </div>

                    <!-- Должность -->
                    <div class="form-group col-6">
                      <label for="position" class="control-label">Должность</label>

                      <div class="col-9">
                          <select name="position_id" id="position" class="custom-select">
                              @foreach($positions_list as $position)
                                  <option value='{{ $position->id }}' >{{ $position->title }}</option>
                              @endforeach
                          </select>
                      </div>
                    </div>

                    <!-- IP -->
                    <div class="form-group col-6">
                      <label for="ip" class="control-label">IP телефон</label>

                      <div class="col-9">
                        <input type="text" name="ip" id="employee-ip" class="form-control" placeholder="XXXX" style="width: 100%;">
                      </div>
                    </div>

                    <!-- City -->
                    <div class="form-group col-6">
                      <label for="city" class="control-label">Городской телефон</label>

                      <div class="col-9">
                        <input type="text" name="city" id="employee-city" class="form-control" placeholder="XXXXXX" style="width: 100%;">
                      </div>
                    </div>

                    <div class="form-group col-3">
                      <button type="submit" class="btn btn-primary">
                        <i class="fa fa-plus"></i> Добавить сотрудника
                      </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <br>

    <div class="container">
        <!-- отделы -->
        @if (count($employees) > 0)
            <div class="col-12 mx-auto">
                <h2>Список сотрудников:</h2>

                <table class="table table-hover">
                    <thead>
                        <tr class="table-info">
                            <th>Должность</th>
                            <th>Сотрудник</th>
                            <th>Организация</th>
                            <th>Подразделение</th>
                            <th>IP телефон</th>
                            <th>Городской телефон</th>
                            <th>Действия</th>
                        </tr>
                    </thead>
                <tbody>
                    @foreach ($employees as $employee)
                        <tr>
                            <!-- Наименование организации -->
                            <td class="table-text">
                                <div><b class="text-default">{{ $employee->position->title }}</b></div>
                            </td>

                            <!-- Наименование подразделения -->
                            <td class="table-text">
                                <div><b class="text-info">{{ $employee->fullname }}</b></div>
                            </td>

                            <!-- Наименование организации -->
                            <td class="table-text">
                                <div><b class="text-default">{{ $employee->organisation->title }}</b></div>
                            </td>

                            <!-- Наименование подразделения -->
                            <td class="table-text">
                                <div><b class="text-default">{{ $employee->department->title }}</b></div>
                            </td>

                            <!-- ip -->
                            <td class="table-text">
                                <div><i class="text-muted">(8692)</i>&nbsp;<b class="text-danger">{{ $employee->ip }}</b></div>
                            </td>

                            <!-- city  -->
                            <td class="table-text">
                                <div>
                                    @if($employee->city == '')
                                        <i class="text-muted">Не указан</i>
                                    @else
                                        {{ $employee->city }}
                                    @endif
                                </div> 
                            </td>

                            <td>
                                <form action="{{ url('backend/employee/'.$employee->id) }}" method="POST">
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