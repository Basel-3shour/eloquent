<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(){
       // $tasks=Task::all();
       $tasks = Task::orderBy('name')->get();
        return view('tasks.index',compact('tasks'));
    }

     public function store(Request $request){
    $task=new Task();
    $task->name=$request->name;
    $task->save();
    return redirect()->back();
    }

    public function destory($id){
        //DB::table('tasks')->where('id',$id)->delete();
        $task = Task::find($id);
        $task->delete();
        return redirect()->back();

}
public function edit($id){

        $model=Task::find($id);
    // $model=  DB::table('tasks')->where('id',$id)->first();

       return view('tasks.edit',compact('model'));
   }

   public function update(Request $request,$id){

                // DB::table('tasks')
                //  ->where('id', $id)
                //  ->update(['name' =>$request->name]);
                $task = Task::find($id);
                $task->name=$request->name;
                $task->save();
                 return redirect()->route('tasks.index');

   }
}
