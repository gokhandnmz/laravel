<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Lang;

class LangController extends Controller
{
    public function __construct(){
        $this->lang = new Lang;
        $this->url = 'admin/lang';
    }
    public function index(){
        $list = $this->lang->list();
        $url = $this->url;
        return view('admin.theme.lang.list', compact( 'url', 'list' ));
    }
    public function store(Request $request, $id = 0){
        if( $id > 0 ) // id sıfırdan büyükse güncelleme işlemi yap
            $response = $this->lang->store( $request );
        else // id sıfırdan büyük değilse yeni kayıt oluştur
            $response = $this->lang->store($request);
            
        if( $response ){
            return redirect()->back()->with( 'success', ' İşlem Başarılı! ' );
        }
        else{        
            return redirect()->back()->withError('İşlem Başarısız!');
        }
    }
    public function add( ){
        $url = $this->url;
        $list = $this->lang->list();
        return view( 'admin.theme.lang.add', compact( 'url', 'list' ) );
    }
    public function update( $id ){
        $item = Lang::find( $id );
        $list = $this->lang->list();
        $url = $this->url;
        return view( 'admin.theme.lang.update', compact( 'item', 'url', 'list' ) );
    }
    public function destroy( Request $request, $id ){
        $this->lang->del( $id );
    }
}
