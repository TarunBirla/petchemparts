<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\QuoteRequest;
use App\Models\QuoteItem;

class AdminQuoteRequestController extends Controller
{
    /**
     * Display listing of all quote requests
     */
    public function index(Request $request)
    {
        $query = QuoteRequest::with('items')->orderBy('id', 'desc');

        if ($request->filled('search')) {
            $s = $request->search;
            $query->where(function($q) use ($s) {
                $q->where('quote_no', 'like', "%$s%")
                  ->orWhere('name', 'like', "%$s%")
                  ->orWhere('email', 'like', "%$s%")
                  ->orWhere('phone', 'like', "%$s%");
            });
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $quotes = $query->paginate(15);

        return view('backend.quote_requests.index', compact('quotes'));
    }

    /**
     * Show detailed view of a quote request
     */
    public function show($id)
    {
        $quote = QuoteRequest::with('items.product')->findOrFail($id);
        return view('backend.quote_requests.show', compact('quote'));
    }

    /**
     * Update status of a quote request
     */
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,contacted,completed,cancelled'
        ]);

        $quote = QuoteRequest::findOrFail($id);
        $quote->status = $request->status;
        $quote->save();

        return redirect()->back()->with('success', 'Quote status updated to ' . ucfirst($request->status));
    }

    /**
     * Delete a quote request
     */
    public function destroy($id)
    {
        $quote = QuoteRequest::findOrFail($id);
        $quote->delete();

        return redirect()->route('admin.quote_requests.index')->with('success', 'Quote request deleted successfully.');
    }
}
