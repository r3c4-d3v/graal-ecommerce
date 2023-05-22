<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CourierStoreRequest;
use App\Models\Courier;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Inertia\Response as InertiaResponse;

class CourierController extends Controller
{
    /**
     * Render courier page
     * @return InertiaResponse
     */
    public function index(): InertiaResponse
    {
        return Inertia::render('Admin/Courier/index', [
            'status' => session('status'),
        ]);
    }

    public function store(CourierStoreRequest $request): RedirectResponse
    {
        Courier::create($request->validated());
        return Redirect::route('admin.courier.index');
    }
}
