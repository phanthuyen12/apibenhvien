<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/test-leveldb', function () {
    // Kiểm tra nếu LevelDB đã cài đặt
    if (extension_loaded('leveldb')) {
        // Mở hoặc tạo cơ sở dữ liệu LevelDB
        $leveldb = new \LevelDB(storage_path('leveldb'));

        // Thêm dữ liệu vào LevelDB
        $leveldb->put("thuyencacto", "sdfsdfsdfsdf");

        // Lấy dữ liệu từ LevelDB
        $value = $leveldb->get("key1");

        // Xóa dữ liệu
        $leveldb->delete("key1");

        // Đóng cơ sở dữ liệu
        $leveldb->close();

        return "LevelDB hoạt động, giá trị đã lưu là: " . $value;
    } else {
        return "Phần mở rộng LevelDB chưa được cài đặt.";
    }
});