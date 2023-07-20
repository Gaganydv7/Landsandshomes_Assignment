<?php

namespace App\Http\Controllers;

use App\Models\Data;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class ApiController extends Controller
{
    // save API 
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:50',
            'description' => 'required|string|max:250',
            'file' => 'required|image|max:5000', // 5MB
            'type' => 'required|in:1,2,3',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $data = new Data();
        $data->name = $request->input('name');
        $data->description = $request->input('description');
        $data->type = $request->input('type');

        $file = $request->file('file');
        $path = $file->store('private');

        $data->file_path = $path;
        $data->save();

        return response()->json(['name' => $data->name, 'description' => $data->description, 'type' => $data->type], 201);
    }

    // Listing API 
    public function index()
    {
        $data = Data::select('name', 'description', 'type')->paginate(10);
        return response()->json($data);
    }

    // public function show($id)
    // {
    //     echo $id;
    //     // $data = Data::select('name', 'description', 'type', 'file_path')->find($id);
    //     $data = Data::select('name', 'description', 'type', 'file_path')->where('id',$id)->first();
    //     if (!$data) {
    //         return response()->json(['error' => 'Data not found'], 404);
    //     }

    //     $temporaryUrl = Storage::temporaryUrl($data->file_path, now()->addHour());
    //     $data->file_path = $temporaryUrl;

    //     return response()->json($data);
    // }
    // search one API 
    public function show($id)
    {
        $data = Data::select('name', 'description', 'type', 'file_path')->where('id', $id)->first();
        return response()->json($data);
    }
}
