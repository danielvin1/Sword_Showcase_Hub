<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\SwordOrderController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\StorageController;
use App\Http\Controllers\SwordController;
use App\Models\Like;
use App\Models\Sword;
use App\Models\SwordOrder;
use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Hash;

$resolveSessionUser = function () {
    $profileUser = session('user_id') ? User::find(session('user_id')) : null;

    if (! $profileUser && session('user_email')) {
        $profileUser = User::where('email', session('user_email'))->first();
    }

    return $profileUser;
};

Route::get('/', function () {
    return redirect('/welcome');
});

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/shop', function () {
    $orders = collect();

    if (Schema::hasTable('sword_orders')) {
        $orders = SwordOrder::with('user')
            ->latest()
            ->take(12)
            ->get()
            ->map(function (SwordOrder $order) {
                $userName = $order->user?->name ?? 'Anonymous Collector';

                return [
                    'user' => $userName,
                    'user_id' => $order->user?->id,
                    'handle' => '@' . strtolower(str_replace(' ', '', $userName)),
                    'sword_name' => $order->sword_name,
                    'sword_type' => $order->sword_type,
                    'budget' => $order->budget ?: 'Budget on request',
                    'timeline' => $order->timeline ?: 'Flexible timeline',
                    'description' => $order->description ?: 'A custom commission request awaiting the right maker.',
                    'status' => $order->status,
                    'time' => $order->created_at?->diffForHumans() ?? 'Just now',
                ];
            });
    }

    if ($orders->isEmpty()) {
        $demoOrders = [
            ['user' => 'Avery Cole', 'sword_name' => 'Warden Bastard Sword', 'sword_type' => 'Bastard Sword', 'budget' => '$320 - $450', 'timeline' => '2 weeks', 'description' => 'A dependable hand-and-a-half sword with a reinforced grip, tuned for balanced cuts and tighter guard work.'],
            ['user' => 'Mila Hart', 'sword_name' => 'Highland Claymore Request', 'sword_type' => 'Claymore', 'budget' => '$480 - $620', 'timeline' => '3 weeks', 'description' => 'A broad two-handed blade with a taller profile, long pommel, and a dramatic battlefield silhouette.'],
            ['user' => 'Ronan Vale', 'sword_name' => 'Ridgecrest Broadsword', 'sword_type' => 'Broadsword', 'budget' => '$260 - $340', 'timeline' => '10 days', 'description' => 'A sturdy one-handed broadsword for reliable edge alignment and a clean, formal finish.'],
            ['user' => 'Zara Quinn', 'sword_name' => 'Nightborne Longsword', 'sword_type' => 'Longsword', 'budget' => '$300 - $420', 'timeline' => '2-4 weeks', 'description' => 'A dark, refined longsword with a leaner profile and a fast, elegant line.'],
            ['user' => 'Theo Marsh', 'sword_name' => 'Crestwind Arming Sword', 'sword_type' => 'Arming Sword', 'budget' => '$180 - $240', 'timeline' => '1 week', 'description' => 'A compact sidearm built for quick recovery, light handling, and daily carry aesthetics.'],
        ];

        $orders = collect($demoOrders)->map(function (array $item) {
            $user = User::where('name', $item['user'])->first();
            $userName = $item['user'];

            return [
                'user' => $userName,
                'user_id' => $user?->id,
                'handle' => '@' . strtolower(str_replace(' ', '', $userName)),
                'sword_name' => $item['sword_name'],
                'sword_type' => $item['sword_type'],
                'budget' => $item['budget'],
                'timeline' => $item['timeline'],
                'description' => $item['description'],
                'status' => 'Open',
                'time' => 'Featured request',
            ];
        });
    }

    return view('shop', [
        'orders' => $orders,
        'orderCount' => $orders->count(),
    ]);
});

Route::get('/storage/{path}', [StorageController::class, 'show'])->where('path', '.*');

Route::get('/login', function () {
    return view('login');
});

Route::get('/register', function () {
    return view('register');
});

Route::post('/register', [AuthController::class, 'register']);

Route::get('/upload', function () {
    if (! session('user_id')) {
        return redirect('/register')->with('error', 'Please create an account to upload swords.');
    }

    return view('upload');
});

Route::post('/upload/swords', [SwordController::class, 'store'])->name('upload.swords.store');
Route::post('/orders', [SwordOrderController::class, 'store'])->name('orders.store');

Route::get('/profile', function () use ($resolveSessionUser) {
    if (! session('user_id')) {
        return redirect('/register')->with('error', 'Please create an account to view your profile.');
    }

    $currentUser = $resolveSessionUser();
    $profileUser = $currentUser;
    $swords = $profileUser ? $profileUser->swords()->latest()->get() : collect();
    $orders = $profileUser ? $profileUser->swordOrders()->latest()->get() : collect();
    $likedSwords = $profileUser
        ? Sword::whereIn('id', Like::where('user_id', $profileUser->id)->pluck('sword_id'))->latest()->get()
        : collect();

    return view('profile', [
        'currentUser' => $currentUser,
        'profileUser' => $profileUser,
        'swords' => $swords,
        'likedSwords' => $likedSwords,
        'swordCount' => $swords->count(),
        'orderCount' => $orders->count(),
        'orders' => $orders,
        'isOwnProfile' => true,
        'isFollowing' => false,
        'followerCount' => $profileUser?->followers()->count() ?? 0,
        'followingCount' => $profileUser?->following()->count() ?? 0,
    ]);
});

