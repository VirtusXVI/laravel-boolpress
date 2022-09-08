<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Post;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('admin.posts.index',compact('posts',$posts));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate($this->getValidationRules());

        $form_data = $request->all();
        $new_post = new Post();
        $new_post->fill($form_data);

        $new_post->slug = $this->slugControls($new_post->title);

        $new_post->save();

        return redirect()->route('admin.posts.show', $new_post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $posts = Post::find($id);

        return view('admin.posts.show',compact('posts',$posts));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post_to_edit = Post::findOrFail($id);

        $data = [
            'post' => $post_to_edit
        ];
        return view('admin.posts.edit', $data);
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

        $request->validate($this->getValidationRules());

        $form_data = $request->all();
        $post_to_update = Post::find($id);
        $post_to_update->update($form_data);

        return view('admin.posts.show', ['posts' => $post_to_update]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::findOrFail($id)->delete();

        return redirect()->route('admin.posts.index');
    }

    protected function slugControls($title){
        $slug_to_save = Str::slug($title, '-');
        $slug_base = $slug_to_save;
        $existing_slug_post = Post::where('slug','=', $slug_to_save)->first();
        $i = 1;
        while($existing_slug_post){
            $slug_to_save = $slug_base . '-' . $i;

            $existing_slug_post = Post::where('slug', '=', $slug_to_save)->first();

            $i++;
        }
        return $slug_to_save;
    }

    protected function getValidationRules(){

        return [
            'title' => 'required|unique:posts|max:255',
            'description' => 'required',
        ];
    }
}
