<?php

use App\Http\Controllers\Admin\VendorRequestController;
use Illuminate\Support\Facades\Route;


Route::group(['middleware' => 'user_role', 'prefix'=> 'admin'], function(){
    Route::get('dashboard', 'MainController@dashborad')->name('admin.dashboard');
    Route::get('role/{id}', 'MainController@ChangeRole')->name('change.role');
    Route::get('remove-user/{id}', 'MainController@DeleteUser')->name('remove.user');
    Route::post('menu/{id}', 'MainController@ChangeStatus')->name('change.menu.status');
    Route::get('table-show','BookingController@table')->name('table.show');
    Route::get('verify-reservation','BookingController@VerifyReservation')->name('verify.reservation');
    Route::get('delete-table/{id}','BookingController@tableDestroy')->name('delete.table');
    Route::get('inquery','homeController@showInquery')->name('show.inquery');
    Route::get('mark-as-read','homeController@markAsRead')->name('mark.inquery');
    Route::get('delete-inquery/{id}','homeController@removeInquery')->name('delete.inquery');


    //Inventory
    Route::get('inventory','InventoryController@inventory')->name('inventory');
    Route::post('store-inventory','InventoryController@invStore')->name('store.inventory');
    Route::post('update-inventory/{id}','InventoryController@update')->name('update.inventory');
    Route::get('show-inventory','InventoryController@inventoryShow')->name('show.inventory');
    Route::get('delete-inventory/{id}','InventoryController@destroy')->name('delete.inventory');
    Route::get('edit-inventory/{id}','InventoryController@edit')->name('edit.inventory');



    //Product
    Route::get('index-product','ProductController@prodIndex')->name('index.product');
    Route::post('store-product','ProductController@prodStore')->name('store.product');
    Route::get('show-product','ProductController@prodShow')->name('show.product');
    Route::get('edit-product/{id}','ProductController@productEdit')->name('edit.product');
    Route::post('update-product','ProductController@productUpdate')->name('update.product');
    Route::get('delete-product/{id}','ProductController@productDestroy')->name('delete.product');
    Route::get('manage-order','ProductController@MangeOrder')->name('manage.order');
    Route::get('pass-order/{id}','ProductController@PassOrder')->name('pass.product');
    Route::any('delete-order/{id}','ProductController@DeleteOrder')->name('delete.item');
    Route::get('track-order/{id}','ProductController@TrackOrder')->name('track.order');


    //category
    Route::post('store-category', 'ProductController@StoreCat')->name('store.category');
    Route::get('remove-category/{id}', 'ProductController@RemoveCat')->name('remove.category');
    Route::get('product-category', 'ProductController@AllCat')->name('list.category');

    // Vendor Request
    Route::get('get-vendor-requests', 'Admin\VendorRequestController@index')->name('admin.get_vendor_request');
    Route::post('make-vendor', 'Admin\VendorRequestController@makeVendor')->name('admin.makeVendor');
});



Route::get('rating/{id}', 'MainController@RateMe')->name('rate.page');
Route::post('submit-rating', 'MainController@RateMeSubmit')->name('rating.submited');





