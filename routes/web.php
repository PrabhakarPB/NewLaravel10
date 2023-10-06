<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Profile\AvatarController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use App\Models\Members;
use App\Models\User;

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
 
    //Raw Sql queries
    // //fetch all members
    // $members = DB::select('Select * from members');
    // dd($members);
    // //fetch based on id 
    // $members = DB::select('Select * from members where email="prabhakarbudkuley@gmail.com"');
    // dd($members);
    ////create members
    // $members = DB::insert('INSERT INTO `members`( `name`, `email`, `password`, `address`) VALUES (?,?,?,?)', ['Shubhman Gill', 'shubhmangill@gmail.com', 'shubhman31', 'Punjab']);
    // dd($members);
    ////update  
    // $members = DB::update('Update members set email="prabhakar12@gmail.com" where id=37');
    // dd($members);
    ////delete
    // $members = DB::delete('Delete from members where id=35');
    // dd($members);



    //Using query builder
    // //get all
    // $members = DB::table('members')->get();
    // dd($members);

    // //get from id
    // $members = DB::table('members')->where('id', 31)->get();
    // dd($members);

    //     //insert 
    //     $members = DB::table('members')->insert([
    //         'name' => "Virat Kohli",
    //         'email' => "viratkohli@gmail.com",
    //         'password' => "virat18",
    //         'address' => 'Delhi',
    //     ]);
    //     dd($members);

    // //update
    // $members = DB::table('members')->where('id', 39)
    //     ->update([
    //         'email' => 'viratkohli18@gmail.com',
    //     ]);
    // dd($members);

    // //delete
    // $members = DB::table('members')
    //     ->where('id', 37)
    //     ->delete();
    // dd($members);


    // //to get first member 
    // $members = DB::table('members')->first();
    // dd($members);

    // //to fetch id 
    // $members = DB::table('members')->find(1);
    // dd($members);


    //Eloquent Object-Relational-Mapper(ORM)
    // //fetch
    // $members = Members::where('id', 1)->first();
    // dd($members);


    //insert 
    // $members = Members::create(
    //     [
    //         'name' => 'Shreyas Iyer',
    //         'email' => 'shreyasiyer@gmail.com',
    //         'password' => 'shreyas78',
    //         'address' => 'Mumbai',
    //     ]
    // );
    // dd($members);

    // $members = Members::insert(
    //     [
    //         'name' => 'Hardik Pandya',
    //         'email' => 'hardikpandya33@gmail.com',
    //         'password' => 'hardik33',
    //         'address' => 'Gujarat',
    //     ]
    // );
    // dd($members);

    //update
    // $members = Members::where('id', 41)->first();
    // $members=Members::find(41);
    // $members->update([
    //     'email' => 'hardikpandya@gmail.com'
    // ]);
    // dd($members);

    // //delete
    // $members = Members::find(33);
    // $members->delete();
    // dd($members);

    // $user = DB::insert(
    //     'insert into users(name,email,password) Values(?,?,?)',
    //     [
    //         "Prabhakar 1",
    //         "prabhakarbudkuley1@gmail.com",
    //         "password"
    //     ]
    // );

    // $user = DB::table('users')->insert(
    //     [
    //         'name' => 'Prabhakar 2',
    //         'email' => 'prabhakarbudkuley2@gmail.com',
    //         'password' => 'password'
    //     ]
    // );

    // $user = User::create([
    //     'name' => 'Prabhakar 3',
    //     'email' => 'prabhakarbudkuley3@gmail.com',
    //     'password' => 'password',
    // ]);
    // $user = User::create([
    //     'name' => 'Prabhakar 4',
    //     'email' => 'prabhakarbudkuley4@gmail.com',
    //     'password' => bcrypt('password'),
    // ]);



    // //mutators
    // $user = User::create([
    //     'name' => 'Prabhakar 5',
    //     'email' => 'prabhakarbudkuley5@gmail.com',
    //     'password' => bcrypt('password'),
    // ]);
    // $users = User::all();

    //accessors
    // $user = User::find(4);

    // dd($user->name);

});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::patch('/profile/avatar', [AvatarController::class, 'update'])->name('profile.avatar');

    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
