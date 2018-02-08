<?php

namespace App\Http\Controllers\Home;

use App\Http\Requests\UserUpdate;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * @param User $user
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @author liutao
     * 用户信息 个人中心管
     */
    public function show(User $user)
    {
        //
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
        return view('users.edit', compact('user'));
    }

    /**
     * @param UserUpdate $request
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     * @author liutao
     * 更新用户信息
     */
    public function update(UserUpdate $request, User $user)
    {
        //
        $user->update($request->all());
        return redirect()->route('users.show', $user->id)->with('success', '个人资料更新成功！');
    }

}
