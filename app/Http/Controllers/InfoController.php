<?php

namespace App\Http\Controllers;

use App\Models\Info;
use Illuminate\Http\Request;

class InfoController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->query('search');
        $infos = Info::when($search, function ($query, $search) {
            return $query->where('title', 'like', "%$search%")
                         ->orWhere('description', 'like', "%$search%");
        })->paginate(5);

        return view('infos.index', compact('infos', 'search'));
    }

    public function create()
    {
        return view('infos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        $data = $request->all();
    
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $data['image'] = $imagePath;
        }
    
        Info::create($data);
    
        return redirect()->route('infos.index');
    }

    public function show(Info $info)
    {
        return view('infos.show', compact('info'));
    }

    public function edit(Info $info)
    {
        return view('infos.edit', compact('info'));
    }

    public function update(Request $request, Info $info)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        $data = $request->all();
    
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $data['image'] = $imagePath;
        }
    
        $info->update($data);
    
        return redirect()->route('infos.index');
    }

    public function destroy(Info $info)
    {
        $info->delete();
        return redirect()->route('infos.index');
    }
}
