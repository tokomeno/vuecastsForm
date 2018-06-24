<?php

namespace App\Http\Controllers;

use App\Qoute;
use Illuminate\Http\Request;

use JWTAuth;

class QouteController extends Controller
{
 
    public function index()
    {
        //
        return $qoute = Qoute::all();

    }
  
    public function store(Request $request)
    {
       
        if( !$user = JWTAuth::parseToken()->authenticate()){
            return respone()->json(['message' => 'user not'], 404);
        }
        $qoute = new Qoute();
        $qoute->content = $request->input('content');
        $qoute->save();
        return $qoute;
    }

  
    public function show(Qoute $qoute)
    {
        //
    } 

    public function update(Request $request, $id)
    {
        //
        $qoute = Qoute::find($id);
        if(!$qoute){
            return 'Document not found';
        }
        $qoute->content = $request->content;
        $qoute->save();
        return $qoute;


    }

  
    public function destroy($id)
    {
        $qoute = Qoute::find($id);
        $qoute->delete();
        return 'qoute deleted';
    }
}
