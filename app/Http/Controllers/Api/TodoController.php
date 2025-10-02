<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Todo;
use Illuminate\Support\Facades\Auth;

class TodoController extends Controller
{
    public function index()
    {
        return response()->json(Auth::user()->todos);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $todo = Auth::user()->todos()->create($data);

        return response()->json($todo, 201);
    }

    public function show($id)
    {
        $todo = Auth::user()->todos()->findOrFail($id);
        return response()->json($todo);
    }

    public function update(Request $request, $id)
    {
        $todo = Auth::user()->todos()->findOrFail($id);

        $data = $request->validate([
            'title' => 'sometimes|string|max:255',
            'description' => 'sometimes|nullable|string',
            'is_done' => 'sometimes|boolean',
        ]);

        $todo->update($data);

        return response()->json($todo);
    }

    public function destroy($id)
    {
        $todo = Auth::user()->todos()->findOrFail($id);
        $todo->delete();

        return response()->json(null, 204);
    }
}
