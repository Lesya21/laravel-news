<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.news.index', [
            'newsList' => News::all()->sortByDesc('id')
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.news.create', [
            'categories' => Category::all()
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'category_id' => 'required',
            'description' => 'required'
        ]);

        $fields = $request->only('title', 'description', 'image', 'detail_text', 'author');
        $categoriesFields = $request->only('category_id');
        $categoriesFields = array_map('intval', $categoriesFields['category_id']);

        $fields['code'] = \Str::slug($fields['title']);

        $news = News::create($fields);
        $categories = Category::find($categoriesFields);
        $news->categories()->attach($categories);

        if ($news) {
            return redirect()->route('news.index');
        }

        return back()->withInput();
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
    public function edit(News $news)
    {
        return view('admin.news.edit', [
            'news' => $news,
            'categories' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $news)
    {
        $request->validate([
            'title' => ['required']
        ]);

        $fields = $request->only('title', 'description', 'detail_text', 'status', 'author');
        $fields['code'] = \Str::slug($fields['title']);

        $categoriesFields = $request->only('category_id');
        $categoriesFields = array_map('intval', $categoriesFields['category_id']);

        $categories = Category::find($categoriesFields);
        $news->fill($fields)->save();
        $news = $news->categories()->sync($categories);

        if ($news) {
            return redirect()->route('news.index');
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
        $news = News::find($id);

        $news->categories()->detach();
        $news->delete();

        return response()->json(['success' => true]);
    }
}
