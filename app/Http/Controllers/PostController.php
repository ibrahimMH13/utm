<?php

namespace App\Http\Controllers;

use App\Models\post;
use App\Http\Requests\StorepostRequest;
use App\Http\Requests\UpdatepostRequest;
use App\Models\Tag;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts=Post::with('tags','user')->latest()->paginate(5);
       return view('dashboard',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create',[
            'tags'=>Tag::pluck('name','id'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorepostRequest $request)
    {
        $data = $request->validated();
        $data['slug'] = Str::slug($data['title']);
        if ($request->hasFile('photo_name')) {
            $image = $request->file('photo_name');
            $photoName = str_replace('public/', '', $image->store('public/images'));
            $data['photo_name'] = $photoName;
        }

        $post =auth()->user()->posts()->create($data);
        $post->tags()->sync($data['tags']);
        return redirect()->route('post.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(post $post)
    {
      return view('posts.show',['post'=>$post]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(post $post)
    {
        return view('posts.edit',
            ['post'=>$post,
                'tags'=>Tag::pluck('name','id'),
                'tagsSelected' => $post->tags()->get()->pluck('id','name')->all()
             ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatepostRequest $request, post $post)
    {
        $data = $request->validated();
        if ($request->hasFile('photo_name')) {
            $image = $request->file('photo_name');
            $photoName = str_replace('public/', '', $image->store('public/images'));
            $data['photo_name'] = $photoName;
        }
       $post->update($data);
       $post->tags()->sync($data['tags']);
      return redirect()->route('post.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(post $post)
    {
        $post->delete();
        return redirect()->back();
    }
}
