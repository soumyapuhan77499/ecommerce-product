<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductOrder;
use App\Models\ProductSucription;
use App\Models\ProductPayment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Mail\SubscriptionConfirmationMail;
use Illuminate\Support\Facades\Mail;

class ProductApiController extends Controller
{

    public function productSubscription(Request $request)
    {
        // Log the incoming request data
        \Log::info('Purchase subscription called', ['request' => $request->all()]);
    
        // Extract the product_id and other necessary fields from the request
        $productId = $request->product_id; 
        $user = Auth::guard('sanctum')->user();
    
        // Check if the user is authenticated
        if (!$user) {
            \Log::error('User not authenticated');
            return response()->json(['message' => 'Unauthorized'], 401);
        }
    
        // Generate a unique order ID
        $orderId = 'ORD-' . strtoupper(Str::random(12));
        $addressId = $request->address_id;
        $suggestion = $request->suggestion;
    
        // Log the order creation attempt
        \Log::info('Creating order', ['order_id' => $orderId, 'product_id' => $productId, 'user_id' => $user->userid, 'address_id' => $addressId]);
    
        // Create the order
        try {
            $order = ProductOrder::create([
                'order_id' => $orderId,
                'product_id' => $productId, 
                'user_id' => $user->userid,
                'quantity' => 1,
                'total_price' => $request->paid_amount,
                'address_id' => $addressId,
                'suggestion' => $suggestion,
            ]);
            \Log::info('Order created successfully', ['order' => $order]);
        } catch (\Exception $e) {
            \Log::error('Failed to create order', ['error' => $e->getMessage()]);
            return response()->json(['message' => 'Failed to create order'], 500);
        }
    
        // Calculate subscription start and end dates
        $startDate = $request->start_date ? Carbon::parse($request->start_date) : now(); // Default to now if no start date is provided
        $duration = $request->duration; // Duration is 1 for 30 days, 3 for 60 days, 6 for 90 days
        
        // Calculate end date based on subscription duration
        if ($duration == 1) {
            $endDate = $startDate->copy()->addDays(29); // For 1, add 30 days
        } else if ($duration == 3) {
            $endDate = $startDate->copy()->addDays(89); // For 3, add 90 days
        } else if ($duration == 6) {
            $endDate = $startDate->copy()->addDays(179); // For 6, add 180 days
        }
        else {
            // Handle unexpected duration value
            \Log::error('Invalid subscription duration', ['duration' => $duration]);
            return response()->json(['message' => 'Invalid subscription duration'], 400);
        }
        
    
        // Log subscription creation
        \Log::info('Creating subscription', ['user_id' => $user->userid, 'product_id' => $productId, 'start_date' => $startDate, 'end_date' => $endDate]);
    
        // Create the subscription
        $subscriptionId = 'SUB-' . strtoupper(Str::random(12));
        $today = now()->format('Y-m-d');  // Format the date to match start_date format
    
        // Determine the status based on the start_date
        $status = ($startDate->format('Y-m-d') === $today) ? 'active' : 'pending';
        try {
            ProductSucription::create([
                'subscription_id' => $subscriptionId,
                'user_id' => $user->userid,
                'order_id' => $orderId,
                'product_id' => $productId,
                'start_date' => $startDate,
                'end_date' => $endDate,
                'is_active' => true,
                'status' => $status 
            ]);
            \Log::info('Subscription created successfully');
        } catch (\Exception $e) {
            \Log::error('Failed to create subscription', ['error' => $e->getMessage()]);
            return response()->json(['message' => 'Failed to create subscription'], 500);
        }
    
        // Process payment details and create payment record
        try {
            ProductPayment::create([
                'order_id' => $orderId,
                'payment_id' => $request->payment_id,
                'user_id' => $user->userid,
                'payment_method' => "Razorpay",
                'paid_amount' => $request->paid_amount,
                'payment_status' => "paid",
            ]);
            \Log::info('Payment recorded successfully');
        } catch (\Exception $e) {
            \Log::error('Failed to record payment', ['error' => $e->getMessage()]);
            return response()->json(['message' => 'Failed to record payment'], 500);
        }
      // Fetch the complete order details
      $order = ProductOrder::with(['flowerProduct', 'user', 'address.localityDetails', 'flowerPayments', 'subscription'])
      ->where('order_id', $orderId)
      ->first();

        if (!$order) {
        \Log::error('Order not found for email sending');
        return response()->json(['message' => 'Order not found'], 404);
        }

        // Email recipients
        $emails = [
        'bhabana.samantara@33crores.com',
        // 'pankaj.sial@33crores.com',
        // 'basudha@33crores.com',
        // 'priya@33crores.com',
        // 'starleen@33crores.com'
        ];

        // Send the email
        try {
        Mail::to($emails)->send(new SubscriptionConfirmationMail($order));
        \Log::info('Order details email sent successfully', ['emails' => $emails]);
        } catch (\Exception $e) {
        \Log::error('Failed to send order details email', ['error' => $e->getMessage()]);
        }
        return response()->json([
            'message' => 'Subscription activated successfully',
            'end_date' => $endDate,
            'order_id' => $orderId,
        ]);
    }

   
}
