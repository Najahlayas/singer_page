<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Work;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DashboardController extends Controller
{
    public function index () {
        $works = Work::all()->count();
        $permissions = Permission::all()->count();
        $roles  = Role::all()->count();
        $latestNews = News::latest()->take(3)->get();
        return view('pages.dashboard', compact('works','permissions','roles','latestNews'));
    }
}
