<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\News;
use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    //
    public function view(Request $request){
        if($request->ajax()){
            $data = Contact::all()->sortByDesc('id')->take(1)->toArray();
             return view('contact', ['data'=>$data]);
        }
        else{
            $data = Contact::all();
            return view('contact', ['data'=>$data]);
        }
    }

    public function add_contact(Request $request){
        request()->validate([
            'firstname'=>'required',
            'lastname'=>'required',
            'email'=>'required|email|unique:contacts',
            'phone_number'=>'required|unique:contacts'
        ]);

        $firstname = $request->firstname;
        $lastname = $request->lastname;
        $email =$request->email;
        $phone_number = $request->phone_number;



         $check =  DB::table('contacts')->insert([
            'firstname'=>$firstname,
            'lastname'=>$lastname,
            'email'=>$email,
            'phone_number'=>$phone_number,
        ]);

        $arr = array('msg'=>'Something goes wrong. Pelase try again later.', 'status'=>false);
        if($check){
            $arr = array('msg'=>'Successfully submit from ajax', 'status'=>true);
        }
        return response()->json($arr);
    }

    public function update_contact(Request $request, $id){

        $firstname = $request->firstname;
        $lastname = $request->lastname;
        $email = $request->email;
        $phone_number = $request->phone_number;

        $found = DB::table('contacts')->where('id', $id);

        if($found){
            $found->update([
               'firstname'=>$firstname,
               'lastname'=>$lastname,
               'email'=>$email,
               'phone_number'=>$phone_number,
           ]);

           $arr = array('message'=>'Something goes wrong. Pelase try again later.', 'status'=>false);
           if($found){
               $arr = array('message'=>'Successfully updated from ajax', 'status'=>true);
           }
        }
        else{
            $arr = array('message'=>'User not found');
        }
        return response()->json($arr);
    }

    public function delete_contact($id){
        $found = Contact::find($id);

        $found->delete();
        return response()->json(['message'=>'Data deleted successfully']);
    }

    public function get_contact($id){
        $found = Contact::find($id);
        return response()->json(['data'=>$found]);
    }
}
