<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $request->session()->put('key','hello, World');
        session(['key2'=>'hello, world 2']);
        dump($request->session()->all());
        dump(session('key2'));
        dump(session()->all());
        dump(session()->only(['username','email']));
        $product1=[
            'id'=>1,
            'title'=>'product 1',
            'price'=>1000,
            'qty'=>5
        ];
        $product2=[
            'id'=>1,
            'title'=>'product 2',
            'price'=>1000,
            'qty'=>10
        ];
        $product3=[
            'id'=>1,
            'title'=>'product 3',
            'price'=>5000,
            'qty'=>10
        ];
        session(['cart'=>[$product1]]);
        session()->push('cart',$product2);
        session(['cart.0.qty'=>7]);
        session()->forget([1]);
        session()->forget([0,1]);
        session()->forget('cart.2');

        session()->flash('test','test flash');
        redirect()->route('user.login');
        dump(session('test'));

        $posts=Post::with('category')->paginate(5)->withQueryString();
        return view('home',compact('posts'));
    }

//    public function index_old1()
//    {
////        $posts=Post::with('categories')->get();
////        $posts=Post::with('categories')->paginate(15);
////        $posts=Post::with('categories')->simplePaginate(15);
//        $users=User::all();
//        foreach ($users as $user){
//            echo "{$user->full_name}<br>";
//        }
//        User::create([
//            'name'=>'юлий',
//            'last_name'=>'викторинос',
//            'email'=>'Victorinos1@gmail.com',
//            'password' => '123123',
//        ]);
//        $posts=Post::with('categories')->paginate(15)->withQueryString();
//        return view('home', compact('posts'));
//    }
//    public function index_old()
//    {
//        for ($i = 1; $i <= 15; $i++) {
//            Post::create([
//                'title' => $i . ' title',
//                'slug' => "$i-slug",
//                'content' => $i . ' "content" ' . $i
//            ]);
//        }
//
//        $category = Category::query()->findOrFail(1);
//        dump($category->posts);
//
//        $post = Post::with(['categories', 'tags'])->findOrFail(1);
//        $posts = Post::with('categories')->get();
//        dump($post->categories);
//
//        Comment::query()->create([
//            'content' => 'Comment 5',
//            'post_id' => $post->id,
//        ]);
//
//        $post->comments()->save(
//            new Comment([
//                'content' => 'Comment 2'
//            ])
//        );
//        $post->comments()->saveMany([
//            new Comment([
//                'content' => 'Comment 3'
//            ]),
//            new Comment([
//                'content' => 'Comment 4'
//            ]),
//            new Comment([
//                'content' => 'Comment 5'
//            ])
//        ]);
//        $post->comments()->create([
//            'content' => 'Comment 6'
//        ]);
//        $post->comments()->createMany([
//            ['content' => 'Comment 7'],
//            ['content' => 'Comment 8'],
//            ['content' => 'Comment 9'],
//            ['content' => 'Comment 10'],
//        ]);
//        $post->categories()->attach(1);
//        $post->categories()->attach([2,4]);
//        $post->categories()->detach([1,2]);
//        $post->categories()->attach([1,2]);
//        //все будут удалены, останутся те что синк, синк идемпотентный
//        $post->categories()->sync([1,2,3]);
//        //делает обратный процесс с текущим значением в бд
//        $post->categories()->toggle([1]);
//
//        $id=5;
//        $posts=DB::select('select id,title from posts where id > ?',[$id]);
//        $posts1=DB::select('select id,title from posts where id > :id',['id'=>$id]);
//        $posts2=DB::select('select count(*) As cnt  from posts');
//        //на выходе получаем 1 агрегированное значение
//        $posts3=DB::scalar('select count(*) As cnt  from posts');
//
//        $res=DB::insert("insert into posts (title,slug,content,created_at,updated_at)
//        values(?,?,?,?,?)",['title16','title-16','post 16 content',now(),now()]);
//        $temp='edited';
//        $id1=2;
//        $res1=DB::update('update posts set title = concat(title,?),updated_at= ? where id = ?',[$temp,now(),$id1]);
//        $res3=DB::delete('delete from posts where id = ?',[$id1]);
//        $res4=DB::transaction(function (){
//
//        });
//        $posts=DB::table('posts')->get();
//        $posts1=DB::table('posts')->select(['id','title'])->where('id', '>', $id1)->get();
//        dump($posts2[0]->cmt);
//        $posts=DB::table('posts')->pluck('title','id');
//        $posts1=DB::table('posts')->count();
//        $posts2=DB::table('posts')->max('id');
//        $posts3=DB::table('posts')->min('id');
//        $posts4=DB::table('posts')
//            ->select('posts.*','tags.title as tag_title')
//            //join tags on posts.id = tags.post_id
//            ->join('tags','posts.id','=','tags.post_id','left')
//            ->leftJoin('tags','posts.id','=','tags.post_id')
//            ->orderBy('posts.id')
//            ->get();
//
//        return view('home', compact('posts'));
//    }
}
