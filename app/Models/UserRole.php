<?php

namespace App\Models; // Простір імен для автозавантаження

use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    protected $table = 'user_roles'; // Якщо потрібно змінити ім'я таблиці
    protected $fillable = ['name'];  // Поля для масового заповнення
}
