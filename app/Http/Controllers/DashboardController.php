<?php
namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $data['count'] = Transaction::whereDate('created_at', now())->count();

        $latestTransaction = Transaction::latest()->first();
        $data['date'] = $latestTransaction ? dateDmy($latestTransaction->created_at) : '-';

        $datas = Transaction::all();
        $data['chartTransaction'] = [];
        $data['chartProduct'] = [];

        $products = Product::all();

        $dateLast = null;

        foreach ($datas as $transaction) {
            $date = dateYmd($transaction->created_at);
            $dateDay = dateDmy($transaction->created_at);

            $count = Transaction::whereDate('created_at', $date)->count();
            if (!$dateLast && $count != 0) {
                $data['chartTransaction'][$transaction->id] = [
                    'count' => $count,
                    'date' => $dateDay,
                ];
            } elseif ($dateLast != $date && $count != 0) {
                $data['chartTransaction'][$transaction->id] = [
                    'count' => $count,
                    'date' => $dateDay,
                ];
            }
            $dateLast = dateYmd($transaction->created_at);
        }

        foreach ($products as $product) {
            $productCount = TransactionDetail::where('product_id', $product->id)->count();
            if ($productCount != 0) {
                $data['chartProduct'][$product->id] = [
                    'productName' => $product->name,
                    'productCount' => $productCount
                ];
            }
        }

        return view('Page.dashboard.index', $data);
    }
}
