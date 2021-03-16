<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    //
    public function index(){
        $data = DB::select('select * from news');
        return view('landingpage', ['data'=>$data]);
    }

    public function view(){
        return view('add_news');
    }

    public function store(Request $request){
        $file = $request->file("file");
        $category = $request->input("category");
        $author = $request->input("author");
        $title = $request->input("title");
        $content = $request->input("content");
        $current_date_time = \Carbon\Carbon::now()->toDateTimeString();

        $fileName = 'img_'.time().'_'.$file->getClientOriginalName();
        $file->storeAs('public/img', $fileName);

        // $fileUrl = '/storage/app/public/img/'.$fileName;

        $url = Storage::url('/img/'.$fileName);

        DB::table('news')->insert([
            'thumbnailURL'=>$url,
            'category'=>$category,
            'author'=>$author,
            'title'=>$title,
            'content'=>$content,
            'created_at'=>$current_date_time,
        ]);
        return redirect()->back();
    }

    public function update(Request $request){
        $id = $request->id;
        $imgFile = $request->file("imgURL");
        $category = $request->input("category");
        $author = $request->input("author");
        $title = $request->input("title");
        $content = $request->input("content");
        $current_date_time = \Carbon\Carbon::now()->toDateTimeString();


        $fileName = 'img_'.time().'_'.$imgFile->getClientOriginalName();
        $imgFile->storeAs('public/img', $fileName);
        $imgURL = Storage::url('/img/'.$fileName);

        $found = DB::table('news')->where('id', $id);

        if($found){
            $found->update([
                'thumbnailURL' => $imgURL,
                'category' => $category,
                'author' => $author,
                'title' => $title,
                'content' => $content,
                'updated_at' => $current_date_time
            ]);

            $msg = "Data succesfully updated.";

            $arr = [
                'message'=>'Its worked',
                'id'=>$id,
                'thumbnail'=> $imgURL,
                'category' => $category,
                'author' =>$author,
                'title' =>$title,
                'content' => $content
            ];
        }else{
            $msg = "User not found";
        }


        return response()->json(['message'=>$arr]);
    }

    public function getById($id){

        $found = News::find($id);
        return response()->json(['data'=>$found]);
    }

    public function delete($id){

        $found = News::find($id);

        $found->delete();
        return response()->json(['message'=>'Data deleted successfully']);
    }

}
