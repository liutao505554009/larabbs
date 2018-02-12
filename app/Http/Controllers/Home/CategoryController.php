<?php

namespace App\Http\Controllers\Home;

use App\Models\Category;
use App\Models\Topic;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    //
    public function show(Category $category, Request $request, User $user)
    {
        // 读取分类 ID 关联的话题，并按每 20 条分页
        $topics = Topic::withOrder($request->order)->where('category_id', $category->id)->paginate(20);

        // 活跃用户列表
        $active_users = $user->getActiveUsers();

        // 传参变量话题和分类到模板中
        return view('topics.index', compact('topics', 'category', 'active_users'));
    }
}
