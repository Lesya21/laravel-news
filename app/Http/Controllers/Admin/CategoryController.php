<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryCreate;
use App\Http\Requests\CategoryUpdate;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.categories.index', [
            'categories' => Category::all()->sortByDesc('id')
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create', [
            'categories' => Category::all()
        ]);
    }

    /**
     * @param CategoryCreate $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CategoryCreate $request)
    {
        $fields = $request->only('title', 'description');
        $category = Category::create($fields);

        if ($category) {
            return redirect()->route('categories.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit', [
            'category' => $category
        ]);
    }

    /**
     * @param CategoryUpdate $request
     * @param Category $category
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(CategoryUpdate $request, Category $category)
    {
        $fields = $request->only('title', 'description');

        $category->fill($fields)->save();

        if ($category) {
            return redirect()->route('categories.index');
        }

        return back()->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
