<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ProvinceController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PaymentMethodController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\PurchaseDetailController;
use App\Http\Controllers\UserController;

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

Route::get('/', function () {
    return view('welcome2');
});

Route::get('/index', [ProductController::class, 'getMostSelled'])->name('index');

Auth::routes(['reset' => true]);
Auth::routes([ 'verify' => true ]);

Route::resource('/category', CategoryController::class);
Route::resource('/employee', EmployeeController::class);

Route::resource('payment-methods', App\Http\Controllers\PaymentMethodController::class);

Auth::routes();

Route::get('/main', [CategoryController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', [CategoryController::class, 'index'])->name('home');
});

Route::resource('/products', ProductController::class);

Route::get('/searchByID', [ProductController::class, 'searchById'])->name('products.searchByID')->middleware('auth');

/* RUTAS DE UBIGEO */
Route::get('/department', [DepartmentController::class, 'index']);
Route::post('/provinces', [ProvinceController::class, 'getProvincesByDepartment']);
Route::post('/districts', [DistrictController::class, 'getDistrictByProvince']);


/* RUTAS CATALOGO */
Route::get('/catalogue', [ProductController::class, 'catalogue'])->name('catalogue');
Route::get('/catalogue/{categoryId}',[ProductController::class, 'filterByCategory'])->name('filterByCategory');

/* CONSULTAR POR ID */
// Categoria
Route::get('/consultarCategoriaPorID', [CategoryController::class, 'consultarCategoriaPorID'])->name('category.consultarCategoriaPorID')->middleware('auth');
// Producto
Route::get('/consultarProductoPorID', [ProductController::class, 'consultarProductoPorID'])->name('product.consultarProductoPorID')->middleware('auth');
// Metodo de pago
Route::get('/consultarMetodoPagoPorID', [PaymentMethodController::class, 'consultarMetodoPagoPorID'])->name('payment-methods.consultarMetodoPagoPorID')->middleware('auth');
// Empleado
Route::get('/consultarEmpleadoPorID', [EmployeeController::class, 'consultarEmpleadoPorID'])->name('employee.consultarEmpleadoPorID')->middleware('auth');

/*RUTAS DETALLE PRODUCTO*/
Route::get('/productdetail/{productId}',[ProductController::class, 'productById'])->name('productById');
Route::get('/product/historial', [ProductController::class, 'historialVentas'])->name('historial');
Route::get('/product/publicaciones', [ProductController::class, 'editProducto'])->name('editarPublicaciones');
Route::post('/product/edit-product', [ProductController::class, 'updateProducto'])->name(('editarProduct'));


/*RUTAS DETALLE DE COMPRA*/
Route::get('purchaseDetail',[PurchaseDetailController::class, 'index'])->name('shoppingCart')->middleware('auth');
Route::get('purchaseDetailJson',[PurchaseDetailController::class, 'indexJson'])->name('shoppingCartJson')->middleware('auth');
Route::post('purchaseDetail',[PurchaseDetailController::class, 'addToCart'])->name('addToCart')->middleware('auth');
Route::put('updatePurchaseDetail',[PurchaseDetailController::class, 'updateCart'])->name('updateCart')->middleware('auth');
Route::delete('deleteFromPurchaseDetail/{id}',[PurchaseDetailController::class, 'deleteFromCart'])->name('deleteFromCart')->middleware('auth');

/* RUTA COMPRAR*/
Route::get('finish-purchase', [PurchaseController::class, 'toBuy'])->name('finish-purchase')->middleware('auth');


Route::get('/menu/nosotros', [HomeController::class, 'nosotros'])->name('nosotros');
Route::get('/menu/contacto', [HomeController::class, 'contacto'])->name('contacto');
Route::get('/menu/ayuda', [HomeController::class, 'ayuda'])->name('ayuda');


/*RUTAS DE COMPRA*/
Route::get('finishPurchase', [PurchaseDetailController::class, 'finishPurchase'])->name('finishPurchase');

// MIS COMPRAS
Route::get('/misCompras', [UserController::class, 'misCompras'])->name('misCompras')->middleware('auth');
Route::get('create-product', [HomeController::class, 'register'])->name('create.product');
Route::post('create-product', [HomeController::class, 'store'])->name('product.store')->middleware('auth');

// MI PERFIL
Route::get('myprofile', [UserController::class, 'myprofile'])->name('myprofile')->middleware('auth');
Route::post('updateProfile', [UserController::class, 'updateProfile'])->name('updateProfile')->middleware('auth');

// FILTRAR PRODUCTOS POR NOMBRE
Route::get('/filtrarProductosPorNombre', [ProductController::class, 'filtrarProductosPorNombre'])->name('filtrarProductosPorNombre');