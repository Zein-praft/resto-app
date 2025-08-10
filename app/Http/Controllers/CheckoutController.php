<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index()
    {
        // Ambil cart dari session
        $cart = session()->get('cart', []);

        // Hitung subtotal (pastikan key aman)
        $subtotal = collect($cart)->sum(function ($item) {
            return ($item['price'] ?? 0) * ($item['qty'] ?? 1);
        });

        // Hitung pajak (misal 10%)
        $pajak = $subtotal * 0.10;

        // Total keseluruhan
        $total = $subtotal + $pajak;

        return view('customer.checkout', compact('cart', 'subtotal', 'pajak', 'total'));
    }

    public function process(Request $request)
    {
        try {
            $pembayaranBerhasil = true; // Simulasi pembayaran sukses

            if ($pembayaranBerhasil) {
                // Hapus cart setelah pembayaran sukses
                session()->forget('cart');
                session()->save(); // pastikan session tersimpan

                return redirect()->route('checkout')
                    ->with('success', 'Pembayaran berhasil dilakukan!');
            } else {
                return redirect()->route('checkout')
                    ->with('error', 'Pembayaran gagal, silakan coba lagi.');
            }
        } catch (\Exception $e) {
            return redirect()->route('checkout')
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}
