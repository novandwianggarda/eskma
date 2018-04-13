<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Input;
use App\User;
use App\Upp;
use App\Provinsi;
use App\Kabupaten;
use App\Opdprovinsi;
use App\Opdkabupaten;
use App\Responden;
use App\Kuesioner;
use App\Jawaban;
use App\Unsur;
use Auth;
class SuperController extends Controller
{

    //profil

    public function profil(){
        $user=Auth::user();
        $k=Auth::user()->provinsi->nama;
        return view('super.profil.profil',compact('user','k'));
    }
    //Kabupaten CRUD

    public function kabupaten(){
        $user=User::where('kategori','kabupaten')->get();
        $i=1;
    	return view('super.kabupaten.index',compact('user','i'));
    }

    public function tambah_kabupaten(){
    	$user= new User();
        $k='';
    	return view('super.kabupaten.tambah',compact('user','k'));
    }

    public function storeKabupaten(Request $request){
    	$user = new User();
    	$user->name=$request->input('username');
    	$user->email=$request->input('email');
    	$user->kategori='kabupaten';
    	$user->password=bcrypt($request->input('password'));
    	if($user->save()){
            $k=new Kabupaten();
            $k->nama=$request->input('nama');
            $k->user_id=$user->id;
            $k->provinsi_id=Auth::user()->provinsi->id;
            $k->save();
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
        $k=$user->kabupaten->nama;
    	return view('super.kabupaten.edit',compact('user','k'));
    }

    public function updateKabupaten(Request $request,$id){
    	$user=User::find($id);
    	$user->name=$request->input('username');
    	$user->email=$request->input('email');
    	$user->kategori='kabupaten';
    	$user->password=$request->input('password')!=''?bcrypt($request->input('password')):$user->password;
    	if($user->save()){
            $user->kabupaten->nama=$request->input('nama');
            $user->kabupaten->save();
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
      if (Auth::user()->kategori=="provinsi") {
        $user=Auth::user()->provinsi->opdprovinsi;
        $i=1;
        return view('super.opd.index',compact('user','i'));
      }else {
        $user=Auth::user()->kabupaten->opdkabupaten;
        $i=1;
        return view('kabupaten.opd.index',compact('user','i'));
      }
    }

    public function tambah_opd(){
    	$user= new User();
        $opd='';
    	return view('super.opd.tambah',compact('user','opd'));
    }

    public function storeOpd(Request $request){
    	$user = new User();
    	$user->name=$request->input('username');
    	$user->email=$request->input('email');
    	$user->kategori='opd';
    	$user->password=bcrypt($request->input('password'));
    	if($user->save()){
            $opd=new Opdprovinsi();
            $opd->nama=$request->input('nama');
            $opd->user_id=$user->id;
            $opd->provinsi_id=Auth::user()->provinsi->id;
            $opd->save();
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
        $opd=$user->opdprovinsi->nama;
    	return view('super.opd.edit',compact('user','opd'));
    }

    public function updateOpd(Request $request,$id){
    	$user=User::find($id);
    	$user->name=$request->input('username');
    	$user->email=$request->input('email');
    	$user->kategori='opd';
    	$user->password=$request->input('password')!=''?bcrypt($request->input('password')):$user->password;
    	if($user->save()){
            $user->opdprovinsi->nama=$request->input('nama');
            $user->opdprovinsi->save();
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
        $users=Upp::all();
        $i=1;
        return view('super.upp.index',compact('users','i'));
    }

    public function tambah_upp(){
        $user= new Upp();
        return view('super.upp.tambah',compact('user'));
    }
    public function storeUpp(Request $request){
        $user = new User();
        $user->name=$request->input('username');
        $user->email=$request->input('email');
        $user->kategori='upp';
        $user->password=bcrypt($request->input('password'));
        if($user->save()){
            $upp=new Upp();
            $upp->nama=$request->input('nama');
            $upp->user_id=$user->id;
            $upp->provinsi_id=Auth::user()->provinsi->id;
            $upp->save();
            $kategori='success';
            $pesan="Tersimpan";
        }else{
            $kategori='error';
            $pesan="Gagal";
        }
        return redirect(route('upp.tambah'))->with($kategori,$pesan);
    }


    public function edit_upp($id){
        $user=Upp::find($id);
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

    public function kuesioner($id){
        $kuesioner=Upp::find($id)->kuesioner;
        $i=1;
        return view('super.kuesioner.index',compact('kuesioner','i','id'));
    }

    public function tambah_kuesioner($id){
        $kuesioner= new Kuesioner();
        $unsur=Unsur::where('id','<>',99)->get();
        $i=1;
        // return ([$unsur->first()->templatekues->pertanyaan]);
        return view('super.kuesioner.tambah',compact('kuesioner','id','unsur','i'));
    }

    public function storekuesioner(Request $request,$id){
        foreach ($request->input('pertanyaan') as $p) {
            # code...
            foreach ($p['pertanyaan'] as $hsl) {
                # code...
                $k = new Kuesioner();
                $k->pertanyaan=$hsl;
                $k->upp_id=$id;
                $k->kategori=$p['kategori'];
                $k->unsur_id=$p['unsur_id'];
                if($k->save()){
                    $kategori='success';
                    $pesan="Tersimpan";
                }else{
                    $kategori='error';
                    $pesan="Gagal";
                    exit();
                }
            }
            // print_r($k);
        }
        // exit();die();
        return redirect(route('kuesioner.index',['id'=>$k->upp_id]))->with($kategori,$pesan);
    }

    public function edit_kuesioner($id){
        $kuesioner=Kuesioner::find($id);
        return view('super.kuesioner.edit',compact('kuesioner'));
    }

    public function updatekuesioner(Request $request,$id){
        $k=Kuesioner::find($id);
        $k->pertanyaan=$request->input('pertanyaan');
        if($k->save()){
            $kategori='success';
            $pesan="Tersimpan";
        }else{
            $kategori='error';
            $pesan="Gagal";
        }
        return redirect(route('kuesioner.index',$k->upp->id))->with($kategori,$pesan);
    }

    public function previewkuesioner($id){
        $kuesioner=Upp::find($id)->kuesioner;
        $i=1;
        $kabupaten=Kabupaten::all()->pluck('nama','id');
        $preview=true;
        return view('super.kuesioner.preview',compact('kuesioner','i','preview','kabupaten'));
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

    public function jawabkuesioner($id){
        $kuesioner=Upp::find($id)->kuesioner;
        $i=1;
        $kabupaten=Kabupaten::all()->pluck('nama','id');
        $preview=false;
        return view('super.kuesioner.preview',compact('kuesioner','i','kabupaten','preview'));
    }
    public function jawabStore(Request $request){
        $responden=new Responden();
        $responden->nip=$request->input('nik');
        $responden->nama=$request->input('nama');
        $responden->kabupaten=$request->input('kabupaten');
        $responden->umur=$request->input('umur');
        $responden->pendidikan=$request->input('pendidikan');
        $responden->pekerjaan=$request->input('pekerjaan');
        $responden->save();
        foreach ($request->input('kues') as $hsl){
            $jawab = new Jawaban();
            $jawab->responden_id=$responden->id;
            $jawab->kuesioner_id=$hsl["kuesioner_id"];
            $jawab->kinerja=$hsl["kinerja"];
            $jawab->kepentingan=$hsl["kepentingan"];
            $jawab->save();
        }
        $jawab=Jawaban::all();
        return ($jawab);
    }

    public function search()
    {
        return (Input::get('upp'));
        // do things with them...
    }

    public function reportkuesioner(){
        $kuesioner=Kuesioner::all();
        $i=1;
        return view('super.report.kuesioner.index',compact('kuesioner','i','id'));
    }
    public function reportlaporan(){
        $kuesioner=Kuesioner::all();
        $i=1;
        return view('super.report.laporan.index',compact('kuesioner','i','id'));
    }
}
