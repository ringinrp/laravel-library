<?php

namespace App\Http\Controllers\Admin;

use App\Enums\MessageType;
use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\StockResource;
use App\Models\Stock;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

use Inertia\Response;
use PhpParser\Node\Stmt\TryCatch;
use Throwable;

class BookStockReportController extends Controller
{
    public function index(): Response
    {
        $stocks = Stock::query()
            ->with('book:id,title')
            ->select(['stocks.id', 'book_id', 'total', 'available', 'loan', 'lost', 'damaged', 'stocks.created_at'])
            ->filter(request()->only(['search']))
            ->sorting(request()->only(['field', 'direction']))
            ->paginate(request()->load ?? 10)
            ->withQueryString();

        return inertia('Admin/BookStockReports/Index', [
            'page_settings' => [
                'title' => 'Laporan Stok Buku',
                'subtitle' => 'Menampilkan laporan stok buku yang tersedia pada platform ini'
            ],

            'stocks' => StockResource::collection($stocks),

            'state' => [
                'page' => request()->page ?? 1,
                'search' => request()->search ?? '',
                'load' => 10,
            ],
        ]);
    }

    public function edit(Stock $stock): Response
    {
        $stock->load('book:id,title');

        return inertia('Admin/BookStockReports/Edit', [
            'page_settings' => [
                'title' => 'Edit Laporan Stok Buku',
                'subtitle' => 'Edit data stok buku'
            ],
            'stock' => StockResource::make($stock),
        ]);
    }

    public function update(Request $request, Stock $stock): RedirectResponse
    {
        try {
            $minimumTotal = $request->available + $request->loan + $request->lost + $request->damaged;

            if ($request->total < $minimumTotal) {
                flashMessage('Total tidak boleh lebih kecil dari peminjaman yang tersedia, dipinjam, hilang, dan rusak.', 'error');
                return to_route('admin.book-stock-reports.index');
            }

            $stock->update(
                [
                    'total' => $request->total,
                    'available' => $request->available,
                ]
            );

            flashMessage(MessageType::CREATED->message('stok buku'));
            return to_route('admin.book-stock-reports.index');
        } catch (Throwable $e) {
            flashMessage(MessageType::ERROR->message(error: $e->getMessage));

            return to_route('admin.book-stock-reports.index');
        }
    }
}
