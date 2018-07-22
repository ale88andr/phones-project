<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use DB;

class LiveSearch extends Controller
{
    public function index()
    {
        return view('live-search');
    }

    function action(Request $request)
    {
        if($request->ajax())
        {
            $output = '';
            $query = $request->get('query');
            if($query != '')
            {
                $data = Employee::with(['organisation:id,title', 'department:id,title', 'position:id,title'])
                    ->where('fullname', 'like', '%'.$query.'%')
                    ->orWhere('ip', 'like', '%'.$query.'%')
                    ->orWhereHas('organisation', function($q) use ($query) {
                        $q->where('title', 'like', '%'.$query.'%');
                    })
                    ->orWhereHas('department', function($q) use ($query) {
                        $q->where('title', 'like', '%'.$query.'%');
                    })
                    ->orWhereHas('position', function($q) use ($query) {
                        $q->where('title', 'like', '%'.$query.'%');
                    })
                    ->orderBy('fullname', 'desc')
                    ->get();
            } else {
                $data = Employee::with(['organisation:id,title', 'department:id,title', 'position:id,title'])
                    ->orderBy('fullname', 'desc')
                    ->get();
            }

            $total_row = $data->count();
            if($total_row > 0)
            {
                foreach($data as $row)
                {
                    $output .= '
                        <div class="alert alert-dismissible alert-light">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <div class="card-body">
                                <h4 class="card-title"><strong><i class="far fa-user"></i> '.$row->fullname.'</strong></h4>
                                <h6 class="card-subtitle mb-2 text-muted">'.$row->position->title.'</h6>
                                <p class="card-text">'.$row->organisation->title.' | '.$row->department->title.'</p>
                                <a href="#" class="card-link"><i class="fas fa-phone"></i> '.$row->ip.'</a>
                                <br><a href="#" class="card-link"><i class="fas fa-address-card"></i>'.$row->city or "Не указан".'</a>
                            </div>
                        </div>
                        ';
                }
            } else {
                $output = '
                <div class="text-center text-muted">
                    По Вашему запросу ничего не найденно!
                </div>
                ';
            }
            $data = array(
                'table_data' => $output,
                'total_data' => $total_row
            );

            echo json_encode($data);
        }
    }
}
