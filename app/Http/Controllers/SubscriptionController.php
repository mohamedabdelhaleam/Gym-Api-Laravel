<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use Illuminate\Support\Facades\Auth;

class SubscriptionController extends Controller
{
    public function subscription($programId)
    {
        $user = Auth::user();
        $subscription = Subscription::create([
            "program_id" => $programId,
            "user_id_id" => $user->Id,
        ]);
        if (!$subscription) {
            return response()->json([
                'status' => "fail",
                'message' => "Can Not Subscription"
            ], 404);
        }
        return response()->json([
            'status' => "success",
            'data' => $subscription
        ], 200);
    }
    public function unSubscription()
    {
        $user = Auth::user();
        $subscription = Subscription::where('user_id', $user->id);
        if (!$subscription) {
            return response()->json([
                'status' => "fail",
                'message' => "Not Found"
            ], 404);
        }
        $subscription->delete();
        return response()->json([
            'status' => "success",
            'message' => "Deleted Successfully",
        ], 200);
    }
}
