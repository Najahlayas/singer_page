<?php

namespace App\Http\Controllers;

use App\Models\Work;
use App\Models\NewsArticle;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DashboardController extends Controller
{
    public function index()
    {
        $works = Work::count();

        $permissions = Permission::count();

        $roles = Role::count();


        // آخر الأخبار
        $latestNews = NewsArticle::latest()
            ->take(3)
            ->get();


        // عدد الأخبار خلال أيام الأسبوع
        $ideasChart = NewsArticle::select(
                DB::raw('DAYNAME(created_at) as day'),
                DB::raw('COUNT(*) as total')
            )
            ->whereBetween('created_at', [
                Carbon::now()->startOfWeek(),
                Carbon::now()->endOfWeek()
            ])
            ->groupBy('day')
            ->get();


        // تحويل الأيام إلى العربية
        $arabicDays = [
            'Saturday' => 'السبت',
            'Sunday' => 'الأحد',
            'Monday' => 'الاثنين',
            'Tuesday' => 'الثلاثاء',
            'Wednesday' => 'الأربعاء',
            'Thursday' => 'الخميس',
            'Friday' => 'الجمعة',
        ];


        $ideasChart = $ideasChart->map(function ($item) use ($arabicDays) {

            return [
                'day' => $arabicDays[$item->day] ?? $item->day,
                'total' => $item->total
            ];

        });


        return view('pages.dashboard', compact(
            'works',
            'permissions',
            'roles',
            'latestNews',
            'ideasChart'
        ));
    }
}
