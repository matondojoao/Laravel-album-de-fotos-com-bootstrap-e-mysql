<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Album;
use Illuminate\Support\Facades\Storage;

class AlbumControllador extends Controller
{
    public function index()
    {
        $albums=Album::all();
        return view('index',compact(['albums']));
    }

   
    public function store(Request $request)
    {
        $album=new Album();
        $path=$request->file('arquivo')->store('imagens','public');
        $album->email=$request->input('email');
        $album->mensagem=$request->input('mensagem');
        $album->arquivo=$path;
        $album->save();
        return redirect('/');
    }
    public function destroy($id)
    {
        $album=Album::find($id);
        if(isset($album)){
          $arquivo=$album->arquivo;
          $album->delete();
          Storage::disk('public')->delete($arquivo);
        }
        return redirect('/');
    }
    public function download($id){
        $album=Album::find($id);
        if(isset($album)){
           $path =  Storage::disk('public')->getDriver()->getAdapter()->applyPathPrefix($album->arquivo);
           return response()->download($path);
        }
        return redirect('/');
    }
}
