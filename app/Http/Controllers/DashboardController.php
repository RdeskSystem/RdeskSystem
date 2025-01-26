<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\BafMaster;
use App\Models\Report;
use Carbon\Carbon;
use ArielMejiaDev\LarapexCharts\Facades\LarapexChart;

class DashboardController extends Controller
{
    /**
     * Display the dashboard with statistics and charts.
     */
    public function index()
    {
        $activeUsers = User::where('status', 'Active')->count();
        $totalData = BafMaster::count();
        $dailyReports = Report::whereDate('created_at', Carbon::today())->count();

        $chart = LarapexChart::setTitle('Daily Reports')
            ->setType('bar')
            ->setXAxis(['Reports'])
            ->setDataset([
                [
                    'name' => 'Total Reports Today',
                    'data' => [$dailyReports],
                ],
            ]);

        return view('dashboard.index', compact('activeUsers', 'totalData', 'dailyReports', 'chart'));
    }
}
