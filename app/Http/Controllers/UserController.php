<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // Hiển thị danh sách tất cả người dùng
    public function index()
    {   
        // Kiểm tra nếu người dùng không phải là admin
        // if (auth()->user()->role !== 'Admin') {
        // return redirect('/error')->with('error', 'Bạn không có quyền truy cập.');
        // }

        $users = User::all();
        return view('users.index', compact('users'));
    }

    // Hiển thị form tạo người dùng mới
    public function create()
    {
        return view('users.create');
    }

    // Lưu người dùng mới vào cơ sở dữ liệu
    public function store(Request $request)
{
    // Validate dữ liệu trước khi lưu
    $validatedData = $request->validate([
        'name' => 'required|string|max:255|',
        'email' => 'required|string|email|max:255|unique:users', // Lưu ý sửa bảng thành `users` đúng với tên bảng
        'password' => 'required|string|min:8',  // Đảm bảo mật khẩu có ít nhất 8 ký tự
        'role' => 'required|string',
    ]);

    
    User::create([
        'name' => $validatedData['name'],
        'email' => $validatedData['email'],
        'password' => bcrypt($validatedData['password']),  // Mã hóa mật khẩu trước khi lưu
        'role' => $validatedData['role'],
    ]);
    

    // Sau khi tạo, chuyển hướng về trang danh sách với thông báo thành công
    return redirect()->route('users.index')->with('success', 'Người dùng đã được thêm thành công!');
}

    // Hiển thị form chỉnh sửa người dùng
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    // Cập nhật người dùng trong cơ sở dữ liệu
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255|regex:/^[a-zA-Z0-9\s-_]+$/',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            // 'password' => 'nullable|string|min:6|confirmed',
            'role' => 'required|string|max:255',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;


        // // Kiểm tra nếu người dùng có cập nhật mật khẩu thì mã hóa và lưu
        // if ($request->filled('password')) {
        //     $user->password = Hash::make($request->password);
        // }

        $user->save();

        return redirect()->route('users.index')->with('success', 'Người dùng đã được cập nhật thành công!');
    }

    // Xóa người dùng khỏi cơ sở dữ liệu
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'Người dùng đã được xóa thành công!');
    }

}
