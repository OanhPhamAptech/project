<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\product;
use App\Models\size;
use App\Models\color;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class admincontroller extends Controller
{
    // vào trang admin, hiển thị danh sách sản phẩm
    public function showproduct()
    {
        if (Auth::check()) {
            $products = DB::table('product')
                ->join('size', 'product.id', '=', 'size.product_id')
                ->join('category', 'category.id', '=', 'product.category_id')
                ->join('color', 'size.id', '=', 'color.size_id')
                ->join('image', 'color.id', '=', 'image.color_id')
                ->Paginate(5);

            return view('admin', compact('products'));
        } else {
            return redirect('/login');
        }
    }

    // đến trang edit product
    public function add_product()
    {
        if (Auth::check()) {

            return view('add_product');
        } else {
            return redirect('/login');
        }
    }

    // Lưu new product
    public function store_product(request $request)
    {
        if (Auth::check()) {
            DB::beginTransaction();
            try {
                //thêm dữ liệu bảng product
                $products = new product;
                $products->ProductName = $request->ProductName;
                $products->category_id = $request->input('category_id');
                $products->ProductDescription = $request->ProductDescription;
                $products->save();
                //thêm dữ liệu bảng size
                $products = product::find($products->id);
                $sizes = new size;
                $sizes = $products->size()->create(
                    [
                        'SizeName' => $request->SizeName,
                        'Price' => $request->Price,
                        'SizeDescription' => $request->SizeDescription
                    ]
                );
                //thêm dữ liệu bảng color
                $sizes = size::find($sizes->id);
                $colors = new color;
                $colors = $sizes->color()->create(
                    [
                        'ColorName' => $request->ColorName,
                        'Quantity' => $request->Quantity
                    ]
                );
                //thêm dữ liệu bảng image
                $request->validate([
                    'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
                ]);
                $imageName = time() . '.' . $request->image->extension();
                $imagepath = $request->file('image')->move(public_path('img/' . $request->input('CatName') . '/'), $imageName);
                $colors = color::find($colors->id);
                $colors->img()->create([

                    'URL' => 'img/' . $request->input('CatName') . '/' . $imageName,
                    'product_id' => $products->id
                ]);
                DB::commit();
            } catch (\Exception $e) {
                DB::rollBack();
                throw $e;
            }
            session()->flash('success', 'Image uploaded successfully.');
            return redirect()->route('showproduct');
        } else {
            return redirect('/login');
        }
    }

    //hiển thị danh sách đơn hàng
    public function showorder()
    {
        if (Auth::check()) {
            return view('/order');
        } else {
            return redirect('/login');
        }
    }
    //hiển thị chi tiết đơn hàng
    public function showorder_detail()
    {
        if (Auth::check()) {
            return view('/order_detail');
        } else {
            return redirect('/login');
        }
    }
    // hiển thị danh sách nhân viên
    public function showuser()
    {
        if (Auth::check()) {
            $users = DB::table('users')->select('*');
            $users = $users->get();
            return view('/users', compact('users'));
        } else {
            return redirect('/login');
        }
    }
    //chỉnh sửa thông tin nhân viên
    public function edituser($id)
    {
        if (Auth::check()) {

            $users = user::findOrFail($id);
            return view('/edit_user', compact('users'));
        } else {
            return redirect('/login');
        }
    }
    //sửa thông tin nhân viên

    public function store_edit_user(Request $request, $id)
    {
        if (Auth::check()) {
            $user = user::find($id);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->save();
            session()->flash('success', 'Cập nhật thành công');
            return redirect()->route('showuser');
        } else {
            return redirect('/login');
        }
    }
    public function delete_user($id)
    {
        if (Auth::check()) {
            $user = user::find($id);
            $user->delete();
            return redirect()->route('showuser')->with('success', "Xóa thành công");
        } else {
            return redirect('/login');
        }
    }

    //thêm nhân viên
    public function adduser()
    {
        if (Auth::check()) {
            return view('/add_user');
        } else {
            return redirect('/login');
        }
    }
    // lưu thông tin nhân viên mới
    public function storeuser(Request $request)
    {

        if (Auth::check()) {
            $users = new user;
            $users->name = $request->name;
            $users->email = $request->email;
            $users->password = Hash::make($request->password);
            $users->level = $request->input('level');
            $users->save();
            session()->flash('success', 'Thêm nhân viên thành công');
            return redirect()->route('showuser');
        } else {
            return redirect('/login');
        }
    }
}
