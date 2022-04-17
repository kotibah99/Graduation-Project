<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Gate;
use Spatie\Activitylog\Models\Activity;

class LogController extends Controller
{
    public function index()
    {
        if (Gate::denies('edit')) {
            alert()->error('access denied', 'You Don\'t have any premissions to show team operation logs  Because you are not ADMIN');
            return redirect()->back();
        }

        $logs = Activity::with('subject', 'causer')->paginate(15);
        return view('logs.index', compact('logs'));
    }
    public function destroy()
    {
        Activity::truncate();
        return redirect()->route('logs.index');
    }
}
