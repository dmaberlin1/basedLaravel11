<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $name='demo name';
        return view('user.create',compact('name'));
    }

    public function store_second(StoreUserRequest $request)
    {
        $validated=$request->validated();
        User::create($validated);
        return redirect()->route('user.login')->with('success','Thanks for registration');

    }

    public function store(Request $request)
    {
//        dump($request->input('name'));
//        dump($request->name);
//        dump($request->all);
//        dump($request->input());
//        dump($request->collect());
//        dump($request->collect()->after('test@gmail.com'));
//
//        dump($request->boolean('agree'));
//        dump($request->only(['email','password']));
//        dump($request->except(['email','last_name']));
        $validated=$request->validate([
            'name'=>['required','string','max:40','min:2'],
            'email'=>['email','required','unique:users,email'],
//https://stackoverflow.com/questions/19605150/regex-for-password-must-contain-at-least-eight-characters-at-least-one-number-a
            'password'=>['required','min:6','regex:"^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$"','confirmed:password_confirmation'],
            'agree'=>['required'],
            //max 700kb
            'avatar'=>['image','extensions:jpg,png','max:1024']
        ],[
            'name.required'=>'Oops, name is required',
            'email.unique:users,email'=>'Oops, email must be unique',
        ]);
        $request->merge(['test'=>123])->all();
        $request->flash();
        if($request->hasFile('avatar')){
            dump($request->file('avatar')->extension());
            dump($request->file('avatar')->path());
            dump($request->file('avatar')->getClientOriginalName());
            $folders=date('Y').'/'.date('m').'/'.date('d');
            $avatar = $request->file('avatar')->store("images/$folders");
            $validated['avatar']=$avatar;
        }

        User::create($validated);
//        return view('user.create')->with([
//            'title'=>'demoTitle',
//        ]);
//        return view('user.create')->with([
//            'title'=>'demoTitle',
//        ]);
        return redirect()->route('user.login')->with('success','Thanks for registration');
//        return redirect()->route('user.create')->withInput();
    }
    /**
     * Store a newly created resource in storage.
     */
    public function login()
    {
        return view('user.login');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
