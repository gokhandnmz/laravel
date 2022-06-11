<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;

class SliderController extends Controller
{
    public function __construct(){
        $this->slider = new Slider;
        $this->url = 'admin/slider';
    }
    public function index(){
        $list = $this->slider->list();
        $url = $this->url;
        return view('admin.theme.slider.list', compact( 'url', 'list' ));
    }
    public function store(Request $request, $id = 0){
        if( $id > 0 ) // id sıfırdan büyükse güncelleme işlemi yap
            $response = $this->slider->store( $request, $id );
        else // id sıfırdan büyük değilse yeni kayıt oluştur
            $response = $this->slider->store($request);
            
        if( $response ){
            return redirect()->back()->with( 'success', ' İşlem Başarılı! ' );
        }
        else{        
            return redirect()->back()->withError('İşlem Başarısız!');
        }
    }
    public function add( ){
        $url = $this->url;
        $pages = $this->slider->sliderPages();
        return view( 'admin.theme.slider.add', compact( 'url', 'pages' ) );
    }
    public function update( $id ){
        $item = Slider::find( $id );
        $url = $this->url;
        return view( 'admin.theme.slider.update', compact( 'item', 'url' ) );
    }
    public function destroy( $id ){
        $response = $this->slider->del( $id );
        if( $response ){
            return redirect()->back()->with( 'success', ' İşlem Başarılı! ' );
        }
        else{        
            return redirect()->back()->withError('İşlem Başarısız!');
        }
    }
}
