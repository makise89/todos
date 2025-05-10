<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo; 
use App\Models\Complete;
use Illuminate\Support\Facades\DB;

class TodoController extends Controller
{

    //NoCompleteファイルロード

    public function index(){
        //描画する処理
        $todos = Todo::orderBy('priority', 'desc')->get();
        return view("todos.noComplete",['todos' => $todos]);
    }

    //タスク追加の処理

    public function taskAdd(Request $request){
        $title = $request->input('title');
        $todoClass = new Todo();
        $todoClass->title = $title;
        $todoClass->save();

        return response()->json([
            'title'=>$title,
            'id'=>$todoClass->id,
            'createdAt'=>$todoClass->created_at
        ]);
    }


    //タスクの削除

    public function taskRemove(Request $request){
        $id = $request->input('id');
        $todo = Todo::find($id);
        if($todo){
            $completeClass = new Complete();
            $completeClass->title = $todo->title;
            $completeClass->save();
            $todo->delete();
        }
    }


    //completeのロード

    public function complete(){
            $complete = DB::table('completes')->get();
       return view('todos.complete',['complete'=>$complete]);
    }

    


    //タスク復元処理

    public function taskRestore(Request $request){
        $id = $request->input('id');
        dump($id);
        if($id){
            $todos = new Todo();
            $complete = Complete::find($id);
            $todos->title=$complete->title;
            $todos->save();
            $complete->delete();
        }
    }

    //優先順位の処理
    public function priority(Request $request){
        $todo = Todo::find($request->id);
        $todo->priority = !$todo->priority;
        $todo->save();
    }
}
   