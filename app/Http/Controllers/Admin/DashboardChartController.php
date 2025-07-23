<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Jenssegers\Agent\Agent;
use App\Models\BrowserVisit;
use Illuminate\Support\Facades\DB;

class DashboardChartController extends Controller
{
    public function index()
    {
        $agent = new Agent();
        $browser = $agent->browser();

        BrowserVisit::create([
            'browser' => $browser,
            'ip' => request()->ip(),
        ]);

        $visits = BrowserVisit::select('browser', DB::raw('count(*) as total'))
                    ->groupBy('browser')
                    ->orderByDesc('total')
                    ->get();

        return view('admin.dashboardchart', compact('visits'));
    }
}
