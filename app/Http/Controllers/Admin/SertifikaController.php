<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sertifika;

class SertifikaController extends Controller
{
    public function __construct(){
        $this->sertifika = new Sertifika;
        $this->url = 'admin/sertifika';
    }
    public function index(){
        $images = $this->sertifika->list();
        $url = $this->url;
        return view('admin.theme.sertifika.list', compact( 'url', 'images' ));
    }
    public function store(Request $request){
        $response = $this->sertifika->store($request);
        if( $response ){
            return redirect()->back()->with( 'success', ' İşlem Başarılı! ' );
        }
        else{        
            return redirect()->back()->withError('İşlem Başarısız!');
        }
    }
    public function add( ){
        $url = $this->url;
        return view( 'admin.theme.sertifika.add', compact( 'url' ) );
    }
    public function update( $id ){
        $item = Sertifika::find( $id );
        $url = $this->url;
        return view( 'admin.theme.sertifika.update', compact( 'item', 'url' ) );
    }
    public function destroy( $id ){
        $response = $this->sertifika->del( $id );
        if( $response ){
            return redirect()->back()->with( 'success', ' İşlem Başarılı! ' );
        }
        else{        
            return redirect()->back()->withError('İşlem Başarısız!');
        }
    }
}
