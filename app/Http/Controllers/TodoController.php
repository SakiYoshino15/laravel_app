<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;
use Auth;

class TodoController extends Controller
{
    private $todo;

    public function __construct(Todo $instanceClass)
    {
        $this->middleware('auth');//middlwareのauthを呼び出している
        $this->todo = $instanceClass;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $todos = $this->todo->all();
        $todos = $this->todo->getByUserId(Auth::id());
        //ログインしているユーザーのIDとDBにあるテーブルのUser_idが一致するものだけcolecitonに格納して返している。
        // getByUserIdはmodelの中でメソッドを指定している
        return view('todo.index', compact('todos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('todo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $input = $request->all();
        // $this->todo->title = $input['title'];
        // dd($this->todo);
        $input['user_id'] = Auth::id();
        //$inputの中にある配列の中にuse_idキーを追加して現在ログイン中のidを取得したものをバリューに定義している
        $this->todo->fill($input)->save();
        // $this->todo->fill($input)->save();
        return redirect()->route('todo.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $todo = $this->todo->find($id);
        return view('todo.edit', compact('todo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // dd($id);
        $todo = $this->todo->find($id);
        // dd($todo->id, $todo);
        // dd(compact('todo'));// array['todo' => $todo];
        return view('todo.edit', compact('todo'));
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
        // dd($request);
        $input = $request->all();
        $this->todo->find($id)->fill($input)->save();
        return redirect()->route('todo.index');
        // dd($input);
        // $findrecord = $this->todo->find($id);
        // echo('<pre>');
        // var_dump($findrecord);
        // echo('/<pre>');
        // dump($findrecord);
        // dd($findrecord, $findrecord->fill($input));
        // $findrecord->title = $input['title'];
        // $findrecord->save();
        // dd($findrecord);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->todo->find($id)->delete();
        return redirect()->route('todo.index');
    }
}
