<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product = Product::paginate(4);
        // $category = Product::find(1)->category;
        $category = Category::all();
        return view('admin.product.list', [
            'title' => 'Danh Sách Sản Phẩm',
            'product' => $product,
            'category' => $category
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->input('category_id'));
        $imgName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $imgName);
        $status = Product::create([
            'name' => (string) $request->input('name'),
            'price' => (int) $request->input('price'),
            'price_sale' => (int) $request->input('price_sale'),
            'description' => (string) $request->input('description'),
            'description_detail' => (string) $request->input('description_detail'),
            'category_id' => (int) $request->input('category_id'),
            'slug' => Str::slug($request->input('name'), '-'),
            'image' => (string) $imgName
        ]);

        if ($status) {
            $res = [
                'status' => 200,
                'message' => 'Thêm Thành Công'
            ];
            echo json_encode($res);
            return;
        } else {
            $res = [
                'status' => 500,
                'message' => 'Thêm Thất Bại'
            ];
            echo json_encode($res);
            return;
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = DB::table('products')->where('id', '=', $id)->first();
        // $data = Product::find($id);
        // dd($data);
        if ($data) {
            $res = [
                'status' => 200,
                'message' => 'Student Fetch Successfully by id',
                'data' => $data
            ];
            echo json_encode($res);
        } else {
            $res = [
                'status' => 404,
                'message' => 'Student Id Not Found'
            ];
            echo json_encode($res);
            return;
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $status = Product::find($id);
        // dd($request->image);
        if(isset($request->image)){
            $imgName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imgName);
            $status->image = $imgName;
        }
        $status->name =  $request->input('name');
        $status->price = $request->input('price');
        $status->price_sale = $request->input('price_sale');
        $status->description = $request->input('description');
        $status->description_detail = $request->input('description_detail');
        $status->category_id = $request->input('category_id');
        $status->slug = Str::slug($request->input('name'), '-');
        $status->save();

        if ($status) {
            $res = [
                'status' => 200,
                'message' => 'Cập Nhật Thành Công'
            ];
            echo json_encode($res);
            return;
        } else {
            $res = [
                'status' => 500,
                'message' => 'Cập Nhật Thất Bại'
            ];
            echo json_encode($res);
            return;
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $status = Product::destroy($id);
        // dd($status);
        if ($status) {
            $res = [
                'status' => 200,
                'message' => 'Xoá Danh Mục Thành Công'
            ];
            echo json_encode($res);
            return;
        } else {
            $res = [
                'status' => 500,
                'message' => 'Xoá Thất Bại'
            ];
            echo json_encode($res);
            return;
        }
    }
}
