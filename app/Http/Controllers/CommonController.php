<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use App\Organisation;

class CommonController extends Controller
{
    public function showOrganisationsPhones(Request $request)
    {
        $organisations = Organisation::all();

        return view(
            'organisations.list', 
            compact('organisations')
        );
    }

    public function getOrganisationEmployees(Request $request)
    {
        if($request->ajax())
        {
            $output = '';
            $organisation_id = $request->get('id');
            if($organisation_id != '')
            {
                $data = Employee::with(['organisation:id,title', 'department:id,title', 'position:id,title'])
                    ->groupBy('position_id')
                    ->having('organisation_id', '=', $organisation_id)
                    ->orderBy('fullname', 'desc')
                    ->get();
            } else {
                $output = '
                <div class="text-center text-muted">
                    По Вашему запросу ничего не найденно!
                </div>
                ';
            }

            $total_row = $data->count();
            if($total_row > 0)
            {
                foreach($data as $index=>$row)
                {
                    $output .= '
                        <tr>
                            <td><strong>'.++$index.'</strong></td>
                            <td>'.$row->position->title.'</td>
                            <td><strong class="text-primary">'.$row->fullname.'</strong></td>
                            <td>'.$row->organisation->title.'</td>
                            <td>'.$row->department->title.'</td>
                            <td><strong class="text-primary">'.$row->ip.'</strong></td>
                            <td>'.$row->city or "Не указан".'</td>
                        </tr>
                        ';
                }
            }

            $data = array(
                'table_data' => $output,
                'total_data' => $total_row
            );

            echo json_encode($data);
        }
    }
}
