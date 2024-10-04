<?php

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

Route::get('/', [\App\Http\Controllers\HomeController::class, "index"])->name("/");
Route::get('/gallery', [\App\Http\Controllers\GalleryController::class, "index"])->name("gallery");
Route::get('/contact', [\App\Http\Controllers\ContactController::class, "index"])->name("contact");
Route::get('/signin', [\App\Http\Controllers\SigninController::class, "index"])->name("signin");
Route::get('/signup', [\App\Http\Controllers\SignupController::class, "index"])->name("signup");
Route::post('/register', [\App\Http\Controllers\SignupController::class, "signup"])->name("register");
Route::post("/signin", [\App\Http\Controllers\SigninController::class, "signin"])->name("signin.signin");
Route::post('/contact', [\App\Http\Controllers\ContactController::class, "store"]);
Route::post('/newsletter', [\App\Http\Controllers\NewsletterController::class, "subscribe"]);
Route::post("/comment", [\App\Http\Controllers\CommentController::class, "store"]);
Route::get('/galleryFilter', [\App\Http\Controllers\GalleryController::class, "index"])->name("galleryFilter");
Route::get('/author', [\App\Http\Controllers\AuthorController::class, "index"])->name("author");




Route::middleware(\App\Http\Middleware\logedUserMiddlevare::class)->group(function(){
    Route::get('/logout', [\App\Http\Controllers\SigninController::class, "logout"])->name("logout");
    Route::get('/reservation', [\App\Http\Controllers\ReservationController::class, "index"])->name("reservation");
    Route::get('/tables', [\App\Http\Controllers\ReservationController::class, "getTables"]);
    Route::patch('/reserve', [\App\Http\Controllers\ReservationController::class, "reserve"]);
    Route::get('/checkout', [\App\Http\Controllers\CheckoutController::class, "index"])->name("checkout");
    Route::delete('/removeReservationUser/{id}', [\App\Http\Controllers\ReservationController::class, "destroy"])->name("removeReservationUser");
    Route::post('/reservateAll', [\App\Http\Controllers\ReservationController::class, "store"]);
    Route::get('/reservations', [\App\Http\Controllers\ReservationsController::class, "index"])->name("reservations");
    Route::get('/account', [\App\Http\Controllers\AccountController::class, "index"])->name("account");
    Route::patch('/editAccount/{id}', [\App\Http\Controllers\AccountController::class, "update"])->name("editAccount");


});

