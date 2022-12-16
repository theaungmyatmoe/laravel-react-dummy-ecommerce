<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Color;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $colors = Color::latest()->paginate(10);

        return view('admin.category.index', compact('colors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.color.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        Color::create([
            'name' => $request->name,
        ]);

        return redirect()
            ->back()
            ->with('success', 'Category Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $color = Color::whereId($id)->first();
        if (!$color) {
            return redirect()->back()->with('error', 'Invalid Category');
        }
        return view('admin.color.edit', compact('color'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $color = Color::whereId($id)->first();

        if (!$color) {
            return redirect()->back()->with('error', 'Color did not exits');
        }
        $color->update([
            'name' => $request->name,
        ]);

        return redirect()->route('colors.index')->with('success', 'Color updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $color = Color::whereId($id)->first();
        if (!$color) {
            return redirect()->route('colors.index')->with('error', 'Color with that name did not exits');
        }

        $color->delete();
        return redirect()->route('colors.index')->with('success', 'Color deleted');
    }
}
