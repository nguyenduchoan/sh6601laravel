<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadController extends Controller
{
    /**Hienr thị form chọn ản */
    public function form() {
        return view('upload.form');
    }

    /** Nhận dữ liệu và thực hiện upload */
    public function upload(Request $request) {
        $rules = ['upload' => 'required|mimes:jpeg,png,gif'];
        $mesages = [
            'upload.required' => 'Vui lòng chọn một file',
            'upload.mimes' => 'Định dạng file cho phép là: jpg, png, gif',
        ];

        $request->validate($rules, $mesages);

        $file_name = $request->upload->getClientOriginalName();
        $request->upload->move(public_path('uploads'), $file_name);
        // quay lại form upload và gửi kèm một flash message
        return redirect()->back()->with('success',"Upload ảnh thành công");
    }

}
