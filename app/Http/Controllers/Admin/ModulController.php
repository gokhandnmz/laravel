<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Modul;

class ModulController extends Controller
{
    public function __construct(){
        $this->modul = new Modul;
        $this->url = 'admin/modul';
    }
    public function index(){
        $list = $this->modul->list();
        $url = $this->url;
        return view('admin.theme.modul.list', compact( 'url', 'list' ));
    }
    public function store(Request $request, $id = 0){
        if( $id > 0 ) // id sıfırdan büyükse güncelleme işlemi yap
            $response = $this->modul->store( $request, $id );
        else // id sıfırdan büyük değilse yeni kayıt oluştur
            $response = $this->modul->store($request);
            
        if( $response ){
            return redirect()->back()->with( 'success', ' İşlem Başarılı! ' );
        }
        else{        
            return redirect()->back()->withError('İşlem Başarısız!');
        }
    }
    public function add( ){
        $url = $this->url;
        $table_list = $this->modul->table_list();
        return view( 'admin.theme.modul.add', compact( 'url', 'table_list' ) );
    }
    public function update( $id ){
        $item = Modul::find( $id );
        $url = $this->url;
        $table_list = $this->modul->table_list();
        return view( 'admin.theme.modul.update', compact( 'item', 'url', 'table_list' ) );
    }
    public function destroy( $id ){
        $response = $this->modul->del( $id );
        if( $response ){
            return redirect()->back()->with( 'success', ' İşlem Başarılı! ' );
        }
        else{        
            return redirect()->back()->withError('İşlem Başarısız!');
        }
    }
}
