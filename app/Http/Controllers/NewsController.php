<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    //
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
}
