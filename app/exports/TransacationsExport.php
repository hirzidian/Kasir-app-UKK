<?php

namespace App\Exports;

use App\Models\Transaction;
use App\Models\TransactionDetail;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Carbon\Carbon;

class TransacationsExport implements FromView
{
    protected $filter;

    public function __construct($filter = null)
    {
        $this->filter = $filter;
    }

    public function view(): View
    {
        $query = Transaction::orderBy('id', 'desc');

        if ($this->filter === 'harian') {
            $query->whereDate('created_at', Carbon::today());
        } elseif ($this->filter === 'mingguan') {
            $query->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()]);
        } elseif ($this->filter === 'bulanan') {
            $query->whereMonth('created_at', Carbon::now()->month);
        }

        $data['transactions'] = $query->get();
        $data['transactions']->each(function ($transaction) {
            $transaction->details = TransactionDetail::where('transaction_id', $transaction->id)
                ->with('product')->get();
        });

        return view('Page.xlsx.transaction', $data);
    }
}
