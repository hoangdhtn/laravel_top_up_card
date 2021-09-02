<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Thongtin;

class NapTheController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('trangchu');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data = $request->validate([
            'card_type' => 'required',
            'card_amount' => 'required',
            'seri' => 'required',
            'ma_the' => 'required',
            'idgame' => 'required',
        ], [
            'card_type.required' => 'Yêu cầu thể loại card',
            'card_amount.required' => 'Yêu cầu tiền thoại card',
            'seri.required' => 'Yêu cầu seri card',
            'ma_the.required' => 'Yêu cầu mã thẻ card',
            'idgame.required' => 'Yêu cầu ID Game',
        ]);

        //dd($data);
        $thongtin = new Thongtin();
        $thongtin->id_game = $data['idgame'];
        $thongtin->loai_the = $data['card_type'];
        $thongtin->menh_gia = $data['card_amount'];
        $thongtin->seri = $data['seri'];
        $thongtin->ma_the = $data['ma_the'];
        $thongtin->status = 0;
        $thongtin->save();
        return back()->with('success', 'Yêu cần bạn đang được phê duyệt! Sau khi xong đá quý sẽ được chuyển.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
    }
}
