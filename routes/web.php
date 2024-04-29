<?php

use App\Http\Controllers\Dashboard\CatalogSettingsController;
use App\Http\Controllers\Dashboard\PaperMenu\PaperMenuController;
use App\Http\Controllers\Dashboard\PaperMenu\PaperMenuItemController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Dashboard\OrderController as AdminOrderController;
use App\Http\Controllers\Dashboard\MenuController as AdminMenuController;
use App\Http\Controllers\Dashboard\BlockController as AdminBlocksController;
use App\Http\Controllers\Dashboard\GalleryController as AdminGalleryController;
use App\Http\Controllers\Dashboard\InteriorController as AdminInteriorController;
use App\Http\Controllers\Dashboard\PageController as AdminPagesController;
use App\Http\Controllers\Dashboard\PaperController as AdminPaperController;
use App\Http\Controllers\Dashboard\ImagesController as AdminImagesController;
use App\Http\Controllers\Dashboard\CategoriesController as AdminCategoriesController;
use App\Http\Controllers\Dashboard\GoodsController as AdminGoodsController;
use App\Http\Controllers\Dashboard\GoodsItemController as AdminGoodsItemController;


use App\Models\Admin\Gallery;
use App\Models\Admin\Interior;
use App\Models\Admin\Page;
use App\Models\Blocks;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Facades\DB;
use App\Models\Admin\Goods;
use App\Models\Admin\GoodsItems;
use App\Models\Admin\GoodsCats;
//use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
//use Mcamara\LaravelLocalization\LaravelLocalization;

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

//Route::get('/phpinfo', function () {
//    phpinfo();
//});


//Route::get('/gal', function () {
//    $gallery = Gallery::query()->get();
//    foreach ($gallery as $q){
//        $q->delete();
//    }
//
//    for ($i = 1; $i < 60; $i++) {
//        if(strlen($i) < 2){
//            $path = 'gal/0'.$i.'.jpg';
//            $pathS = 'gal/0'.$i.'-s.jpg';
//        }else{
//            $path = 'gal/'.$i.'.jpg';
//            $pathS = 'gal/'.$i.'-s.jpg';
//        }
//        Gallery::query()->create([
//            'path' => $path,
//            'path_s' => $pathS,
//            'order' => $i
//        ]);
//    }
//
//
//
//    $rowsToRemove = Gallery::query()->whereIn('order', ['10',20,30,40,50])->get();
//
//    foreach ($rowsToRemove as $r){
//        $r->delete();
//    }
//
//    $reorder = Gallery::query()->orderBy('order', 'asc')->get();
//
//    $j = 1;
//    foreach ($reorder as $w){
//        $w->update([
//           'order' => $j
//        ]);
//        $j++;
//    }
//});

//Route::get('/qwe', function () {
//
//    $data = (object) [
////        'GoodsCats' => GoodsCats::select('id', 'title_ru', 'description_ru', )->get(),
//        'Goods' => Goods::select('id', 'title_ru', 'description_ru', 'desc_ru' )->get(),
////        'GoodsItems' => GoodsItems::select('id', 'title_ru', 'weightKind')->get(),
////        'Pages' => Page::select('id', 'title_ru', 'description_ru', 'content_ru')->get(),
//    ];
//
//    Storage::disk('public')->put('images.json', json_encode($data, JSON_UNESCAPED_UNICODE));
//
//});

Route::group(['prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localizationRedirect', 'localeViewPath' ]], function()
{
    /** ADD ALL LOCALIZED ROUTES INSIDE THIS GROUP **/
    Route::get('/', [PageController::class, 'main_page']);
    Route::get('/menu', [PageController::class, 'menu']);
    Route::get('/delivery', [PageController::class, 'delivery']);
    Route::get('/conception', [PageController::class, 'conception']);
    Route::get('/contact', [PageController::class, 'contacts']);
    Route::get('/gallery', [PageController::class, 'gallery']);
    Route::get('/interior', [PageController::class, 'interior']);
    Route::get('/aktsii', [PageController::class, 'promotions']);
    Route::get('/news', [PageController::class, 'news']);
    Route::get('/cart', [CartController::class, 'index']);
//
    Route::post('/order-create', [OrderController::class, 'order_create'])->name('order.create');
    Route::get('/order-accepted', [OrderController::class, 'order_accepted'])->name('order.accepted');



});




