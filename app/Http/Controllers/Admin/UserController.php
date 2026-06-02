<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = DB::table('users')->get();

        $html = '
        <html>
        <head>
            <title>Danh sách User</title>

            <style>
                body{
                    font-family: Arial, sans-serif;
                    background: #f1f5f9;
                    padding: 30px;
                }

                .container{
                    max-width: 1200px;
                    margin: auto;
                    background: white;
                    padding: 30px;
                    border-radius: 15px;
                }

                h1{
                    margin-bottom: 20px;
                }

                .btn-add{
                    display:inline-block;
                    padding:10px 15px;
                    background:#16a34a;
                    color:white;
                    text-decoration:none;
                    border-radius:5px;
                    margin-bottom:20px;
                }

                table{
                    width:100%;
                    border-collapse:collapse;
                }

                th, td{
                    border:1px solid #ccc;
                    padding:10px;
                    text-align:left;
                }

                th{
                    background:#2563eb;
                    color:white;
                }
            </style>
        </head>

        <body>

        <div class="container">

            <h1>Danh sách User</h1>

            <a class="btn-add" href="/admin/users/create">
                + Thêm User
            </a>
            <a class="btn-add"
   href="/admin/dashboard"
   style="background:#64748b; margin-left:10px;">

    Quay lại Dashboard

</a>

            <table>

                <tr>
                    <th>ID</th>
                    <th>Họ tên</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Role</th>
                    <th>Status</th>
                    <th>Chức năng</th>
                </tr>
        ';

        foreach($users as $item){

            $html .= '
                <tr>
                    <td>'.$item->id.'</td>
                    <td>'.$item->fullname.'</td>
                    <td>'.$item->username.'</td>
                    <td>'.$item->email.'</td>
                    <td>'.$item->phone.'</td>
                    <td>'.$item->role.'</td>
                    <td>'.$item->status.'</td>
                    <td>
    <a href="/admin/users/'.$item->id.'/edit">
        Sửa
    </a>
    <form method="POST"
      action="/admin/brands/'.$item->id.'"
      style="display:inline-block;">

    <input type="hidden"
           name="_token"
           value="'.csrf_token().'">

    <input type="hidden"
           name="_method"
           value="DELETE">

    <button type="submit">
        Xóa
    </button>

</form>
</td>
                </tr>
            ';
        }

        $html .= '
            </table>

        </div>

        </body>
        </html>
        ';

        return $html;
    }

 public function create()
{
    return '
    <html>
    <head>
        <title>Thêm User</title>

        <style>
            body{
                font-family: Arial, sans-serif;
                background:#f1f5f9;
                padding:30px;
            }

            .container{
                max-width:700px;
                margin:auto;
                background:white;
                padding:30px;
                border-radius:15px;
            }

            input{
                width:100%;
                padding:10px;
                margin-top:5px;
                margin-bottom:15px;
                box-sizing:border-box;
            }

            .btn{
                padding:10px 15px;
                border:none;
                border-radius:5px;
                cursor:pointer;
                text-decoration:none;
                display:inline-block;
            }

            .btn-save{
                background:#2563eb;
                color:white;
            }

            .btn-back{
                background:#64748b;
                color:white;
                margin-left:10px;
            }
        </style>
    </head>

    <body>

        <div class="container">

            <h2>Thêm User</h2>

            <form method="POST" action="/admin/users">

                <input type="hidden" name="_token" value="'.csrf_token().'">

                <label>Họ tên</label>
                <input type="text" name="fullname" required>

                <label>Username</label>
                <input type="text" name="username" required>

                <label>Email</label>
                <input type="email" name="email" required>

                <label>Password</label>
                <input type="text" name="password" required>

                <label>Phone</label>
                <input type="text" name="phone" required>

                <button type="submit" class="btn btn-save">
                    Lưu
                </button>

                <a href="/admin/users" class="btn btn-back">
                    Quay lại
                </a>

            </form>

        </div>

    </body>
    </html>
    ';
}

public function store(Request $request)
{
    DB::table('users')->insert([
        'fullname' => $request->fullname,
        'username' => $request->username,
        'email' => $request->email,
        'password' => $request->password,
        'phone' => $request->phone,
        'address' => '',
        'gender' => 1,
        'birthday' => '2000-01-01',
        'role' => 1,
        'status' => 1,
        'created_at' => now(),
        'updated_at' => now()
    ]);

    return redirect('/admin/users');
}

    public function show(string $id)
    {
        //
    }

public function edit(string $id)
{
    $user = DB::table('users')
        ->where('id', $id)
        ->first();

    return '
    <html>
    <head>
        <title>Sửa User</title>

        <style>
            body{
                font-family: Arial, sans-serif;
                background:#f1f5f9;
                padding:30px;
            }

            .container{
                max-width:700px;
                margin:auto;
                background:white;
                padding:30px;
                border-radius:15px;
            }

            input{
                width:100%;
                padding:10px;
                margin-top:5px;
                margin-bottom:15px;
                box-sizing:border-box;
            }

            .btn{
                padding:10px 15px;
                border:none;
                border-radius:5px;
                cursor:pointer;
                text-decoration:none;
                display:inline-block;
            }

            .btn-save{
                background:#2563eb;
                color:white;
            }
        </style>
    </head>

    <body>

        <div class="container">

            <h2>Sửa User</h2>

            <form method="POST" action="/admin/users/'.$user->id.'">

                <input type="hidden" name="_token" value="'.csrf_token().'">

                <input type="hidden" name="_method" value="PUT">

                <label>Họ tên</label>
                <input type="text"
                       name="fullname"
                       value="'.$user->fullname.'">

                <label>Email</label>
                <input type="email"
                       name="email"
                       value="'.$user->email.'">

                <button type="submit" class="btn btn-save">
                    Cập nhật
                </button>

            </form>

        </div>

    </body>
    </html>
    ';
}

public function update(Request $request, string $id)
{
    DB::table('users')
        ->where('id', $id)
        ->update([
            'fullname' => $request->fullname,
            'email' => $request->email,
            'updated_at' => now()
        ]);

    return redirect('/admin/users');
}

public function destroy(string $id)
{
    DB::table('users')
        ->where('id', $id)
        ->delete();

    return redirect('/admin/users');
}
}