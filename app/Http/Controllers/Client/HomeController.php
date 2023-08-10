<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Trang Chủ';
        $productAll = Product::orderBy('id', 'desc')->limit(8)->get();
        $CategoryActive1 = Category::where('active', 1)
            ->where('number', 1)
            ->select('name', 'images', 'id as id1')
            ->first();
        $CategoryActive2 = Category::where('active', 1)
        ->where('number', 2)
        ->select('name', 'images', 'id as id2')
        ->limit(4)
        ->get();

        foreach ($CategoryActive2 as $category) {
            $productCount = Product::where('category_id', $category->id2)->count();
            $category->productCount = $productCount; // Thêm thuộc tính mới vào đối tượng Category
        }
        // dd($CategoryActive1, $CategoryActive2);
        $filter = Category::select('name', 'filter', 'slug')->get();
        $id1 = Category::select('id')->where('active', 1)->where('number', 1)->first();
        $count1 = 0; // Khởi tạo số lượng sản phẩm ban đầu

        if ($id1) {
            $count1 = Product::where('category_id', $id1->id)->count();
        }
        // dd($count1);
        $product_hot = Product::where('hot', 1)->orderBy('id', 'desc')->limit(3)->get();

        // dd($CategoryActive2);
        return view('client.home.home', compact('productAll', 'CategoryActive1', 'CategoryActive2', 'filter', 'product_hot', 'title', 'count1'));
    }
}
