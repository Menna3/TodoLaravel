<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Task;

class UsersController extends Controller
{
    public function addUser(Request $request)
    {
        
        $user = new User();
        
        $user->name = $request->name;
        $user->address = $request->address;
        $user->password = $request->password;
        if(!$request->has("name"))
        {
            return response()->json(["status" => "failed", "error" => "Name is required"]); 
        }
        $user->email = $request->email;
        
        $user->save();
        return response()->json(["response" => $user, "status" => "success"]); 
        
    }
    
    public function getUserById($id)
    {
        $user = User::findOrFail($id);
        return response()->json(["response" => $user->with("tasks")->get(), "status" => "success"]); 
    }
    
    
    public function addTask($userId, Request $request)
    {
        $user = User::findOrFail($userId);
        $task = new Task();
        
        $task->name = $request->name;
        $task->description = $request->description;
        
        $user->tasks()->save($task);
        return response()->json(["status" => "success"]); 
    }
    

    
}
