<?php

namespace App\Rules;

use App\Models\Store;
use Illuminate\Contracts\Validation\Rule;

class EmployeeStoreRule implements Rule
{
    public function passes($attribute, $value)
    {
        // Lấy giá trị của role từ request hoặc model tùy theo ngữ cảnh
        $role = request('role'); // Thay request bằng cách lấy giá trị từ model nếu cần

        // Nếu role là 'employee' và store_id không null thì kiểm tra store_id
        if ($role === 'employee' && $value !== null) {
            // Thực hiện kiểm tra dựa trên logic của bạn
            // Ví dụ: Kiểm tra xem store_id có tồn tại trong bảng 'stores' không
            return Store::where('id', $value)->exists();
        }

        // Trong các trường hợp khác (role là 'user' hoặc 'admin'), luôn trả về true
        return true;
    }

    public function message()
    {
        return 'The selected store is invalid for the selected role.';
    }
}
