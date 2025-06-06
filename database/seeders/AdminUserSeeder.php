<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@bankline.local'], // уникальный ключ
            [
                'surname' => 'Admin',
                'name' => 'Admin',
                'patronymic' => 'Admin',

                'passport_id' => 'ID1010101',
                'passport_inn' => '10101010101010',
                'issued_by' => 'ОВД города N',
                'date_start' => '2015-06-01',
                'date_end' => '2025-06-01',
                'birth' => '1990-01-01',

                'city' => 'Москва',
                'address' => 'ул. Пушкина, д. 1',
                'gender' => 'man',

                'email' => 'admin@gmail.com',
                'password' => Hash::make('password'), // не забудь сменить на надёжный пароль

                'phone' => '+79991234567',
                'position_at_work' => 'Администратор системы',
                'work_address' => 'г. Москва, офис 101',
                'role' => 'admin',
            ]
        );
    }
}
