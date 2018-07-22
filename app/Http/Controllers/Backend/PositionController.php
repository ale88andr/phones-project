<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Position;

class PositionController extends \App\Http\Controllers\Controller
{
    public function index(Request $request)
    {
        $positions = Position::withCount('employees')->orderBy('created_at', 'asc')->get();
        return view('positions.index', compact('positions'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
        ]);

        $position = new Position;
        $position->title = $request->title;
        $position->save();

        return redirect('/positions');
    }

    public function destroy(Request $request, Position $position) {
        $position->delete();
      
        return redirect('/positions');
    }
}