Route::get('/user/{user}', function (User $user) use ($resolveSessionUser) {
    $currentUser = $resolveSessionUser();
    $swords = $user->swords()->latest()->get();
    $orders = $user->swordOrders()->latest()->get();
    $likedSwords = Sword::whereIn('id', Like::where('user_id', $user->id)->pluck('sword_id'))->latest()->get();

    return view('profile', [
        'currentUser' => $currentUser,
        'profileUser' => $user,
        'swords' => $swords,
        'likedSwords' => $likedSwords,
        'swordCount' => $swords->count(),
        'orderCount' => $orders->count(),
        'orders' => $orders,
        'isOwnProfile' => $currentUser ? (int) $currentUser->id === (int) $user->id : false,
        'isFollowing' => $currentUser ? $currentUser->isFollowing($user->id) : false,
        'followerCount' => $user->followers()->count(),
        'followingCount' => $user->following()->count(),
    ]);
});

Route::post('/profile/photo', function (\Illuminate\Http\Request $request) {
    if (! session('user_id')) {
        return redirect('/register')->with('error', 'Please log in first.');
    }

    $profileUser = User::find(session('user_id'));

    if (! $profileUser) {
        return redirect('/login')->with('error', 'Please log in first.');
    }

    $request->validate(['profile_photo' => 'required|image|max:2048']);

    if ($profileUser->profile_photo) {
        Storage::disk('public')->delete($profileUser->profile_photo);
    }

    $path = $request->file('profile_photo')->store('profile-photos', 'public');
    $profileUser->profile_photo = $path;
    $profileUser->save();
    session(['profile_photo' => $path]);

    return redirect('/profile')->with('success', 'Profile picture updated.');
});

Route::post('/profile/update', function (\Illuminate\Http\Request $request) {
    if (! session('user_id')) {
        return redirect('/register')->with('error', 'Please log in first.');
    }

    $profileUser = User::find(session('user_id'));

    if (! $profileUser) {
        return redirect('/login')->with('error', 'Please log in first.');
    }

    $request->validate([
        'name' => 'required|string|max:60',
        'profile_photo' => 'nullable|image|max:2048',
        'banner_photo' => 'nullable|image|max:4096',
    ]);

    $profileUser->name = $request->input('name');

    if ($request->hasFile('profile_photo')) {
        if ($profileUser->profile_photo) {
            Storage::disk('public')->delete($profileUser->profile_photo);
        }

        $path = $request->file('profile_photo')->store('profile-photos', 'public');
        $profileUser->profile_photo = $path;
        session(['profile_photo' => $path]);
    }

    if ($request->hasFile('banner_photo')) {
        if ($profileUser->banner_photo) {
            Storage::disk('public')->delete($profileUser->banner_photo);
        }

        $bannerPath = $request->file('banner_photo')->store('profile-banners', 'public');
        $profileUser->banner_photo = $bannerPath;
        session(['profile_banner' => $bannerPath]);
    }

    $profileUser->save();
    session(['user_name' => $profileUser->name]);

    return redirect('/profile')->with('success', 'Profile updated.');
});

Route::post('/login', function (\Illuminate\Http\Request $request) {
    $validated = $request->validate([
        'email' => 'required|email',
        'password' => 'required|string',
    ]);

    $email = trim((string) $validated['email']);
    $password = trim((string) $validated['password']);

    $user = User::where('email', $email)->first();

    if (! $user || ! Hash::check($password, $user->password)) {
        return redirect('/login')->with('error', 'Your login details are incorrect.');
    }

    session([
        'logged_in'     => true,
        'user_id'       => $user->id,
        'user_name'     => $user->name,
        'user_email'    => $email,
        'profile_photo' => $user->profile_photo,
    ]);

    return redirect('/feed');
});

Route::post('/logout', function (\Illuminate\Http\Request $request) {
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect('/welcome');
});

Route::get('/feed', function () use ($resolveSessionUser) {
    $currentUser = $resolveSessionUser();
    $swords = Sword::with('user')
        ->get()
        ->groupBy('user_id')
        ->map(fn ($group) => $group->shuffle()->first())
        ->values()
        ->shuffle();
    $followingIds = $currentUser
        ? $currentUser->following()->pluck('following_id')->map(fn ($id) => (int) $id)->all()
        : [];

    return view('feed', compact('swords', 'currentUser', 'followingIds'));
});

Route::get('/discussions', function () {
    $posts = Post::with('user')
        ->withCount('comments')
        ->latest()
        ->get();

    return view('discussions', compact('posts'));
});

Route::get('/posts/{post}', function (Post $post) {
    return view('discussion-single', compact('post'));
});

Route::post('/users/{user}/follow', [FollowController::class, 'toggle']);
Route::post('/swords', [SwordController::class, 'store'])->name('swords.store');
Route::get('/swords/{sword}/edit', [SwordController::class, 'edit']);
Route::put('/swords/{sword}', [SwordController::class, 'update']);
Route::delete('/swords/{sword}', [SwordController::class, 'destroy']);

Route::post('/swords/{sword}/like', function (\Illuminate\Http\Request $request, Sword $sword) {
    if (! session('user_id')) {
        return back()->with('error', 'You must be logged in to like swords.');
    }

    $userId = session('user_id');
    $like = Like::where('user_id', $userId)->where('sword_id', $sword->id)->first();

    if ($like) {
        $like->delete();
        return back();
    }

    Like::create([
        'user_id' => $userId,
        'sword_id' => $sword->id,
    ]);

    return back();
});
