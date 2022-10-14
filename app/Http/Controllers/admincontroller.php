<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\product;
use App\Models\size;
use App\Models\color;
use App\Models\image;
use App\Models\category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class admincontroller extends Controller
{
    // vào trang admin, hiển thị danh sách sản phẩm
    public function showproduct()
    {
        if (Auth::check()) {
            $products = DB::table('category')
                ->join('product', 'product.category_id', '=', 'category.id')
                ->paginate(5);
            return view('admin', compact('products'));
        } else {
            return redirect('/login');
        }
    }
    //search function
    public function search(request $request)
    {
        if (Auth::check()) {
            $search = $request->input('search');
            $products = DB::table('category')
                ->join('product', 'product.category_id', '=', 'category.id')
                ->where('ProductName', 'LIKE', "%{$search}%")
                ->orWhere('ProductDescription', 'LIKE', "%{$search}%")
                ->orwhere('CatName','LIKE',"%{$search}%")
                
                ->paginate(5);

            return view('admin', compact('products'));
        } else {
            return redirect('/login');
        }
    }
    //hiển thị product detail
    public function product_detail($id)
    {
        if (Auth::check()) {
            if ($id == null) {
            } else {
                $products = db::table('product');
                $sizes = product::find($id)->size;
                $colors = product::find($id)->color;
                foreach ($colors as $color) {
                    $color->img()->get('URL');
                }

                return view('product_detail', compact('sizes', 'colors',));
            }
        } else {
            return redirect('/login');
        }
    }
    //trang để  thêm size mới 
    public function add_size($id)
    {
        if (Auth::check()) {
            $products = product::find($id);
            $cat = $products->cat()->where('id', $products->category_id)->get();
            $cat = category::find($products->category_id);

            return view('add_size', compact('products', 'cat'));
        } else {
            return redirect('/login');
        }
    }
    // lưu size mới
    public function store_size(request $request, $id)
    {
        if (Auth::check()) {
            DB::beginTransaction();
            try {
                //thêm dữ liệu bảng size
                $products = product::find($id);
                $cat = category::find($products->category_id);
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
                $request->file('image')->move(public_path('img/' . $cat->CatName . '/'), $imageName);
                $images = new image;
                $colors = color::find($colors->id);
                $images = $colors->img()->create([

                    'URL' => 'img/' . $cat->CatName . '/' . $imageName,
                    'product_id' => $products->id
                ]);

                DB::commit();
            } catch (\Exception $e) {
                DB::rollBack();
                throw $e;
            }
            session()->flash('success', 'Thêm size mới thành công');
            return redirect()->route('product.detail', [$products]);
        } else {
            return redirect('/login');
        }
    }
    //đến trang thêm color 
    public function add_color($id)
    {
        if (Auth::check()) {
            $sizes = size::find($id);
            $products = $sizes->product()->where('id', $sizes->product_id)->get();
            $products = product::find($sizes->product_id);
            $cat = $products->cat()->where('id', $products->category_id)->get();
            $cat = category::find($products->category_id);
            return view('add_color', compact('sizes', 'products', 'cat'));
        } else {
            return redirect('/login');
        }
    }
    //lưu color mới
    public function store_color(request $request, $id)
    {
        if (Auth::check()) {
            DB::beginTransaction();
            try {
                //thêm dữ liệu bảng color
                $sizes = size::find($id);
                $products = $sizes->product()->where('id', $sizes->product_id)->get();
                $products = product::find($sizes->product_id);
                $cat = category::find($products->category_id);
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
                $request->file('image')->move(public_path('img/' . $cat->CatName . '/'), $imageName);
                $images = new image;
                $colors = color::find($colors->id);
                $images = $colors->img()->create([

                    'URL' => 'img/' . $cat->CatName . '/' . $imageName,
                    'product_id' => $products->id
                ]);
                DB::commit();
            } catch (\Exception $e) {
                DB::rollBack();
                throw $e;
            }
            session()->flash('success', 'Image uploaded successfully.');
            return redirect()->route('product.detail', [$products]);
        } else {
            return redirect('/login');
        }
    }
    // đến trang add product
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
                $request->validate([
                    'Featured' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
                ]);
                $imageName = time() . '.' . $request->image->extension();
                $request->file('Featured')->move(public_path('img/' . $request->input('CatName') . '/'), $imageName);
                $products->Featured = 'img/' . $request->CatName . '/' . $imageName;
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
                $request->file('image')->move(public_path('img/' . $request->input('CatName') . '/'), $imageName);
                $images = new image;
                $colors = color::find($colors->id);
                $images = $colors->img()->create([

                    'URL' => 'img/' . $request->CatName . '/' . $imageName,
                    'product_id' => $products->id
                ]);
                DB::commit();
            } catch (\Exception $e) {
                DB::rollBack();
                throw $e;
            }
            session()->flash('success', 'Thêm sản phẩm mới thành công');
            return redirect()->route('showproduct');
        } else {
            return redirect('/login');
        }
    }
    //edit product
    public function edit_product($id)
    {
        if (Auth::check()) {
            $products = product::find($id);
            $cat = $products->cat()->where('id', $products->category_id)->get();
            $cat = category::find($products->category_id);

            return view('edit_product', compact('products', 'cat'));
        } else {
            return redirect('/login');
        }
    }
    //Lưu edit product
    public function store_edit_product(request $request, $id)
    {
        if (Auth::check()) {
            $products = product::find($id);
            $products->ProductName = $request->ProductName;
            $products->ProductDescription = $request->input('ProductDescription');
            $products->save();
            return redirect()->route('showproduct')->with('success', "Cập nhật thành công");
        } else {
            return redirect('/login');
        }
    }
    //edit size product 
    public function edit_size($id)
    {
        if (Auth::check()) {
            $colors = color::findOrFail($id);
            $sizes = $colors->size()->where('id', $colors->size_id)->get();
            $sizes = size::find($colors->size_id);
            $products = $sizes->product()->where('id', $sizes->product_id)->get();
            $products = product::find($sizes->product_id);
            $cat = $products->cat()->where('id', $products->category_id)->get();
            $cat = category::find($products->category_id);
            return view('edit_size', compact('sizes', 'products', 'cat', 'colors'))->with('success', "Cập nhật thành công");
        } else {
            return redirect('/login');
        }
    }
    // lưu edit size
    public function store_edit_size(request $request, $id)
    {
        if (Auth::check()) {
            $colors = color::find($id);
            $colors->ColorName = $request->ColorName;
            $colors->Quantity = $request->Quantity;
            $colors->save();
            $sizes = db::table('size');
            $sizes = $colors->size()->where('id', $colors->size_id)->update([
                'SizeName' => $request->SizeName,
                'SizeDescription' => $request->SizeDescription,
                'Price' => $request->Price
            ]);
            $sizes = size::find($colors->size_id);
            $products = product::find($sizes->product_id);
            $cat = category::find($products->category_id);

            // update ảnh nếu có 
            if (!empty($request->image)) {
                $request->validate([
                    'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
                ]);
                $imageName = time() . '.' . $request->image->extension();
                $request->file('image')->move(public_path('img/' . $cat->CatName . '/'), $imageName);
                $images = db::table('image');
                $images = $colors->img()->update([
                    'URL' => 'img/' . $cat->CatName . '/' . $imageName,
                ]);
            }

            // lấy id cho route 
            $sizes = size::find($colors->size_id);
            $products = product::find($sizes->product_id);

            return redirect()->route('product.detail', [$products])->with('success', "Cập nhật thành công");
        } else {
            return redirect('/login');
        }
    }
    // Xóa 1 dòng size, 1 dòng color
    public function delete_color($id)
    {
        if (Auth::check()) {
            $image = image::find($id);
            $colors = color::find($image->color_id);
            $sizes = size::find($colors->size_id);
            $image->delete();
            $colors->delete();
            // lấy id cho route 
            $products = product::find($sizes->product_id);
            return redirect()->route('product.detail', [$products])->with('success', "Xóa dòng dữ liệu thành công");
        } else {
            return redirect('/login');
        }
    }
    // xóa thông tin toàn bộ 1 sản phẩm 
    public function delete_product($id)
    {
        if (Auth::check()) {
            $products = product::find($id);
            $products->delete();
            return redirect()->route('product.detail', [$products])->with('success', "Xóa dòng dữ liệu thành công");
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
