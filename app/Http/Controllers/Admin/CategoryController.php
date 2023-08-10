<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menu = Category::paginate(4);
        return view('admin.category.list', [
            'title' => 'Danh Sách Danh Mục',
            'menu' => $menu,
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
        // dd($request->all());
        $imgName = time() . '.' . $request->images->extension();
        $request->images->move(public_path('images'), $imgName);
        $status = Category::create([
            'name' => (string) $request->input('name'),
            'active' => (int) $request->input('active'),
            'slug' => Str::slug($request->input('name'), '-'),
            'filter' =>Str::slug($request->input('name'), '-'),
            'images' => (string) $imgName
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
        $data = DB::table('categories')->where('id', '=', $id)->first();
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
        $status = Category::find($id);
        if(isset($request->images)){
            $imgName = time() . '.' . $request->images->extension();
            $request->images->move(public_path('images'), $imgName);
            $status->images = $imgName;
        }
        $status->name =  $request->input('name');
        $status->active = $request->input('active');
        $status->slug = Str::slug($request->input('name'), '-');
        $status->filter = $request->input('filter');
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
        $status = Category::destroy($id);
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
