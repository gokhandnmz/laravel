<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hizmet;
use App\Models\Proje;
use App\Models\Haber;
use App\Models\Sayfa;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class AppController extends Controller
{
    public function index(){
        return view('theme.home');
    }
    public function hakkimizda(){
        return view('theme.hakkimizda');
    }
    public function hizmetlerimiz(){
        return view('theme.hizmetlerimiz');
    }
    public function hizmet_detay( $slug ){
        try {
            $item = Hizmet::where('slug', $slug)->first();
            $hizmetler = Hizmet::where('durum', 1)->get();
            if( $item )
                return view('theme.hizmet_detay', compact( 'item', 'hizmetler' ));
            else
                return redirect('/');
        } catch (\Throwable $th) {
            return redirect('/');
        }
    }
    public function projeler(){
        return view('theme.projeler');
    }
    public function proje_detay( $slug ){
       try {
            $item = Proje::where('slug', $slug)->first();
            $projeler = Proje::where('durum', 1)->get();
            if( $item )
                return view('theme.proje_detay', compact( 'item', 'projeler' ));
            else
                return redirect('/');
       } catch (\Throwable $th) {
            return redirect('/');
       }
    }
    public function haberler(){
        return view('theme.haberler');
    }
    public function haber_detay( $slug ){
       try {
            $item = Haber::where('slug', $slug)->first();
            $haberler = Haber::where('durum', 1)->get();
            if( $item )
                return view('theme.haber_detay', compact( 'item', 'haberler' ));
            else
                return redirect('/');
       } catch (\Throwable $th) {
            return redirect('/');
       }
    }
    public function referanslar(){
        $images = DB::table('uploads')->where('table_name', 'referans')->get();
        return view('theme.referans', compact( 'images' ));
    }
    public function iletisim(){
        return view('theme.iletisim');
    }
    public function iletisim_formu(Request $request){
        try {
            $data = $request->data;
            Mail::send('theme.emailTemplate', $data, function($message){
                $message->to('gokhan@rethasoft.com');
                $message->subject('İletişim Formu');
            });
        return redirect()->back()->with('success', 'E-posta başarıyla gönderildi!');
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors('E-posta gönderimi başarısiz. Lütfen site yöneticisi ile iletişime geçiniz.');
        }
    }

    public function sabit_sayfalar($slug){
        try {
            $sayfa = Sayfa::where('slug', $slug)->first();
            if( $sayfa )
                return view('theme.sabit_sayfa', compact( 'sayfa' ));
            else
                return redirect('/');
        } catch (\Throwable $th) {
            return redirect('/');
        }
    }
}
