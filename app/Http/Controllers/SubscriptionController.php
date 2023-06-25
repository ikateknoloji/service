<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SubscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $endpoint = $request->input('endpoint');
            $p256dh = $request->input('p256dh');
            $auth = $request->input('auth');
            
            // Kullanıcı bilgisini header üzerinden al
            $user = auth()->user();
            $userId = $user->id; // Kullanıcıya ait user ID değeri
    
            $subscription = new Subscription();
            $subscription->user_id = $userId;
            $subscription->endpoint = $endpoint;
            $subscription->p256dh = $p256dh;
            $subscription->auth = $auth;
            $subscription->save();
    
            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            // Hata mesajını yakalayarak loglama veya işlem yapma
            // Örneğin, hata mesajını loglamak için:
            Log::error($e->getMessage());
    
            // Hata durumunu döndür
            return response()->json(['success' => false, 'message' => 'Bir hata oluştu.']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Subscription $subscription)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Subscription $subscription)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Subscription $subscription)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subscription $subscription)
    {
        //
    }
}
