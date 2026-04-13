<?php
require __DIR__ . '/bootstrap/app.php';

use App\Models\User;
use App\Models\Sword;

$app->boot();

$showcase = [
    ['user' => 'Avery Cole', 'file' => 'bastard-longsword.jpg', 'name' => 'Warden Bastard Sword', 'type' => 'Bastard Sword', 'desc' => 'A balanced hand-and-a-half blade built for tight guard work, with enough reach and weight to shift into two-handed cuts when the fight opens up.'],
    ['user' => 'Mila Hart', 'file' => 'claymore.webp', 'name' => 'Highland Claymore', 'type' => 'Claymore', 'desc' => 'A broad Scottish greatsword with a long grip and sweeping profile, made for committed two-handed strikes and battlefield presence.'],
    ['user' => 'Ronan Vale', 'file' => '1338_1st-600x1271.jpg', 'name' => 'Ridgecrest Broadsword', 'type' => 'Broadsword', 'desc' => 'A stout, single-handed blade with a wide profile and sturdy guard, built for reliable cuts and confident parries.'],
    ['user' => 'Zara Quinn', 'file' => 'dark-sister-sword-of-daemon-targaryen-1_a5a69c40-8d3b-4963-a919-01518bfb4540.webp', 'name' => 'Nightborne Longsword', 'type' => 'Longsword', 'desc' => 'A lean, dark-forged blade with a long grip and agile balance, favoring swift thrusts and tight, precise footwork.'],
    ['user' => 'Theo Marsh', 'file' => 'il_570xN.3117585570_8lbi.webp', 'name' => 'Crestwind Arming Sword', 'type' => 'Arming Sword', 'desc' => 'A compact knightly sidearm with a lively point and clean recovery, dependable in close duels and shield work.'],
    ['user' => 'Lena Park', 'file' => 'katana.jpg', 'name' => 'Moonlit Katana', 'type' => 'Katana', 'desc' => 'A curved single-edged blade with a fast draw and clean follow-through, prized for precision cuts and disciplined handling.'],
    ['user' => 'Omar Finch', 'file' => 'sword-card.jpg', 'name' => 'Kingsguard Arming Sword', 'type' => 'Arming Sword', 'desc' => 'A straight, lively sidearm designed for one-handed use with a shield, reliable in close engagements and quick to recover.'],
];

foreach ($showcase as $item) {
    $user = User::where('name', $item['user'])->first();
    if ($user) {
        Sword::firstOrCreate(
            ['name' => $item['name'], 'user_id' => $user->id],
            [
                'type' => $item['type'],
                'description' => $item['desc'],
                'image' => 'showcase/' . $item['file'],
            ]
        );
        echo "✓ Created {$item['name']} for {$item['user']}\n";
    } else {
        echo "✗ User {$item['user']} not found\n";
    }
}

echo "\nDone!\n";
