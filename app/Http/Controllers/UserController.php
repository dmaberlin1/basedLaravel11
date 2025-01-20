<?php

namespace App\Http\Controllers;

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

    public function store(Request $request)
    {
//        dump($request->input('name'));
//        dump($request->name);
//        dump($request->all);
//        dump($request->input());
//        dump($request->collect());
//        dump($request->collect()->after('test@gmail.com'));


        dump($request->boolean('agree'));
        dump($request->only(['email','password']));
        dump($request->except(['email','last_name']));
        $request->merge(['test'=>123])->all();
        $request->flash();
        User::create($request->all());
        return redirect()->route('user.login');
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
