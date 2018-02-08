<?php

namespace App\Http\Controllers\Home;

use App\Handlers\ImageUploadHandler;
use App\Http\Requests\UserUpdate;
use App\Models\User;
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
     * @param ImageUploadHandler $uploader
     * @return \Illuminate\Http\RedirectResponse
     * @author liutao
     * 更新用户信息
     */
    public function update(UserUpdate $request, User $user, ImageUploadHandler $uploader)
    {
        $data = $request->all();
        //
        if ($request->hasFile('avatar')) {
            $result = $uploader->save($request->avatar, 'avatars', $user->id, 362);
            if ($result) {
                $data['avatar'] = $result['path'];
            }
        }
        $user->update($data);
        return redirect()->route('users.show', $user->id)->with('success', '个人资料更新成功！');
    }

}
