<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo; 
use App\Models\Complete;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class TodoController extends Controller
{

    //NoCompleteファイルロード

    public function index(){
        //描画する処理
        $user_id = Auth()->id();
        $tasks = Todo::where('user_id',$user_id)->get();
        return view("todos.noComplete",['todos' => $tasks]);
    }

    //タスク追加の処理

    public function taskAdd(Request $request){
        $title = $request->input('title');
        $todoClass = new Todo();
        $todoClass->title = $title;
        $todoClass->user_id = Auth()->id();
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
            $completeClass->user_id = Auth()->id();
            $completeClass->save();
            $todo->delete();
        }
    }


    //completeのロード

    public function complete(){
        $user_id = Auth()->id();
        $complete = Complete::where('user_id',$user_id)->get();
       return view('todos.complete',['complete'=>$complete]);
    }

    


    //タスク復元処理

    public function taskRestore(Request $request){
        $id = $request->input('id');
        if($id){
            $todos = new Todo();
            $complete = Complete::find($id);
            $todos->title=$complete->title;
            $todos->user_id=$complete->user_id;
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
   