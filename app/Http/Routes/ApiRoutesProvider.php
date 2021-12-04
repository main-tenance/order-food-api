<?php

namespace App\Http\Routes;

use App\Http\Controllers\Categories\CategoryIndexController;
use App\Http\Controllers\Categories\CategoryShowController;
use App\Http\Controllers\Companies\CompanyIndexController;
use App\Http\Controllers\Companies\CompanyShowController;
use App\Http\Controllers\Dishes\DishIndexController;
use App\Http\Controllers\Dishes\DishShowController;
use App\Http\Controllers\Orders\OrderController;
use App\Http\Controllers\Orders\OrderIndexController;
use App\Http\Controllers\Orders\OrderShowController;
use App\Http\Controllers\Orders\OrderStoreController;
use App\Models\Category;
use App\Models\Company;
use App\Models\Dish;
use App\Models\Order;
use Illuminate\Support\Facades\Route;

class ApiRoutesProvider
{

    public function registerRoutes(): void
    {
        Route::get('/companies', CompanyIndexController::class)
            ->name(ApiRoutes::COMPANY_INDEX);
        Route::get('/companies/{company}', CompanyShowController::class)
            ->name(ApiRoutes::COMPANY_SHOW);
        Route::get('/categories', CategoryIndexController::class)
            ->name(ApiRoutes::CATEGORY_INDEX);
        Route::get('/categories/{category}', CategoryShowController::class)
            ->name(ApiRoutes::CATEGORY_SHOW);
        Route::get('/dishes', DishIndexController::class)
            ->name(ApiRoutes::DISH_INDEX);
        Route::get('/dishes/{dish}', DishShowController::class)
            ->name(ApiRoutes::DISH_SHOW);
        Route::get('/orders', OrderIndexController::class)
            ->name(ApiRoutes::ORDER_INDEX);
        Route::get('/orders/{order}', OrderShowController::class)
            ->name(ApiRoutes::ORDER_SHOW);
        Route::post('/orders', OrderStoreController::class)
            ->name(ApiRoutes::ORDER_STORE);
    }

    public static function companyIndex(): string
    {
        return route(ApiRoutes::COMPANY_INDEX);
    }

    public static function companyShow(Company $company): string
    {
        return route(ApiRoutes::COMPANY_SHOW, ['company' => $company]);
    }

    public static function categoryIndex(): string
    {
        return route(ApiRoutes::CATEGORY_INDEX);
    }

    public static function categoryShow(Category $category): string
    {
        return route(ApiRoutes::CATEGORY_SHOW, ['category' => $category]);
    }

    public static function dishIndex(): string
    {
        return route(ApiRoutes::DISH_INDEX);
    }

    public static function dishShow(Dish $dish): string
    {
        return route(ApiRoutes::DISH_SHOW, ['dish' => $dish]);
    }

    public static function orderIndex(): string
    {
        return route(ApiRoutes::ORDER_INDEX);
    }

    public static function orderShow(Order $order): string
    {
        return route(ApiRoutes::ORDER_SHOW, ['order' => $order]);
    }

    public static function orderStore(): string
    {
        return route(ApiRoutes::ORDER_STORE);
    }

}
