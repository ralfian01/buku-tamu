<?php

namespace App\Http\Middleware;

use App\Models\Employee;
use Closure;
use Exception;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthBo
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $authData = $request->attributes->get('auth_data');
        try {

            // Get employee data
            $employees = Employee::query()
                ->where('account_id', $authData['account_id'])
                ->where('is_active', true)
                ->first();

            if ($employees) {
                $employeeData = [
                    'business_id' => $employees->business_id,
                ];

                $request->merge($employeeData);
            }
        } catch (\Exception $e) {
        }

        return $next($request);
    }
}
