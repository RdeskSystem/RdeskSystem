<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BafMaster;
use App\Models\Report;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Add logic to display a list of reports if needed
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($agreementNo)
    {
        $customer = BafMaster::where('agreement_no', $agreementNo)->first();
        return view('reports.create', compact('customer'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'agreement_no' => 'required|exists:baf_masters,agreement_no',
            'customer_name' => 'required',
            'dunner' => 'required',
            'result' => 'required',
            'action' => 'required',
            'action_baf' => 'required',
            'category' => 'required',
            // Other validation rules as needed
        ]);

        Report::create([
            'agreement_no' => $request->agreement_no,
            'dunner' => $request->dunner,
            'customer_name' => $request->customer_name,
            'result' => $request->result,
            'action' => $request->action,
            'action_baf' => $request->action_baf,
            'ptp_date' => $request->ptp_date,
            'ptp_amount' => $request->ptp_amount,
            'action_wa' => $request->action_wa,
            'phone_up_date' => $request->phone_up_date,
            'connect_with' => $request->connect_with,
            'category' => $request->category,
            'description_agent' => $request->description_agent,
        ]);

        return redirect()->route('reports.index')->with('success', 'Report berhasil dibuat.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Add logic to display a specific report if needed
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Add logic to show form for editing a report if needed
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Add logic to update a report if needed
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Add logic to delete a report if needed
    }
}
