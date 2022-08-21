<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Survey;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ExpirationCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $allDeployedSurveys = Survey::all()->where('status_id', 2);
        foreach ($allDeployedSurveys as $survey) {
            if ($survey->expire_at->lt(Carbon::now())) {
                $survey->update(['status_id'=> 3]);
                // dd($survey);
            }
        }
        return $next($request);
    }
}
