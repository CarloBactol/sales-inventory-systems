<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Order;
use App\Models\Customer;
use App\Models\Installment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $yearly_income_cash = DB::table('orders')
            ->whereYear('created_at', Carbon::now()->format('Y'))
            ->where('status', '1')
            ->where('payment_mode', 'cash')
            ->sum('price');

        $yearly_income_installment = DB::table('orders')
            ->whereYear('created_at', Carbon::now()->format('Y'))
            ->where('status', '1')
            ->where('payment_mode', 'installment')
            ->sum('price');

        $pending_orders = Order::where('status', '0')->count();
        $paid_cash = Order::where('status', '1')->where('payment_mode', 'cash')->count();
        $paid_installment = Installment::where('balance', 0)->count();
        $users = Customer::count();
        return view('dashboard', compact('pending_orders', 'paid_cash', 'paid_installment', 'users', 'yearly_income_cash', 'yearly_income_installment'));
    }

    public function orderChart(Request $request)
    {
        $entries =  Order::select(
            // DB::raw('YEAR(created_at) as year'),
            DB::raw('MONTH(created_at) as month'),
            DB::raw('SUM(price) as price'),
            DB::raw('COUNT(*) as count'),
        )
            ->groupBy('month')
            ->orderBy('month')
            ->where('status', '1')
            ->get();

        $labels = [
            1 => 'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'
        ];

        $total = $count = [];

        foreach ($entries as $entry) {
            $total[$entry->month] = $entry->price;
            $count[$entry->month] = $entry->count;
        }

        foreach ($labels as $month => $name) {
            if (!array_key_exists($month, $total)) {
                $total[$month] = 0;
            }

            if (!array_key_exists($month, $count)) {
                $count[$month] = 0;
            }
        }

        ksort($total);
        ksort($count);

        return [
            'labels' => array_values($labels),
            'datasets' => [
                [
                    'label' => 'Total Sales ₱',
                    'data' => array_values($total),
                ],
                [
                    'label' => 'Paid Orders #',
                    'data' => array_values($count),
                ],

            ],
        ];
    }

    public function profile()
    {
        return view('profile');
    }

    public function cashier_profile()
    {
        return view('profile-cashier');
    }
}
