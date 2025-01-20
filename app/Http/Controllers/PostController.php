<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Tag;
use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $tag=Tag::find(2);
        dump($tag->post->title);
        $post=Post::find(1);
        foreach ($post->comments as $comment){
            dump($comment->content);
        }

        $comment=Comment::with('post')->findOrFail(1);
//        $comments=Post::find(1)
//            ->comments;
        $commentsOfPostWithId1=Post::findOrFail(1)
            ->comments()
            ->where('id',">",1)
            ->get();
        $posts=Post::with(['comments','tags'])->get();
        $post1=Post::with(['comments','tags'])->find(1);
        $commentLastOfPostWithId1=Post::findOrFail(1)->commentLatest;


        return view('post.index', ['title' => 'Список статей','posts' => $posts]);
    }


//    public function index_old()
//    {
////        $posts=Post::all();
////        $posts=Post::query()->get(['id','title']);
////        $posts = Post::query()
////            ->select(['id', 'title'])
////            ->where('id','!=',1)
////            ->where('id','!=',2)
////            ->orderBy('id','desc')
////            ->limit(20)
////            ->get();
////        dump($posts[0]->title);
////        $post=Post::query()->where('id','=',1)->first();
////        $post1=Post::find(3,['id','title']);
////        $post2=Post::findOrFail(10,['id','content']);
////        $post3=Post::firstWhere('title','=','Demo Title');
////        $post4=Post::firstWhere('id','>','5')->max(10)->count(10);
////        if(!$post1){
////            abort(404,'Post not found');
////        }
//        //safety method
//        $post=new Post();
//        $post->title='Post1';
//        $post->slug='post-1';
//        $post->content='Post1 content';
//        $post->save();
//
//        //don't safety method
//        $postWithoutCreate=Post::create([
//            'title' => 'Post2',
//            'slug' => 'post-2',
//            'content' => 'post 2 content'
//        ]);
//        $postWithoutCreate->save();
//        $post1=Post::find(1);
//        $post1->title='Post 1 after update';
//        $post1->content='Post 1 content after update';
//        $post1->save();
//
//        Post::where('id','>',2)->update([
//            'content' => 'updated...'
//        ]);
//
////        //delete
////        $post2=Post::find(2);
////        $post2->delete();
//
//        //delete second
////        Post::destroy([2,3]);
////        Post::destroy(2);
////        Post::forceDestroy([11,12]);
////        dump(Post::withTrashed()->findOrFail(2)->restore());
////        Post::onlyTrashed()->get();
//
//
//
//        return view('post.index', ['title' => 'Список статей']);
//    }


}
