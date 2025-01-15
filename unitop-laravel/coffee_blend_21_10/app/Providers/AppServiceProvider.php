<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Category;
use App\Models\Setting;
use Illuminate\Support\Facades\Session;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('*', function ($view) {
            $menu = Category::where('parent_id', '0')->get();  // Lấy menu từ cơ sở dữ liệu

            // Lấy giỏ hàng từ session
            $cart = Session::get('cart', []);

            // Tính tổng số lượng và tổng tiền của giỏ hàng
            $totalQuantity = 0;
            $totalPrice = 0;

            foreach ($cart as $item) {
                $totalQuantity += $item['quantity'];  // Tính tổng số lượng
                $totalPrice += $item['quantity'] * $item['price'];  // Tính tổng tiền
            }

            // Chia sẻ giỏ hàng và tổng tiền vào tất cả các view
            $view->with('cart', $cart);
            $view->with('totals', [
                'total_quantity' => $totalQuantity,
                'total_price' => $totalPrice,
            ]);
            $view->with('menu', $menu);

        });

    }
}