Route::middleware(\App\Http\Middleware\isAdminMiddleware::class)->group(function(){
    Route::get('/adminPage', [\App\Http\Controllers\AdminController::class, "showAll"])->name("adminPage");
    Route::get('/tablesAdmin', [\App\Http\Controllers\TableController::class, "index"])->name("tablesAdmin");
    Route::get('/addTable', [\App\Http\Controllers\TableController::class, "create"])->name("addTable");
    Route::post('/addTable', [\App\Http\Controllers\TableController::class, "store"])->name("addTable");
    Route::delete('/removeTable/{id}', [\App\Http\Controllers\TableController::class, "destroy"]);
    Route::get('/editTable/{id}', [\App\Http\Controllers\TableController::class, "edit"])->name("editTable");
    Route::patch('/updateTable/{id}', [\App\Http\Controllers\TableController::class, "update"])->name("updateTable");
    Route::get('/levels', [\App\Http\Controllers\LevelController::class, "index"])->name("levels");
    Route::get('/addLevel', [\App\Http\Controllers\LevelController::class, "create"])->name("addLevel");
    Route::post('/addLevel', [\App\Http\Controllers\LevelController::class, "store"])->name("addLevel");
    Route::get('/editLevel/{id}', [\App\Http\Controllers\LevelController::class, "edit"])->name("editLevel");
    Route::patch('/editLevel/{id}', [\App\Http\Controllers\LevelController::class, "update"])->name("editLevel");
    Route::delete('/removeLevel/{id}', [\App\Http\Controllers\LevelController::class, "destroy"]);
    Route::get('/numbers', [\App\Http\Controllers\NumberController::class, "index"])->name("numbers");
    Route::get('/addNumber', [\App\Http\Controllers\NumberController::class, "create"])->name("addNumber");
    Route::post('/addNumber', [\App\Http\Controllers\NumberController::class, "store"])->name("addNumber");
    Route::delete('/removeNumber/{id}', [\App\Http\Controllers\NumberController::class, "destroy"]);
    Route::get('/editNumber/{id}', [\App\Http\Controllers\NumberController::class, "edit"])->name("editNumber");
    Route::patch('/editNumber/{id}', [\App\Http\Controllers\NumberController::class, "update"])->name("editNumber");
    Route::get('/numbers', [\App\Http\Controllers\NumberController::class, "index"])->name("numbers");
    Route::get('/galleries', [\App\Http\Controllers\GalleryAdminController::class, "index"])->name("galleries");
    Route::get('/addGallery', [\App\Http\Controllers\GalleryAdminController::class, "create"])->name("addGallery");
    Route::post('/addGallery', [\App\Http\Controllers\GalleryAdminController::class, "store"])->name("addGallery");
    Route::delete('/removeGallery/{id}', [\App\Http\Controllers\GalleryAdminController::class, "destroy"]);
    Route::get('/editGallery/{id}', [\App\Http\Controllers\GalleryAdminController::class, "edit"])->name("editGallery");
    Route::patch('/editGallery/{id}', [\App\Http\Controllers\GalleryAdminController::class, "update"])->name("editGallery");
    Route::get('/chefs', [\App\Http\Controllers\ChefController::class, "index"])->name("chefs");
    Route::get('/addChef', [\App\Http\Controllers\ChefController::class, "create"])->name("addChef");
    Route::post('/addChef', [\App\Http\Controllers\ChefController::class, "store"])->name("addChef");
    Route::delete('/removeChef/{id}', [\App\Http\Controllers\ChefController::class, "destroy"]);
    Route::get('/editChef/{id}', [\App\Http\Controllers\ChefController::class, "edit"])->name("editChef");
    Route::patch('/editChef/{id}', [\App\Http\Controllers\ChefController::class, "update"])->name("editChef");
    Route::get('/navigations', [\App\Http\Controllers\NavigationController::class, "index"])->name("navigations");
    Route::get('/addLink', [\App\Http\Controllers\NavigationController::class, "create"])->name("addLink");
    Route::post('/addLink', [\App\Http\Controllers\NavigationController::class, "store"])->name("addLink");
    Route::get('/editLink/{id}', [\App\Http\Controllers\NavigationController::class, "edit"])->name("editLink");
    Route::patch('/editLink/{id}', [\App\Http\Controllers\NavigationController::class, "update"])->name("editLink");
    Route::delete('/removeLink/{id}', [\App\Http\Controllers\NavigationController::class, "destroy"]);
    Route::get('/messages', [\App\Http\Controllers\ContactController::class, "showAll"])->name("messages");
    Route::delete('/removeMessage/{id}', [\App\Http\Controllers\ContactController::class, "destroy"]);
    Route::get("/comments", [\App\Http\Controllers\CommentController::class, "index"])->name("comments");
    Route::patch("/changeStatus/{id}", [\App\Http\Controllers\CommentController::class, "changeStatus"])->name("changeStatus");
    Route::delete('/removeComment/{id}', [\App\Http\Controllers\CommentController::class, "destroy"]);
    Route::get("/newsletter", [\App\Http\Controllers\NewsletterController::class, "index"])->name("newsletter");
    Route::get('/addSubscriber', [\App\Http\Controllers\NewsletterController::class, "create"])->name("addSubscriber");
    Route::post('/addSubscriber', [\App\Http\Controllers\NewsletterController::class, "store"])->name("addSubscriber");
    Route::get('/editSubscriber/{id}', [\App\Http\Controllers\NewsletterController::class, "edit"])->name("editSubscriber");
    Route::patch('/editSubscriber/{id}', [\App\Http\Controllers\NewsletterController::class, "update"])->name("editSubscriber");
    Route::delete('/removeSubscriber/{id}', [\App\Http\Controllers\NewsletterController::class, "destroy"]);
    Route::get("/categories", [\App\Http\Controllers\CategoryController::class, "index"])->name("categories");
    Route::get('/addCategory', [\App\Http\Controllers\CategoryController::class, "create"])->name("addCategory");
    Route::post('/addCategory', [\App\Http\Controllers\CategoryController::class, "store"])->name("addCategory");
    Route::get('/editCategory/{id}', [\App\Http\Controllers\CategoryController::class, "edit"])->name("editCategory");
    Route::patch('/editCategory/{id}', [\App\Http\Controllers\CategoryController::class, "update"])->name("editCategory");
    Route::delete('/removeCategory/{id}', [\App\Http\Controllers\CategoryController::class, "destroy"]);
    Route::get("/networks", [\App\Http\Controllers\SocialNetworkController::class, "index"])->name("networks");
    Route::get('/addNetwork', [\App\Http\Controllers\SocialNetworkController::class, "create"])->name("addNetwork");
    Route::get('/addNetwork', [\App\Http\Controllers\SocialNetworkController::class, "create"])->name("addNetwork");
    Route::post('/addNetwork', [\App\Http\Controllers\SocialNetworkController::class, "store"])->name("addNetwork");
    Route::get('/editNetwork/{id}', [\App\Http\Controllers\SocialNetworkController::class, "edit"])->name("editNetwork");
    Route::patch('/editNetwork/{id}', [\App\Http\Controllers\SocialNetworkController::class, "update"])->name("editNetwork");
    Route::delete('/removeNetwork/{id}', [\App\Http\Controllers\SocialNetworkController::class, "destroy"]);
    Route::get("/users", [\App\Http\Controllers\UserController::class, "index"])->name("users");
    Route::get('/addUser', [\App\Http\Controllers\UserController::class, "create"])->name("addUser");
    Route::post('/addUser', [\App\Http\Controllers\UserController::class, "store"])->name("addUser");
    Route::get('/editUser/{id}', [\App\Http\Controllers\UserController::class, "edit"])->name("editUser");
    Route::patch('/editUser/{id}', [\App\Http\Controllers\UserController::class, "update"])->name("editUser");
    Route::delete('/removeUser/{id}', [\App\Http\Controllers\UserController::class, "destroy"]);
    Route::get("/homePage", [\App\Http\Controllers\HomePageController::class, "index"])->name("homePage");
    Route::patch('/editHomePage/{id}', [\App\Http\Controllers\HomePageController::class, "update"])->name("editHomePage");
    Route::get('/viewNetworksForChef/{id}', [\App\Http\Controllers\ChefController::class, "show"])->name("viewNetworksForChef");
    Route::get('/addNetworkForChef/{id}', [\App\Http\Controllers\ChefController::class, "createNetwork"])->name("addNetworkForChef");
    Route::post('/addNetworkForChef', [\App\Http\Controllers\ChefController::class, "storeNetwork"])->name("addNetworkForChef2");
    Route::get('/editChefsNetwork/{id}/{idUser}', [\App\Http\Controllers\ChefController::class, "editNetwork"])->name("editChefsNetwork");
    Route::patch('/editNetworkForChef2/{id}', [\App\Http\Controllers\ChefController::class, "updateNetwork"])->name("editNetworkForChef2");
    Route::delete('/removeNetworkForChef/{id}', [\App\Http\Controllers\ChefController::class, "destroyNetwork"]);
    Route::get("/roles", [\App\Http\Controllers\RoleController::class, "index"])->name("roles");
    Route::get('/addRole', [\App\Http\Controllers\RoleController::class, "create"])->name("addRole");
    Route::post('/addRole', [\App\Http\Controllers\RoleController::class, "store"])->name("addRole");
    Route::get('/editRole/{id}', [\App\Http\Controllers\RoleController::class, "edit"])->name("editRole");
    Route::patch('/editRole/{id}', [\App\Http\Controllers\RoleController::class, "update"])->name("editRole");
    Route::delete('/removeRole/{id}', [\App\Http\Controllers\RoleController::class, "destroy"]);
    Route::get("/reservationsAdmin", [\App\Http\Controllers\ReservationAdminController::class, "index"])->name("reservationsAdmin");
    Route::get("/viewReservations/{id}", [\App\Http\Controllers\ReservationAdminController::class, "show"])->name("viewReservations");
    Route::get('/addReservationLine/{id}', [\App\Http\Controllers\ReservationAdminController::class, "createLine"])->name("addReservationLine");
    Route::post('/addLine', [\App\Http\Controllers\ReservationAdminController::class, "storeLine"])->name("addLine");
    Route::delete('/removeLine/{id}', [\App\Http\Controllers\ReservationAdminController::class, "destroyLine"]);
    Route::get('/editReservationLine/{id}/{idRes}', [\App\Http\Controllers\ReservationAdminController::class, "editLine"])->name("editReservationLine");
    Route::patch('/editLine/{id}', [\App\Http\Controllers\ReservationAdminController::class, "updateLine"])->name("editLine");
    Route::get('/addReservation', [\App\Http\Controllers\ReservationAdminController::class, "createReservation"])->name("addReservation");
    Route::post('/addReservation', [\App\Http\Controllers\ReservationAdminController::class, "storeReservation"])->name("addReservation");
    Route::delete('/removeReservation/{id}', [\App\Http\Controllers\ReservationAdminController::class, "destroyReservation"]);
    Route::get('/editReservation/{id}', [\App\Http\Controllers\ReservationAdminController::class, "editReservation"])->name("editReservation");
    Route::patch('/editReservation/{id}', [\App\Http\Controllers\ReservationAdminController::class, "updateReservation"])->name("editReservation");
    Route::delete('/removeActivity/{id}', [\App\Http\Controllers\AdminController::class, "destroy"]);
    Route::get('/activityFilter', [\App\Http\Controllers\AdminController::class, "index"])->name("activityFilter");


});
