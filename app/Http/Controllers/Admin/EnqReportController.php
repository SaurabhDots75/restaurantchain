<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EnqReport;
use App\Models\EnqQuotesProof;

class EnqReportController extends Controller
{
    public function index(Request $request) {
        $getEnqReport = EnqReport::latest()->paginate(10);

        return view('admin.reports.enq_reports', compact('getEnqReport'))->with('i', ($request->input('page', 1) - 1) * 10);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param string $faqid
     * @return void
     */
    public function destroy(Request $request)
    {
        $recordId = $request->input('id');
        // Perform deletion logic, e.g., delete from database
        $record = EnqReport::find($recordId);
        if ($record) {
            $record->delete();
            return response()->json(['success' => true], 200);
        }
        return response()->json(['success' => false, 'message' => 'Record not found'], 404);
    }
    

    /**
     * Show Quotes and Proofs Report
     *
     * @param Request $request
     * @return void
     */
    public function proofsQuotesReports(Request $request) {
        $getEnqReport = EnqQuotesProof::latest()->paginate(10);

        return view('admin.reports.enq_quotes_proofs', compact('getEnqReport'))->with('i', ($request->input('page', 1) - 1) * 10);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param string $faqid
     * @return void
     */
    public function destroyProofsQuotes(Request $request)
    {
        $recordId = $request->input('id');
        // Perform deletion logic, e.g., delete from database
        $record = EnqQuotesProof::find($recordId);
        if ($record) {
            $record->delete();
            return response()->json(['success' => true], 200);
        }
        return response()->json(['success' => false, 'message' => 'Record not found'], 404);
    }
}
