<?php

namespace App\Http\Controllers\Admin;

use App\Models\Type;
use App\Http\Requests\StoreTypeRequest;
use App\Http\Requests\UpdateTypeRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

class TypeController extends Controller
{
    public function index()
    {
        $types = Type::all();
        return view('admin.projects.types.index', compact('types'));
    }

    public function create()
    {
        return view('admin.projects.types.create');
    }

    public function store(StoreTypeRequest $request)
    {
        $data = $request->validated();
        $data['slug'] = Str::of($data['name'])->slug();

        $type = Type::create($data);

        return redirect()->route('admin.types.index')->with('message', 'Type ' . $type->name . ' successfully created');
    }

    public function show(Type $type)
    {
        return view('admin.projects.types.show', compact('type'));
    }

    public function edit(Type $type)
    {
        return view('admin.projects.types.edit', compact('type'));
    }

    public function update(UpdateTypeRequest $request, Type $type)
    {
        $data = $request->validated();
        $data['slug'] = Str::of($data['name'])->slug();

        $type->update($data);

        return redirect()->route('admin.types.show', $type)->with('message', 'Type ' . $type->name . ' successfully updated');
    }

    public function destroy(Type $type)
    {
        $type_name = $type->name;
        $type->delete();

        return redirect()->route('admin.types.index')->with('message', 'Type ' . $type_name . ' successfully deleted');
    }
}
