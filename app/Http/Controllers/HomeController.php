<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Thongtin;
use App\Models\ThongtinDel;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $paginator = Thongtin::orderBy('id', 'desc')->paginate(10);
        return view('home')->with(compact('paginator'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function kichhoat($id)
    {
        //
        $thongtin = Thongtin::find($id);
        $thongtin->status = 1;
        $thongtin->save();
        return back()->with('success', 'Thay đổi thành công');
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function vohieu($id)
    {
        //
         $thongtin = Thongtin::find($id);
        $thongtin->status = 0;
        $thongtin->save();
        return back()->with('success', 'Thay đổi thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $data = Thongtin::find($id);

        $thongtin = new ThongtinDel();
        $thongtin->id_game = $data->id_game;
        $thongtin->loai_the = $data->loai_the;
        $thongtin->menh_gia = $data->menh_gia;
        $thongtin->seri = $data->seri;
        $thongtin->ma_the = $data->ma_the;
        $thongtin->status = $data->status;
        $thongtin->save();

        $data->delete();


        return back()->with('success', 'Xóa thành công');
    }
}
