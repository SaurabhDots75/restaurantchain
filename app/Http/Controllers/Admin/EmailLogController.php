<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EmailLog;
use Illuminate\Http\Request;

class EmailLogController extends Controller
{
    public function index(Request $request)
    {
        $query = EmailLog::with('emailTemplate')
            ->orderBy('sent_at', 'desc');

        // Filter by status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // Filter by recipient email
        if ($request->filled('email')) {
            $query->where('recipient_email', 'like', '%' . $request->email . '%');
        }

        // Filter by date range
        if ($request->filled('start_date')) {
            $query->whereDate('sent_at', '>=', $request->start_date);
        }
        if ($request->filled('end_date')) {
            $query->whereDate('sent_at', '<=', $request->end_date);
        }

        $emailLogs = $query->paginate(15);

        return view('admin.email-logs.index', compact('emailLogs'));
    }

    public function show($id)
    {
        $emailLog = EmailLog::with('emailTemplate')->findOrFail($id);
        return view('admin.email-logs.show', compact('emailLog'));
    }
}