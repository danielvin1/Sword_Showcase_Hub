<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

use App\Models\User;
use Illuminate\Support\Facades\Hash;

$users = [
    ['name' => 'Avery Cole', 'email' => 'avery.cole@swordshub.com'],
    ['name' => 'Mila Hart', 'email' => 'mila.hart@swordshub.com'],
    ['name' => 'Ronan Vale', 'email' => 'ronan.vale@swordshub.com'],
    ['name' => 'Zara Quinn', 'email' => 'zara.quinn@swordshub.com'],
    ['name' => 'Theo Marsh', 'email' => 'theo.marsh@swordshub.com'],
    ['name' => 'Lena Park', 'email' => 'lena.park@swordshub.com'],
    ['name' => 'Omar Finch', 'email' => 'omar.finch@swordshub.com'],
];

foreach ($users as $userData) {
    User::firstOrCreate(
        ['email' => $userData['email']],
        array_merge($userData, ['password' => Hash::make('password')])
    );
    echo "Created user: {$userData['name']}\n";
}

echo "All users created!\n";
