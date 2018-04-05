<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Upp;
use App\Responden;
use App\Kuesioner;
use App\Jawaban;

class SuperController extends Controller
{
    //Kabupaten CRUD

    public function kabupaten(){
    	return view('super.kabupaten.index');
    }

    public function tambah_kabupaten(){
    	$user= new User();
    	return view('super.kabupaten.tambah',compact('user'));
    }

    public function storeKabupaten(Request $request){
    	$user = new User();
    	$user->name=$request->input('nama');
    	$user->username=$request->input('username');
    	$user->email=$request->input('email');
    	$user->kategori='kabupaten';
    	$user->password=bcrypt($request->input('password'));
    	if($user->save()){
    		$kategori='success';
    		$pesan="Tersimpan";
    	}else{
    		$kategori='error';
    		$pesan="Gagal";
    	}
    	return redirect(route('kabupaten.tambah'))->with($kategori,$pesan);	
    }

    public function edit_kabupaten($id){
    	$user=User::find($id);
    	return view('super.kabupaten.edit',compact('user'));
    }

    public function updateKabupaten(Request $request,$id){
    	$user=User::find($id);
    	$user->name=$request->input('nama');
    	$user->username=$request->input('username');
    	$user->email=$request->input('email');
    	$user->kategori='kabupaten';
    	$user->password=$request->input('password')!=''?bcrypt($request->input('password')):$user->password;
    	if($user->save()){
            $kategori='success';
            $pesan="Tersimpan";
        }else{
            $kategori='error';
            $pesan="Gagal";
        }
    	return redirect(route('kabupaten.edit',$id))->with($kategori,$pesan);	
    }

    //OPD CRUD
    public function opd(){
    	return view('super.opd.index');
    }

    public function tambah_opd(){
    	$user= new User();
    	return view('super.opd.tambah',compact('user'));
    }

    public function storeOpd(Request $request){
    	$user = new User();
    	$user->name=$request->input('nama');
    	$user->username=$request->input('username');
    	$user->email=$request->input('email');
    	$user->kategori='opd';
    	$user->password=bcrypt($request->input('password'));
    	if($user->save()){
            $kategori='success';
            $pesan="Tersimpan";
        }else{
            $kategori='error';
            $pesan="Gagal";
        }
    	return redirect(route('opd.tambah'))->with($kategori,$pesan);
    }

    public function edit_opd($id){
    	$user=User::find($id);
    	return view('super.opd.edit',compact('user'));
    }

    public function updateOpd(Request $request,$id){
    	$user=User::find($id);
    	$user->name=$request->input('nama');
    	$user->username=$request->input('username');
    	$user->email=$request->input('email');
    	$user->kategori='opd';
    	$user->password=$request->input('password')!=''?bcrypt($request->input('password')):$user->password;
    	if($user->save()){
            $kategori='success';
            $pesan="Tersimpan";
        }else{
            $kategori='error';
            $pesan="Gagal";
        }
    	return redirect(route('opd.edit',$id))->with($kategori,$pesan);
    }

    //UPP CRUD
    public function upp(){
        $users=User::find(1);
        $i=1;
        return view('super.upp.index',compact('users','i'));
    }

    public function tambah_upp(){
        $user= new Upp();
        return view('super.upp.tambah',compact('user'));
    }

    public function storeUpp(Request $request){
        $user = new Upp();
        $user->nama=$request->input('nama');
        $user->user_id=1;
        if($user->save()){
            $kategori='success';
            $pesan="Tersimpan";
        }else{
            $kategori='error';
            $pesan="Gagal";
        }
        return redirect(route('upp.tambah'))->with($kategori,$pesan);
    }

    public function edit_upp($id){
        $user=User::find($id);
        return view('super.upp.edit',compact('user'));
    }

    public function updateUpp(Request $request,$id){
        $user=Upp::find($id);
        $user->nama=$request->input('nama');
        if($user->save()){
            $kategori='success';
            $pesan="Tersimpan";
        }else{
            $kategori='error';
            $pesan="Gagal";
        }
        return redirect(route('upp.edit',$id))->with($kategori,$pesan);
    }
    //Kuesioner CRUD

    public function kuesioner(){
        $kuesioner=Upp::find(1)->kuesioner;
        $i=1;
        return view('super.kuesioner.index',compact('kuesioner','i'));
    }

    public function tambah_kuesioner(){
        $kuesioner= new Kuesioner();
        // return ([$kuesioner]);
        return view('super.kuesioner.tambah',compact('kuesioner'));
    }

    public function storekuesioner(Request $request){
        $k = new Kuesioner();
        $k->pertanyaan=$request->input('pertanyaan');
        $k->upp_id=1;
        if($k->save()){
            $kategori='success';
            $pesan="Tersimpan";
        }else{
            $kategori='error';
            $pesan="Gagal";
        }
        return redirect(route('kuesioner.tambah'))->with($kategori,$pesan);
    }

    public function edit_kuesioner($id){
        $kuesioner=Kuesioner::find($id);
        return view('super.kuesioner.edit',compact('kuesioner'));
    }

    public function updatekuesioner(Request $request,$id){
        $k=Kuesioner::find($id);
        $k->pertanyaan=$request->input('pertanyaan');
        $k->upp_id=1;
        if($k->save()){
            $kategori='success';
            $pesan="Tersimpan";
        }else{
            $kategori='error';
            $pesan="Gagal";
        }
        return redirect(route('kuesioner.edit',$id))->with($kategori,$pesan);
    }

    public function previewkuesioner(){
        $kuesioner=Upp::find(1)->kuesioner;
        $i=1;
        return view('super.kuesioner.preview',compact('kuesioner','i'));
    }

    public function responden(){
        $r=Responden::all();
        $i=1;
        return view('super.responden.index',compact('r','i'));
    }

    public function tambah_responden(){
        $r=new Responden();
        // return ([$responden]);
        return view('super.responden.tambah',compact('r'));
    }

    public function storeresponden(Request $request){
        $r = new Responden();
        $r->pertanyaan=$request->input('pertanyaan');
        $r->upp_id=1;
        if($r->save()){
            $kategori='success';
            $pesan="Tersimpan";
        }else{
            $kategori='error';
            $pesan="Gagal";
        }
        return redirect(route('responden.tambah'))->with($kategori,$pesan);
    }

    public function edit_responden($id){
        $responden=responden::find($id);
        return view('super.responden.edit',compact('responden'));
    }

    public function updateresponden(Request $request,$id){
        $r=Responden::find($id);
        $r->pertanyaan=$request->input('pertanyaan');
        $r->upp_id=1;
        if($r->save()){
            $kategori='success';
            $pesan="Tersimpan";
        }else{
            $kategori='error';
            $pesan="Gagal";
        }
        return redirect(route('responden.edit',$id))->with($kategori,$pesan);
    }

    public function jawabkuesioner(){
        $kuesioner=Upp::find(1)->kuesioner;
        $i=1;
        return view('super.jawaban._form',compact('kuesioner','i'));
    }
    public function jawabStore(Request $request){
        foreach ($request->input('kues') as $hsl){
            $jawab=new Jawaban();
            $jawab->responden_id=1;
            $jawab->kuesioner_id=1;
            $jawab->jawaban=$hsl;    
            $jawab->save();
        }
        return ($jawab);
    }

}
