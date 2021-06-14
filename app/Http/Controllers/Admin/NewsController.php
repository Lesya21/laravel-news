<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewsCreate;
use App\Http\Requests\NewsUpdate;
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
     * @param NewsCreate $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(NewsCreate $request)
    {
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
     * @param News $news
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(News $news)
    {
        return view('admin.news.edit', [
            'news' => $news,
            'categories' => Category::all()
        ]);
    }

    /**
     * @param NewsUpdate $request
     * @param News $news
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(NewsUpdate $request, News $news)
    {
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
