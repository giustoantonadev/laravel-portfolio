<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    public function index()
    {
        $types = Type::all();
        return view('admin.types.index', compact('types'));
    }

    public function create()
    {
        return view('admin.types.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|min:3|max:50'
        ]);

        Type::create($data);

        return redirect()->route('admin.types.index')->with('message', 'Tipo creato con successo!');
    }

    public function show(Type $type)
    {
        return view('admin.types.show', compact('type'));
    }

    public function edit(Type $type)
    {
        return view('admin.types.edit', compact('type'));
    }

    public function update(Request $request, Type $type)
    {
        $data = $request->validate([
            'name' => 'required|min:3|max:50'
        ]);

        $type->update($data);

        return redirect()->route('admin.types.index')->with('message', 'Tipo aggiornato con successo!');
    }

    public function destroy(Type $type)
    {
        $type->delete();

        return redirect()->route('admin.types.index')->with('message', 'Tipo eliminato con successo!');
    }
}
