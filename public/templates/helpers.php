<?php
function set_lang() {
    session_start();
    if(isset($_GET['lang'])){
        $_SESSION['lang'] = $_GET['lang'] === 'en' ? 'en' : 'ar';
    }
    return $_SESSION['lang'] ?? 'ar';
}

function t($key, $lang) {
    $strings = [
        'site_title' => ['en'=>'Faculty of Engineering','ar'=>'كلية الهندسة'],
        'dashboard' => ['en'=>'Dashboard','ar'=>'لوحة التحكم'],
        'students' => ['en'=>'Students','ar'=>'الطلاب'],
        'courses' => ['en'=>'Courses','ar'=>'المقررات'],
        'add_new' => ['en'=>'Add New','ar'=>'إضافة جديد'],
        'edit' => ['en'=>'Edit','ar'=>'تعديل'],
        'delete' => ['en'=>'Delete','ar'=>'حذف'],
        'actions' => ['en'=>'Actions','ar'=>'إجراءات'],
        'name' => ['en'=>'Name','ar'=>'الاسم'],
        'email' => ['en'=>'Email','ar'=>'البريد الإلكتروني'],
        'instructor' => ['en'=>'Instructor','ar'=>'المحاضر'],
        'save' => ['en'=>'Save','ar'=>'حفظ'],
        'login' => ['en'=>'Login','ar'=>'تسجيل دخول'],
        'logout' => ['en'=>'Logout','ar'=>'تسجيل خروج'],
    ];
    return $strings[$key][$lang] ?? $key;
}
