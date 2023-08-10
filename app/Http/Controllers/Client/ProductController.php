<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Shop';
        $productAll = Product::paginate(9);
        $categoryAll = Category::all();
        return view('client.shop.shop', compact('title', 'productAll', 'categoryAll'));
    }
    public function category(string $id)
    {
        $title = 'Shop';
        $category = Category::findOrFail($id); // Lấy thông tin của danh mục
        $productAll = Product::where('category_id', $id)->paginate(9); // Phân trang sản phẩm
        $categoryAll = Category::all();
        return view('client.shop.shop', compact('title', 'categoryAll', 'productAll'));
    }
    // public function show(string $id)
    // {
    //     $title = 'Shop';
    //     $productDetail = Product::find($id);
    //     $category = $productDetail->category;

    //     // Lấy các sản phẩm cùng loại
    //     $relatedProducts = Product::where('category_id', '=', $category->id)
    //         ->where('id', '<>', $productDetail->id)
    //         ->limit(4)
    //         ->get();
    //     // dd($relatedProducts);
    //     return view('client.shop.shopDetail', compact('productDetail', 'title', 'relatedProducts'));
    // }
    public function show(string $id)
    {
        $title = 'Shop';
        $productDetail = Product::find($id);

        if (!$productDetail) {
            // Xử lý khi không tìm thấy sản phẩm
            return redirect()->route('client_home'); // Ví dụ: chuyển hướng về trang chủ
        }

        $category = $productDetail->category;

        // Lấy các sản phẩm cùng loại
        $relatedProducts = Product::where('category_id', '=', $category->id)
        ->where('id',
            '<>',
            $productDetail->id
        )
        ->limit(4)
        ->get();

        return view('client.shop.shopDetail', compact('productDetail', 'title', 'relatedProducts'));
    }
}
