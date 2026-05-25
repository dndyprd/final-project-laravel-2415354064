<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Subscription;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function index(): JsonResponse
    {
        // Pakai with() supaya data relasinya (nama customer & service) ikut terpanggil
        $subscriptions = Subscription::with(['customer', 'service'])->latest()->get();
        return response()->json(['success' => true, 'data' => $subscriptions]);
    }

    public function store(Request $request): JsonResponse
    {
        $data = $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'service_id'  => 'required|exists:services,id',
            'start_date'  => 'required|date',
            'end_date'    => 'required|date|after_or_equal:start_date',
            'status'      => 'required|string|in:active,inactive,trial,isolir,dismantle',
        ]);

        $subscription = Subscription::create($data);
        return response()->json(['success' => true, 'data' => $subscription], 201);
    }

    public function show(int $id): JsonResponse
    {
        $subscription = Subscription::with(['customer', 'service'])->find($id);
        if (!$subscription) return response()->json(['success' => false, 'message' => 'Not found'], 404);
        
        return response()->json(['success' => true, 'data' => $subscription]);
    }

    public function update(Request $request, int $id): JsonResponse
    {
        $subscription = Subscription::find($id);
        if (!$subscription) return response()->json(['success' => false, 'message' => 'Not found'], 404);

        $data = $request->validate([
            'status' => 'sometimes|string',
            'end_date' => 'sometimes|date',
        ]);

        $subscription->update($data);
        return response()->json(['success' => true, 'data' => $subscription]);
    }

    public function destroy(int $id): JsonResponse
    {
        $subscription = Subscription::find($id);
        if (!$subscription) return response()->json(['success' => false, 'message' => 'Not found'], 404);

        $subscription->delete();
        return response()->json(['success' => true, 'message' => 'Deleted']);
    }

    public function getByStatus($status)
    {
        $subscriptions = \App\Models\Subscription::with(['customer', 'service'])
            ->where('status', $status)
            ->get();
            
        return response()->json(['data' => $subscriptions], 200);
    }

    public function changeStatus(Request $request, int $id): JsonResponse
    {
        $request->validate([
            'status' => 'required|string|in:active,inactive,trial,isolir,dismantle',
        ]);

        $subscription = Subscription::findOrFail($id);
        $subscription->update(['status' => $request->status]);

        return response()->json([
            'message' => 'Status subscription berhasil diubah',
            'data'    => $subscription,
        ]);
    }
}