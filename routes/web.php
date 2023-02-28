<?php

use GuzzleHttp\Middleware;
use App\Http\Livewire\CartComponent;
use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\ShopComponent;
use App\Actions\Jetstream\DeleteUser;
use App\Http\Controllers\StripeController;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\DetailsComponent;
use App\Http\Livewire\SearchComponenet;
use App\Http\Livewire\CheckoutComponent;
use App\Http\Livewire\HeaderSearchComponent;
use App\Http\Livewire\Admin\AddProductComponent;
use App\Http\Livewire\Admin\AddCategoryComponent;
use App\Http\Livewire\Admin\EditProductComponent;
use App\Http\Livewire\ProductbycategoryComponent;
use App\Http\Livewire\Admin\AdminProductComponent;
use App\Http\Livewire\Admin\EditCategoryComponent;
use App\Http\Livewire\User\UserDashboardComponent;
use App\Http\Livewire\Admin\AdminCategoryComponent;
use App\Http\Livewire\Admin\AdminDashboardComponent;
use App\Http\Livewire\Admin\DeleteCategoryComponent;
use App\Http\Livewire\Admin\AdminHomeSliderComponent;
use App\Http\Livewire\Admin\AdminAddHomeSliderComponent;
use App\Http\Livewire\Admin\AdminEditHomeSliderComponent;
use App\Http\Livewire\InvoiceComponent;
use App\Http\Livewire\StripeComponent;
use App\Http\Livewire\Thankyou;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', HomeComponent::class)->name('/');
route::any('/thank', Thankyou::class);
Route::get('/shop', ShopComponent::class);
Route::get('/cart', CartComponent::class)->name('product.cart');
Route::get('/checkout', CheckoutComponent::class)->name('check-out');
Route::get('/product/{slug}', DetailsComponent::class)->name('product.details');
Route::get('/category/{slug}', ProductbycategoryComponent::class)->name('category.details');
Route::get('/search', SearchComponenet::class)->name('product.search');
Route::get('/stripe', StripeComponent::class)->name('stripe');
Route::get('/invoice', InvoiceComponent::class)->name('invoice');
// route::get('/check', [StripeController::class, 'index']);
// Route::get('success', [StripeController::class, 'index'])->name('stripe-success');

// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified'
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });
//routes for ccustomer/user
Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('user/dashboard', UserDashboardComponent::class)->name('user.dashboard');
});
//routes for admin
Route::middleware(['auth:sanctum', 'verified', 'authadmin'])->group(function () {
    Route::get('admin/dashboard', AdminDashboardComponent::class)->name('admin.dashboard');
    Route::get('admin/categories', AdminCategoryComponent::class)->name('admin.categories');
    Route::get('admin/categories/addcategory', AddCategoryComponent::class)->name('admin.categories.addcategories');
    Route::get('admin/categories/editcategory/{id}', EditCategoryComponent::class)->name('admin.categories.editcategories');
    Route::get('admin/products', AdminProductComponent::class)->name('admin.products');
    Route::get('admin/categories/addproduct', AddProductComponent::class)->name('admin.product.addproducts');
    Route::get('admin/categories/editproduct/{id}', EditProductComponent::class)->name('admin.product.editproducts');
    Route::get('admin/homeslider', AdminHomeSliderComponent::class)->name('admin.homeslider');
    Route::get('admin/addhomeslider', AdminAddHomeSliderComponent::class)->name('admin.addhomeslider');
    Route::get('admin/edithomeslider', AdminEditHomeSliderComponent::class)->name('admin.edithomeslider');
});
