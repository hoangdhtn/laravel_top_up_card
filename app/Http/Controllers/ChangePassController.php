<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class ChangePassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $data = User::find($id);
        return view('changepass')->with(compact('data'));
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
         $data = $request->validate([
            'old_pass' => 'required',
            'new_pass' => 'required|min:8',
        ], [
            'old_pass.required' => 'Yêu cầu mật khẩu cũ',
            'new_pass.required' => 'Yêu cầu mật khẩu mới',
        ]);

        $user_mail = User::find($id)->email;
        if (Auth::attempt(['email' => $user_mail , 'password' => $data['old_pass']])) {
            // email admin mới được xác thực thành công 
            User::find($id)->update([
                'password' => Hash::make($data['new_pass']),
            ]);
            return back()->with('success', 'Đổi mật khẩu thành công');
        }
        else{
            return back()->with('success', 'Mật khẩu cũ không đúng');
        }
        
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
