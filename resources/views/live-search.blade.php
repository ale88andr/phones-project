@extends('layouts.app')

@section('content')
<div class="col-8 mx-auto" style="margin-top: 60px;">
    <h1 class="text-primary text-center">Попробуйте быстрый поиск ...</h1><br />
    <div class="alert alert-dismissible alert-info">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <p>
                <strong>Подсказка!</strong> Ищите телефоны сотрудников с помощью поля ниже
                Например, по должности - <strong>Нач</strong> для поиска всех начальников отделов,
                либо введите первые буквы фамилии, имени или отчества,
                также поиск осуществляется по номерам телефонов.
            </p>
        </div>
    <div class="panel panel-default">
            <div class="panel-body">
                <div class="form-group">
                    <input type="text" name="search" id="search" class="form-control" placeholder="Начните искать здесь" />
                </div>
                <br>
            </div>    
        </div>
        <br>
        <br>
        <br>
        <h3 class="text-center">Найденно : <span class="badge badge-primary" id="total_records"></span></h3>
        <div id="results"></div>
    </div>
</div>

<script>
    $(document).ready(function(){

        fetch_customer_data();

        function fetch_customer_data(query = '')
        {
            $.ajax({
                url:"{{ route('live_search.action') }}",
                method:'GET',
                data:{query:query},
                dataType:'json',
                success:function(data)
                {
                    $('#results').html(data.table_data);
                    $('#total_records').text(data.total_data);
                }
            })
        }

        $(document).on('keyup', '#search', function(){
            var query = $(this).val();
            fetch_customer_data(query);
        });
    });
</script>

@endsection
