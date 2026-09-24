<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DatabaseDemoController extends Controller
{
    /**
     * Halaman Contoh Penerapan Eloquent ORM vs SQL Query Builder
     */
    public function index(Request $request)
    {
        // =========================================================================
        // BAGIAN 1: CONTOH PENERAPAN ELOQUENT ORM
        // =========================================================================

        // 1.1 Eloquent: Filter Where + Order By + Pagination
        $eloquentPaginated = Booking::where('status', 'confirmed')
            ->orderBy('tanggal', 'desc')
            ->paginate(5, ['*'], 'eloquent_page');

        // 1.2 Eloquent: Eager Loading Relasi (Booking with User)
        $eloquentWithRelation = Booking::with('user')
            ->whereNotNull('user_id')
            ->latest()
            ->take(5)
            ->get();

        // 1.3 Eloquent: Agregasi (Count, Sum, Avg)
        $eloquentAggregates = [
            'total_bookings' => Booking::count(),
            'total_omset' => Booking::where('status', 'completed')->sum('harga'),
            'rata_rata_harga' => round(Booking::avg('harga')),
            'layanan_aktif' => Service::where('is_active', true)->count(),
        ];

        // 1.4 Eloquent: Query Scope (scopeActive() didefinisikan pada Model Booking)
        $eloquentScopeActive = Booking::active()->take(5)->get();

        // =========================================================================
        // BAGIAN 2: CONTOH PENERAPAN SQL QUERY BUILDER (DB::table)
        // =========================================================================

        // 2.1 SQL Builder: Select + Where + Order By + Pagination
        $builderPaginated = DB::table('bookings')
            ->select('booking_code', 'nama_pelanggan', 'layanan', 'barber', 'harga', 'status')
            ->where('status', 'confirmed')
            ->orderBy('tanggal', 'desc')
            ->paginate(5, ['*'], 'builder_page');

        // 2.2 SQL Builder: INNER JOIN antar tabel bookings dan users
        $builderWithJoin = DB::table('bookings')
            ->join('users', 'bookings.user_id', '=', 'users.user_id')
            ->select(
                'bookings.booking_code',
                'bookings.nama_pelanggan',
                'users.email as user_email',
                'users.role as user_role',
                'bookings.layanan',
                'bookings.harga'
            )
            ->orderBy('bookings.id', 'desc')
            ->take(5)
            ->get();

        // 2.3 SQL Builder: Group By & DB::raw() (Performa per Barber)
        $builderGroupByBarber = DB::table('bookings')
            ->select(
                'barber',
                DB::raw('COUNT(*) as total_transaksi'),
                DB::raw('SUM(harga) as total_omset'),
                DB::raw('AVG(harga) as rata_rata_omset')
            )
            ->whereNotNull('barber')
            ->groupBy('barber')
            ->get();

        // 2.4 SQL Builder: Raw Query via DB::select()
        $builderRawSummary = DB::select('
            SELECT status, COUNT(*) as jumlah, SUM(harga) as total_nominal
            FROM bookings
            GROUP BY status
        ');

        return view('admin.database-demo', compact(
            'eloquentPaginated',
            'eloquentWithRelation',
            'eloquentAggregates',
            'eloquentScopeActive',
            'builderPaginated',
            'builderWithJoin',
            'builderGroupByBarber',
            'builderRawSummary'
        ));
    }
}