//
//
//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');



// Catalog Settings
Route::get('/dashboard/catalog-settings/{flag}', [CatalogSettingsController::class, 'is_online_order'])->name('catalog_settings.is_online_order');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index']);

    // orders
    Route::get('/dashboard/orders', [AdminOrderController::class, 'index']);
    Route::get('/dashboard/orders/done', [AdminOrderController::class, 'orders_done']);
    Route::get('/dashboard/orders/{id}', [AdminOrderController::class, 'show']);
    Route::get('/dashboard/orders/set-status/{id}', [AdminOrderController::class, 'set_status']);
    Route::get('/dashboard/orders/remove/{id}', [AdminOrderController::class, 'remove_order']);

    // menu
    Route::get('/dashboard/menu', [AdminMenuController::class, 'index'])->name('menu.show');

    // menu categories
    Route::resources([
        'category' => AdminCategoriesController::class,
    ]);
    Route::post('/dashboard/menu/categories/update-prices-in-cat', [AdminCategoriesController::class, 'update_prices_in_cat'])->name('category.update_prices_in_cat');
    Route::post('/dashboard/menu/categories/{id}', [AdminCategoriesController::class, 'update2'])->name('category.update2');
    Route::get('/dashboard/menu/categories/{id}/show/{show_flag}', [AdminCategoriesController::class, 'show_category'])->name('category.show_category');
    Route::get('/dashboard/menu/categories/remove/{id}', [AdminCategoriesController::class, 'destroy2'])->name('category.destroy2');
    Route::get('/dashboard/menu/categories/top/{order}', [AdminCategoriesController::class, 'order_top'])->name('category.order_top');
    Route::get('/dashboard/menu/categories/bottom/{order}', [AdminCategoriesController::class, 'order_bottom'])->name('category.order_bottom');

    // menu goods
    Route::post('/dashboard/menu/goods/{id}', [AdminGoodsController::class, 'update_good'])->name('goods.update_good');
    Route::get('/dashboard/menu/goods/{id}/show/{show_flag}', [AdminGoodsController::class, 'show_item'])->name('category.show_item');

    Route::resources([
        'goods' => AdminGoodsController::class,
    ]);
    Route::get('/dashboard/menu/goods/top/{category}/{order}', [AdminGoodsController::class, 'order_top'])->name('goods.order_top');
    Route::get('/dashboard/menu/goods/bottom/{category}/{order}', [AdminGoodsController::class, 'order_bottom'])->name('goods.order_bottom');;
    Route::get('/dashboard/menu/goods/remove_goods_photo/{id}', [AdminGoodsController::class, 'remove_goods_photo'])->name('goods.remove_goods_photo');
    Route::get('/dashboard/menu/goods/remove/{id}', [AdminGoodsController::class, 'destroy2'])->name('goods.remove');

    Route::resources([
        'goodsItem' => AdminGoodsItemController::class,
    ]);
    Route::get('/dashboard/menu/goodsItem/top/{good}/{order}', [AdminGoodsItemController::class, 'order_top'])->name('goodsItem.order_top');
    Route::get('/dashboard/menu/goodsItem/bottom/{goods}/{order}', [AdminGoodsItemController::class, 'order_bottom'])->name('goodsItem.order_bottom');
    Route::get('/dashboard/menu/goodsItem/{id}/show/{show_flag}', [AdminGoodsItemController::class, 'show_item'])->name('goodsItem.show_item');
    Route::get('/dashboard/menu/goodsItem/remove/{id}', [AdminGoodsItemController::class, 'destroy2'])->name('goodsItem.remove');


    // blocks
    Route::get('/dashboard/blocks', [AdminBlocksController::class, 'index']);
    Route::post('/dashboard/blocks/save', [AdminBlocksController::class, 'edit'])->name('blocks.save');

    // gallery
    Route::get('/dashboard/gallery', [AdminGalleryController::class, 'index']);
    Route::post('/dashboard/gallery/', [AdminGalleryController::class, 'store'])->name('gallery.store');
    Route::get('/dashboard/gallery/left/{order}', [AdminGalleryController::class, 'left'])->name('gallery.left');
    Route::get('/dashboard/gallery/right/{order}', [AdminGalleryController::class, 'right'])->name('gallery.right');
    Route::get('/dashboard/gallery/remove/{id}', [AdminGalleryController::class, 'destroy'])->name('gallery.destroy');

    // interior
    Route::get('/dashboard/interior', [AdminInteriorController::class, 'index'])->name('interior.index');
    Route::post('/dashboard/interior/', [AdminInteriorController::class, 'store'])->name('interior.store');
    Route::get('/dashboard/interior/left/{order}', [AdminInteriorController::class, 'left'])->name('interior.left');
    Route::get('/dashboard/interior/right/{order}', [AdminInteriorController::class, 'right'])->name('interior.right');
    Route::get('/dashboard/interior/remove/{id}', [AdminInteriorController::class, 'destroy'])->name('interior.destroy');

    // pages
    Route::get('/dashboard/pages', [AdminPagesController::class, 'index'])->name('pages.index');
    Route::get('/dashboard/page/{id}', [AdminPagesController::class, 'edit'])->name('page.edit');
    Route::post('/dashboard/page/{id}', [AdminPagesController::class, 'update'])->name('page.update');

    // paper
    Route::get('/dashboard/paper', [AdminPaperController::class, 'index'])->name('paper.index');
    Route::post('/dashboard/paper/', [AdminPaperController::class, 'store'])->name('paper.store');
    Route::get('/dashboard/paper/left/{order}', [AdminPaperController::class, 'left'])->name('paper.left');
    Route::get('/dashboard/paper/right/{order}', [AdminPaperController::class, 'right'])->name('paper.right');
    Route::get('/dashboard/paper/remove/{id}', [AdminPaperController::class, 'destroy'])->name('paper.destroy');
    Route::get('/dashboard/paper/removeAll', [AdminPaperController::class, 'destroyAll'])->name('paper.destroyAll');

    // paper menu
    Route::get('/dashboard/paper-menu', [PaperMenuController::class, 'index'])->name('paper_menu.index');
    Route::get('/dashboard/paper-menu/{id}', [PaperMenuController::class, 'edit'])->name('paper_menu.edit');
    Route::post('/dashboard/paper-menu/update-menu-locale/{id}', [PaperMenuController::class, 'update_menu_locale'])->name('paper_menu.update_menu_locale');
    Route::post('/dashboard/paper-menu/items', [PaperMenuItemController::class, 'store'])->name('paper_menu_item.store');
    Route::get('/dashboard/paper-menu/left/{order}', [AdminPaperController::class, 'left'])->name('paper.left');
//    Route::get('/dashboard/paper-menu/right/{order}', [AdminPaperController::class, 'right'])->name('paper.right');
    Route::get('/dashboard/paper-menu/items/destroy/{id}', [PaperMenuItemController::class, 'destroy'])->name('paper_menu_item.destroy');
    Route::get('/dashboard/paper-menu/items/destroy-all/{menu}', [PaperMenuItemController::class, 'destroy_all'])->name('paper_menu_item.destroy_all');
    Route::post('/dashboard/paper-menu/items/update-single-menu-item', [PaperMenuItemController::class, 'update_single_menu_item'])->name('paper_menu_item.update_single_menu_item');


    // images
    Route::get('/dashboard/images', [AdminImagesController::class, 'index'])->name('images.index');
    Route::post('/dashboard/images/', [AdminImagesController::class, 'store'])->name('images.store');
    Route::get('/dashboard/images/remove/{id}', [AdminImagesController::class, 'destroy'])->name('images.destroy');



    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';




