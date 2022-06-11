<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kategori;

class KategoriController extends Controller
{
    public function __construct(){
        $this->kategori = new Kategori;
        $this->url = 'admin/kategori';
    }
    public function index(){
        $list = $this->kategori->parent();
        $url = $this->url;
        return view('admin.theme.kategori.list', compact( 'url', 'list' ));
    }
    public function store(Request $request, $id = 0){
        if( $id > 0 ) // id sıfırdan büyükse güncelleme işlemi yap
            $response = $this->kategori->store( $request, $id );
        else // id sıfırdan büyük değilse yeni kayıt oluştur
            $response = $this->kategori->store($request);
            
        if( $response ){
            return redirect()->back()->with( 'success', ' İşlem Başarılı! ' );
        }
        else{        
            return redirect()->back()->withError('İşlem Başarısız!');
        }
    }
    public function add( ){
        $url = $this->url;
        $list = $this->kategori->parent();
        return view( 'admin.theme.kategori.add', compact( 'url', 'list' ) );
    }
    public function update( $id ){
        $item = Kategori::find( $id );
        $list = $this->kategori->parent();
        $url = $this->url;
        return view( 'admin.theme.kategori.update', compact( 'item', 'url', 'list' ) );
    }
    public function destroy( $id ){
        $response = $this->kategori->del( $id );
        if( $response ){
            return redirect()->back()->with( 'success', ' İşlem Başarılı! ' );
        }
        else{        
            return redirect()->back()->withError('İşlem Başarısız!');
        }
    }
}
