<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sayfa;

class SayfaController extends Controller
{
    public function __construct(){
        $this->sayfa = new Sayfa;
        $this->url = 'admin/sayfa';
    }
    public function index(){
        $list = $this->sayfa->list();
        $url = $this->url;
        return view('admin.theme.sayfa.list', compact( 'url', 'list' ));
    }
    public function store(Request $request, $id = 0){
        if( $id > 0 ) // id sıfırdan büyükse güncelleme işlemi yap
            $response = $this->sayfa->store( $request, $id );
        else // id sıfırdan büyük değilse yeni kayıt oluştur
            $response = $this->sayfa->store($request);
            
        if( $response ){
            return redirect()->back()->with( 'success', ' İşlem Başarılı! ' );
        }
        else{        
            return redirect()->back()->withError('İşlem Başarısız!');
        }
    }
    public function add( ){
        $url = $this->url;
        return view( 'admin.theme.sayfa.add', compact( 'url' ) );
    }
    public function update( $id ){
        $item = Sayfa::find( $id );
        $url = $this->url;
        return view( 'admin.theme.sayfa.update', compact( 'item', 'url' ) );
    }
    public function destroy( $id ){
        $response = $this->sayfa->del( $id );
        if( $response ){
            return redirect()->back()->with( 'success', ' İşlem Başarılı! ' );
        }
        else{        
            return redirect()->back()->withError('İşlem Başarısız!');
        }
    }
}
