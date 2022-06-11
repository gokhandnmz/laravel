<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bakim;

class BakimController extends Controller
{
    
    public function __construct(){
        $this->bakim = new Bakim;
        $this->url = 'admin/bakim';
    }
    public function index(){
        $list = $this->bakim->list();
        $url = $this->url;
        return view('admin.theme.bakim.list', compact( 'url', 'list' ));
    }
    public function store(Request $request, $id = 0){
        if( $id > 0 ) // id sıfırdan büyükse güncelleme işlemi yap
            $response = $this->bakim->store( $request, $id );
        else // id sıfırdan büyük değilse yeni kayıt oluştur
            $response = $this->bakim->store($request);
            
        if( $response ){
            return redirect()->back()->with( 'success', ' İşlem  Başarılı ' );
        }
        else{        
            return redirect()->back()->withError(' İşlem  Başarısız ');
        }
    }
    public function add( ){
        $url = $this->url;
        $musteriler = $this->bakim->musteriList();
        return view( 'admin.theme.bakim.add', compact( 'url', 'musteriler' ) );
    }
    public function update( $id ){
        $item = Bakim::find( $id );
        $musteriler = $this->bakim->musteriList();
        $url = $this->url;
        return view( 'admin.theme.bakim.update', compact( 'item', 'url', 'musteriler' ) );
    }
    public function destroy( $id ){
        $response = $this->bakim->del( $id );
        if( $response ){
            return redirect()->back()->with( 'success', ' İşlem  Başarılı ' );
        }
        else{        
            return redirect()->back()->withError(' İşlem  Başarısız ');
        }
    }
}
