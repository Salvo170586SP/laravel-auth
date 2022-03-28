<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('updated_at', 'DESC')->paginate(5);
        return view('admin.posts.index', compact('posts'));
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
        $request->validate([
            'title' => 'required|string|unique:posts|min:5|max:100',
            'content' => 'string',
            'image' => 'url',
        ],[
            'title.required'=> 'Il titolo è obbligatorio',
            'title.min'=> 'Il titolo deve avere almeno 5 caratteri',
            'title.max'=> 'Il titolo può avere massimo 100 caratteri',
            'title.unique'=> "Esiste già un titolo con il nome $request->title",
        ]);

        $data = $request->all();
        $post = new Post();
        $post->fill($data);
        $post->slug = Str::slug($post->title, '-' );
        $post->save();


        return redirect()->route('admin.posts.index', compact('post'))->with('message','Post creato con successo');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
         return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {

       return view('admin.posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => ['required','string', Rule::unique('posts')->ignore($post->id),'min:5', 'max:100'],
            'content' => 'string',
            'image' => 'url',
        ],[
            'title.required'=> 'Il titolo è obbligatorio',
            'title.min'=> 'Il titolo deve avere almeno 5 caratteri',
            'title.max'=> 'Il titolo può avere massimo 100 caratteri',
            'title.unique'=> "Esiste già un titolo con il nome $request->title",
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->title, '-');
        $post->update($data);
        return redirect()->route('admin.posts.index', $post);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('admin.posts.index');      
    }
}
