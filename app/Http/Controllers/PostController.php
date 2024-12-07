<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function create(){

        return view('create');
    }

    public function ourfilestore(Request $request ){

        $validated = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'nullable|mimes:jpeg,png',
        ]);

        // upload image
        $imageName = null;
        if (isset($request->image)){

            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'),$imageName);
            
        }
       
        //add new post
       $post = new Post;
       $post->name = $request->name;
       $post->description = $request->description;
       $post->image = $imageName;

        $post->save();
         
        flash()->success('Your post has been Created!');
        return redirect()->route('home');
    }

    public function editData($id){
        $post = Post::findOrFail($id);
        return view('edit',['ourPost'=> $post]);
    }

    public function updateData($id,Request $request){
        

        
        $validated = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'nullable|mimes:jpeg,png',
        ]);

        // upload image
        
       
       
        $post = Post::findOrFail($id);
       $post->name = $request->name;
       $post->description = $request->description;

       if (isset($request->image)){

        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images'),$imageName);
        $post->image = $imageName;
        
    }
       

       $post->save();
         
       flash()->success('Your post has been Updated!');
       return redirect()->route('home');

    }


    public function deleteData($id){
        $post = Post::findOrFail($id);
        $post->delete();

        flash()->success('Your post has been deleted!');
        return redirect()->route('home');
    }

    public function viewPost($id){
        $post = Post::findOrFail($id);
        return view('postview',['ourPost'=> $post]);
    }
    public function search(Request $request) {
        $query = $request->input('query');
        $posts = Post::where('name', 'LIKE', "%{$query}%")
                     ->orWhere('description', 'LIKE', "%{$query}%")
                     ->paginate(5);
    
        return view('welcome', compact('posts'));
    }
}
