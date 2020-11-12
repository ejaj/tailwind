<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{

    /**
     * @return mixed
     */
    public function index()
    {
        $todo_list = Todo::orderBy('created_at', 'DESC')->get();
        return $todo_list;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function add(Request $request)
    {
        $post = new Todo([
            'title' => $request->input('title')
        ]);
        $post->save();

        return response()->json('The todo item successfully added');
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit($id)
    {
        $post = Todo::find($id);
        return response()->json($post);
    }

    /**
     * @param $id
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update($id, Request $request)
    {
        $post = Todo::find($id);
        $post->update($request->all());

        return response()->json('The todo item successfully updated');
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete($id)
    {
        $post = Todo::find($id);
        $post->delete();

        return response()->json('The todo item successfully deleted');
    }
}
