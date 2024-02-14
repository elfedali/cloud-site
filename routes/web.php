<?php

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
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {

    Route::get('/', function () {
        return view(
            'admin.dashboard.index',
            [
                'users' => \App\Models\User::count(),
                'terms' => \App\Models\Term::count(),
                'shops' => \App\Models\Shop::count(),
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
        //     return redirect()->route('admin.media')->with('success', 'Data saved');
        // }
        return view('admin.media.index', ['medias' => \App\Models\Document::all()]);
    })->name('admin.media.index');


    Route::match(['get'], "/terms", function (Request $request) {
        $term_type = $request->input('term_type') ?? 'kitchen';
        return view(
            'admin.terms.index',
            [
                'terms' => \App\Models\Term::where('taxonomy', $term_type)->get(),
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
            $term->taxonomy = $term_type;
            $term->save();
            return redirect()->route('admin.terms.index', ['term_type' => $term_type])->with('success', 'Data saved');
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
            return redirect()->route('admin.terms.index', ['term_type' => $term->taxonomy])->with('success', 'Data saved');
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
                'confirm_password' => 'required|string|min:8|same:password',
                // 'role' => 'required|string|max:255|in:admin,user',
            ]);
            $data = $request->all();
            $user = new \App\Models\User();
            $user->name = $data['name'];
            $user->email = $data['email'];
            $user->password = Hash::make($data['password']);
            $user->role = \App\Models\User::ROLE_USER; // default role
            $user->save();
            return redirect()->route('admin.users.index')->with('success', 'Data saved');
        }
        return view('admin.users.user_create');
    })->name('admin.users.create');



    Route::match(['get', 'post'], '/users', function (Request $request) {
        // if ($request->isMethod('post')) {
        //     $data = $request->all();
        //     $user = new \App\Models\User();
        //     $user->name = $data['name'];
        //     $user->email = $data['email'];
        //     $user->password = bcrypt($data['password']);
        //     $user->role = $data['role'];
        //     $user->save();
        //     return redirect()->route('admin.users')->with('success', 'Data saved');
        // }
        return view(
            'admin.users.index',
            [
                'users' => \App\Models\User::all()
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
                // 'role' => 'required|string|max:255|in:admin,user',
            ]);
            $data = $request->all();
            $user->name = $data['name'];
            $user->email = $data['email'];
            // $user->role = $data['role'];
            //TODO: if email is changed, send email to user
            // if ($user->email != $data['email']) {
            //     $user->email_verified_at = null;
            //     $user->sendEmailVerificationNotification();
            // }
            $user->save();
            return redirect()->route('admin.users.index')->with('success', 'Data saved');
        }
        if ($request->isMethod('delete')) {
            $user->delete();
            return redirect()->route('admin.users.index')->with('success', 'Data deleted');
        }
        return view('admin.users.user_edit', ['user' => $user]);
    })->name('admin.users.edit');


    // shops
    Route::match(['get', 'post'], '/shops', function (Request $request) {
        if ($request->isMethod('post')) {
            $data = $request->all();
            $shop = new \App\Models\Shop();
            $shop->name = $data['name'];
            $shop->address = $data['address'];
            $shop->phone = $data['phone'];
            $shop->save();
            return redirect()->route('admin.shops.index')->with('success', 'Data saved');
        }
        return view(
            'admin.shops.index',
            [
                'shops' => \App\Models\Shop::all()
            ]
        );
    })->name('admin.shops.index');

    // shops create
    Route::match(['get', 'post'], '/shops/create', function (Request $request) {
        if ($request->isMethod('post')) {
            // validate request
            $request->validate([
                'name' => 'required|string|max:255',
                'address' => 'required|string|max:255',
                'phone' => 'required|string|max:255',
            ]);
            $data = $request->all();
            $shop = new \App\Models\Shop();
            $shop->name = $data['name'];
            $shop->address = $data['address'];
            $shop->phone = $data['phone'];
            $shop->save();
            return redirect()->route('admin.shops.index')->with('success', 'Data saved');
        }
        return view('admin.shops.shop_create');
    })->name('admin.shops.create');

    // shops edit update delete
    Route::match(['get', 'put', 'delete'], '/shops/{id}/edit', function (Request $request, $id) {
        $shop = \App\Models\Shop::find($id);
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
            ]);
            $shop->update($request->all());
            $shop->save();
            return redirect()->route(
                'admin.shops.edit',
                ['id' => $shop->id]

            )->with('success', 'Data saved');
        }
        if ($request->isMethod('delete')) {
            $shop->delete();
            return redirect()->route('admin.shops.index')->with('success', 'Data deleted');
        }
        return view(
            'admin.shops.shop_edit',
            [
                'shop' => $shop,
                'kitchen' => \App\Models\Term::where('taxonomy', 'kitchen')->get(),
                'services' => \App\Models\Term::where('taxonomy', 'service')->get(),
                'users' => \App\Models\User::all(),

            ]
        );
    })->name('admin.shops.edit');
});



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
