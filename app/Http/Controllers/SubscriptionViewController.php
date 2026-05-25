<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Subscription;

class SubscriptionViewController extends Controller
{
    public function index()
    {
        $subscriptions = Subscription::with(['customer', 'service'])->latest()->get();

        return view('subcription', compact('subscriptions'));
    }
}
