<?php

use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// groupe admin
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin.role']], function () {

    Route::get('/', function () {
        return view(
            'admin.dashboard.index',
            [
                'users' => \App\Models\User::count(),
                'terms' => \App\Models\Term::count(),
                'shops' => \App\Models\Shop::where('type', Shop::TYPE_RESTAURANT)->count(),
                'medias' => \App\Models\Document::count(),
                'kitchen_terms' => \App\Models\Term::where('taxonomy', 'kitchen')->count(),
                'service_terms' => \App\Models\Term::where('taxonomy', 'service')->count(),
            ]
        );
    })->name('admin.dashboard');

    // media
    Route::match(['get', 'post'], '/documents', function (Request $request) {
        // if ($request->isMethod('post')) {
        //     $data = $request->all();
        //     $media = new \App\Models\Media();
        //     $media->name = $data['name'];
        //     $media->url = $data['url'];
        //     $media->save();
        //     return redirect()->route('admin.media')->with('success', __('label.data_saved'));
        // }
        return view('admin.media.index', ['medias' => \App\Models\Document::all()]);
    })->name('admin.media.index');


    Route::match(['get'], "/terms", function (Request $request) {
        $term_type = $request->input('term_type') ?? 'kitchen';
        return view(
            'admin.terms.index',
            [
                'terms' => \App\Models\Term::where('taxonomy', $term_type)->orderBy('id', 'desc')->get(),
                'term_type' => $term_type ?? 'kitchen',
            ]
        );
    })->name('admin.terms.index');

    Route::match(['get', 'post'], "/terms/create", function (Request $request) {
        $term_type = $request->input('term_type') ?? 'kitchen';




        if ($request->isMethod('post')) {
            // validate request
            $request->validate([
                'name' => 'required|string|max:255',
                'taxonomy' => 'required|string|max:255|in:kitchen,service',
            ]);



            $data = $request->all();

            $term = new \App\Models\Term();
            $term->name = $data['name'];
            $term->taxonomy = $data['taxonomy'] ?? 'unknown';
            $term->save();

            return redirect()->route('admin.terms.index', ['term_type' => $data['taxonomy']])->with('success', __('label.data_saved'));
        }
        return view('admin..terms.term_create', ['term_type' => $term_type]);
    })->name('admin.terms.create');

    // edit update term
    Route::match(['get', 'put', 'delete'], "/terms/{id}/edit", function (Request $request, $id) {
        $term = \App\Models\Term::find($id);
        if ($request->isMethod('put')) {
            // validate request
            $request->validate([
                'name' => 'required|string|max:255',
                // 'taxonomy' => 'required|string|max:255|in:kitchen,service',
            ]);

            $data = $request->all();
            $term->name = $data['name'];
            // $term->taxonomy = $data['taxonomy'];
            $term->save();
            return redirect()->route('admin.terms.index', ['term_type' => $term->taxonomy])->with('success', __('label.data_saved'));
        }
        if ($request->isMethod('delete')) {
            $term->delete();
            return redirect()->route('admin.terms.index', ['term_type' => $term->taxonomy])->with('success', 'Data deleted');
        }
        return view('admin.terms.term_edit', ['term' => $term]);
    })->name('admin.terms.edit');

    // user create
    Route::match(['get', 'post'], '/users/create', function (Request $request) {
        if ($request->isMethod('post')) {
            // validate request
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:8',
                'password_confirmation' => 'required|string|min:8|same:password',
                'role' => 'required|string|max:255|in:admin,user,commercial,super_admin,super_admin',
                'phone' => 'required|string|max:255',
                'address' => 'nullable|string|max:255',
                'city' => 'nullable|string|max:255',
                'zip' => 'nullable|string|max:255',
                'country' => 'nullable|string|max:255',
                'username' => 'required|string|max:255|unique:users',


            ]);
            $data = $request->all();
            $data['role'] = $data['role'] ?? \App\Models\User::ROLE_USER;
            $data['password'] = Hash::make($data['password']);

            $user = new \App\Models\User();
            $user->fill($data);
            $user->password = $data['password'];
            $user->createdby_id = Auth::user()->id;


            $user->save();
            return redirect()->route('admin.users.edit', ['id' => $user->id])->with('success', __('label.data_saved'));
        }
        return view('admin.users.user_create');
    })->name('admin.users.create');

    // Get all users
    Route::get('/users', function (Request $request) {
        return view(
            'admin.users.index',
            [
                'users' => \App\Models\User::all()->sortByDesc('id')
            ]
        );
    })->name('admin.users.index');

    // users edit update delete
    Route::match(['get', 'put', 'delete'], '/users/{id}/edit', function (Request $request, $id) {
        $user = \App\Models\User::find($id);
        if ($request->isMethod('put')) {
            // validate request
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255',
                'role' => 'required|string|max:255|in:admin,user,commercial,super_admin',
                'password' => 'nullable|string|min:8',
                'password_confirmation' => 'nullable|string|min:8|same:password',
                'phone' => 'required|string|max:255',
                'address' => 'nullable|string|max:255',
                'city' => 'nullable|string|max:255',
                'zip' => 'nullable|string|max:255',
                'country' => 'nullable|string|max:255',
                'username' => 'required|string|max:255',

            ]);
            $data = $request->all();


            $user->update([
                'name' => $data['name'],
                'email' => $data['email'],
                'role' => $data['role'],
                'phone' => $data['phone'],
                'address' => $data['address'],
                'city' => $data['city'],
                'zip' => $data['zip'],
                'country' => $data['country'],
                'username' => $data['username'],

            ]);
            if (isset($data['password']) && $data['password'] != null) {
                $user->password = Hash::make($data['password']);
            }
            // 
            $user->save();
            return redirect()->route('admin.users.edit', ['id' => $user->id])->with('success', __('label.data_saved'));
        }
        if ($request->isMethod('delete')) {
            foreach ($user->shops as $shop) {
                $shop->delete();
            }
            $user->delete();
            return redirect()->route('admin.users.index')->with('success', 'Data deleted');
        }
        return view('admin.users.user_edit', ['user' => $user]);
    })->name('admin.users.edit');


    // shops
    Route::get('/shops', function (Request $request) {

        return view(
            'admin.shops.index',
            [
                'shops' => \App\Models\Shop::where('type', Shop::TYPE_RESTAURANT)
                    ->with('owner')
                    ->orderBy('id', 'desc')
                    ->get()
            ]
        );
    })->name('admin.shops.index');

    // shops create
    Route::match(['get', 'post'], '/shops/create', function (Request $request) {
        if ($request->isMethod('post')) {
            // validate request
            $request->validate(
                [
                    'title' => 'required|string|max:255',
                    'description' => 'required|string',
                    'excerpt' => 'required|string',
                    'status' => 'required|in:draft,published',
                    'comment_status' => 'required|in:open,closed',
                    'ping_status' => 'required|in:open,closed',
                    'kitchens' => 'nullable|array|exists:terms,id',
                    'services' => 'nullable|array|exists:terms,id',

                    'email' => 'nullable|email',
                    'phone' => 'nullable|string',
                    'mobile' => 'nullable|string',
                    'address' => 'nullable|string',
                    'city' => 'nullable|string',
                    'zipcode' => 'nullable|string',
                    'country' => 'nullable|string',
                    'tiktok' => 'nullable|string',
                    'facebook' => 'nullable|string',
                    'instagram' => 'nullable|string',
                    'youtube' => 'nullable|string',

                ]

            );
            $data = $request->all();
            $shop = new \App\Models\Shop();
            $shop->fill($data);
            $shop->type = Shop::TYPE_RESTAURANT;
            $shop->createdby_id = Auth::user()->id;
            $shop->save();
            $shop->terms()->sync(array_merge($data['kitchens'] ?? [], $data['services'] ?? []));

            return redirect()->route('admin.shops.edit', ['shop' => $shop])->with('success', __('label.data_saved'));
        }
        return view(
            'admin.shops.shop_create',
            [
                'users' => \App\Models\User::all(),
                'kitchens' => \App\Models\Term::where('taxonomy', 'kitchen')->get(),
                'services' => \App\Models\Term::where('taxonomy', 'service')->get(),

            ]
        );
    })->name('admin.shops.create');

    // shops edit update delete
    Route::match(['get', 'put', 'delete'], '/shops/{shop}/edit', function (Request $request, \App\Models\Shop $shop) {
        if ($shop->type != Shop::TYPE_RESTAURANT) {
            throw new \Exception('Invalid type');
        }
        if ($request->isMethod('put')) {
            // validate request
            $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'required|string',
                'excerpt' => 'required|string',
                'status' => 'required|in:draft,published',
                //'type' => 'required|in:post,page',
                'comment_status' => 'required|in:open,closed',
                'ping_status' => 'required|in:open,closed',
                'kitchens' => 'nullable|array|exists:terms,id',
                'services' => 'nullable|array|exists:terms,id',

                'email' => 'nullable|email',
                'phone' => 'nullable|string',
                'mobile' => 'nullable|string',
                'address' => 'nullable|string',
                'city' => 'nullable|string',
                'zipcode' => 'nullable|string',
                'country' => 'nullable|string',
                'tiktok' => 'nullable|string',
                'facebook' => 'nullable|string',
                'instagram' => 'nullable|string',
                'youtube' => 'nullable|string',
            ]);
            $shop->update($request->all());

            $shop->save();
            $shop->terms()->sync(array_merge($request->input('kitchens') ?? [], $request->input('services') ?? []));
            return redirect()->route(
                'admin.shops.edit',
                ['shop' => $shop]

            )->with('success', __('label.data_saved'));
        }
        if ($request->isMethod('delete')) {
            $shop->delete();
            return redirect()->route('admin.shops.index')->with('success', 'Data deleted');
        }
        return view(
            'admin.shops.shop_edit',
            [
                'shop' => $shop,
                'kitchens' => \App\Models\Term::where('taxonomy', 'kitchen')->get(),
                'services' => \App\Models\Term::where('taxonomy', 'service')->get(),
                'users' => \App\Models\User::all(),

            ]
        );
    })->name('admin.shops.edit');


    // route shop menu
    Route::match(['get', 'post'], '/shops/{shop}/menu', [\App\Http\Controllers\Shop\ShopMenuController::class, 'shopMenu'])->name('admin.shops.menu');
    Route::delete('/shops/{shop}/menu/{menu}/destroy', [\App\Http\Controllers\Shop\ShopMenuController::class, 'destroy'])->name('admin.shops.menu.destroy');
    Route::put('/shops/{shop}/menu/{menu}/update', [\App\Http\Controllers\Shop\ShopMenuController::class, 'update'])->name('admin.shops.menu.update');

    // route shop menu item
    Route::put('/shops/{shop}/menu/{menu}/addItem', [\App\Http\Controllers\Shop\ShopMenuItemController::class, 'addItem'])->name('admin.shops.menu.addItem');
    Route::put('/shops/{shop}/menu/{menu}/item/{item}/update', [\App\Http\Controllers\Shop\ShopMenuItemController::class, 'updateMenuItem'])->name('admin.shops.menu.item.update');
    Route::delete('/shops/{shop}/menu/{menu}/item/{item}/destroy', [\App\Http\Controllers\Shop\ShopMenuItemController::class, 'destroyMenuItem'])->name('admin.shops.menu.item.destroy');

    // shop images
    Route::match(['get', 'post'], '/shops/{shop}/images', [\App\Http\Controllers\Shop\ShopImageController::class, 'uploadImage'])->name('admin.shops.images');
    Route::delete('/shops/{shop}/images/{image}/destroy', [\App\Http\Controllers\Shop\ShopImageController::class, 'destroyImage'])->name('admin.shops.images.destroy');

    // shop seo
    Route::match(['get', 'post'], '/shops/{shop}/seo', [\App\Http\Controllers\Shop\ShopSeoController::class, 'shopSeo'])->name('admin.shops.seo');
    Route::put('/shops/{shop}/seo/update', [\App\Http\Controllers\Shop\ShopSeoController::class, 'updateSeo'])->name('admin.shops.seo.update');

    // shop opening hours
    Route::match(['get', 'post'], '/shops/{shop}/opening-hours', [\App\Http\Controllers\Shop\ShopOpeningHourController::class, 'shopOpeningHours'])->name('admin.shops.opening-hours');
    Route::put('/shops/{shop}/opening-hours/update', [\App\Http\Controllers\Shop\ShopOpeningHourController::class, 'updateOpeningHours'])->name('admin.shops.opening_hours.update');
    //phone
    Route::match(['get', 'post'], '/shops/{shop}/phone', [\App\Http\Controllers\Shop\ShopPhoneController::class, 'shopPhone'])->name('admin.shops.phone');
});



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
