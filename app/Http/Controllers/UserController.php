<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class UserController extends Controller
{
    // Thêm kiểu trả về là View
    public function getAllUsers()
    {
        $users = DB::table('users')->get();
        return view('Users.Userlist', ['users' => $users]);
    }
    public function add(){
        return view('Users.UserAdd');
    }
    public function save(Request $request)
    {
        try {

            $validatedData = $request->validate([
                'Name' => 'required|string|max:255',
                'Phone' => 'required|string|max:15',
                'Email' => 'required|string|email|max:255|unique:users',
                'Password' => 'required|string|min:6',
                'Address' => 'nullable|string|max:255',
                'Role' => 'required|string|in:user,admin',
            ]);

            $validatedData['Password'] = bcrypt($validatedData['Password']);


            DB::table('users')->insert([
                'name' => $validatedData['Name'],
                'phone' => $validatedData['Phone'],
                'email' => $validatedData['Email'],
                'password' => $validatedData['Password'],
                'address' => $validatedData['Address'],
                'role' => $validatedData['Role'],
            ]);


            return redirect()->route('user.list')->with('success', 'User added successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['msg' => 'Failed to add user: ' . $e->getMessage()]);
        }
    }
    public function edit($id){
        $user = DB::table('users')->where('id', $id)->first();

        return view('Users.UserEdit', ['user' => $user]);
    }

    public function update(\Illuminate\Http\Request $request) {
        // Lấy ID từ request
        $id = $request->input('id'); // Hoặc bạn có thể truyền $id vào phương thức

        // Xác thực dữ liệu đầu vào
        $validatedData = $request->validate([
            'Name' => 'required|string|max:255',
            'Phone' => 'required|string|max:15',
            'Email' => 'required|string|email|max:255|unique:users,Email,' . $id,
            'Address' => 'nullable|string|max:255',
            'Role' => 'required|string|in:user,admin',
        ]);

        // Cập nhật thông tin người dùng
        DB::table('users')->where('id', $id)->update([
            'Name' => $validatedData['Name'],
            'Phone' => $validatedData['Phone'],
            'Email' => $validatedData['Email'],
            'Address' => $validatedData['Address'],
            'Role' => $validatedData['Role'],
        ]);

        // Chuyển hướng về danh sách người dùng với thông báo thành công
        return redirect()->route('user.list')->with('success', 'User updated successfully!');
    }




    public function delete($id){
        DB::table('users')->where('id', $id)->delete();
        return redirect()->route('user.list')->with('success', 'User deleted successfully!');
    }





}
