<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Organisation;

class OrganisationController extends \App\Http\Controllers\Controller
{
    public function index(Request $request)
    {
        $organisations = Organisation::withCount('employees')->orderBy('title', 'asc')->get();
        return view('organisations.index', compact('organisations'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
        ]);

        $organisation = new Organisation;
        $organisation->title = $request->title;
        $organisation->short_title = $request->short_title;
        $organisation->save();

        return redirect('/backend/organisations');
    }

    public function edit(Organisation $organisation)
    {
        return view('organisations.edit', compact('organisation'));
    }

    public function update(Request $request, Organisation $organisation)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
            'short_title' => 'max:50',
        ]);

        $input = $request->all();

        $organisation->fill($input)->save();

        return redirect('/backend/organisations');
    }

    public function destroy(Request $request, Organisation $organisation) {
        $organisation->delete();
      
        return redirect('/backend/organisations');
    }
}
