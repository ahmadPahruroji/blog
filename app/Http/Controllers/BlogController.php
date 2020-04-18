<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Post $posts)
    {
        //
        $categorywidget = Category::all();
        $data = $posts->orderBy('created_at', 'desc')->take(4)->get();
        return view('blog', compact('data', 'categorywidget'));
    }

    public function content($slug){
        $categorywidget = Category::all();
        $data = Post::where('slug', $slug)->get();

        return view('blog.isipost', compact('data', 'categorywidget'));
    }

    public function listblog(){
        $categorywidget = Category::all();
        $data = Post::latest()->paginate(6);
        return view('blog.listpost', compact('data', 'categorywidget'));
    }

    public function listcategory(category $category){
        $categorywidget = Category::all();
        $data = $category->post()->paginate(4);
        return view('blog.listpost', compact('data', 'categorywidget'));
    }

    public function cari(Request $request){
        $categorywidget = Category::all();
        $data = Post::where('judul',$request->cari)->orWhere('judul', 'like', '%'.$request->cari.'%')->paginate(4);
        return view('blog.listpost', compact('data', 'categorywidget'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
