<?php

namespace App\Http\Controllers;

use App\Http\Requests\LedgerRequest;
use App\Imports\LedgerImport;
use App\Models\Bank;
use App\Models\Ledger;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class LedgerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('ledger.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $accounts = Bank::where('is_active', true)->get();
        return view('ledger.create', ['accounts' => $accounts]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LedgerRequest $request)
    {
        Ledger::create(array_merge($request->all(), ['created_by' => auth()->user()->id]));
        return redirect()->back()->with('success', 'Data save successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ledger  $ledger
     * @return \Illuminate\Http\Response
     */
    public function show(Ledger $ledger)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ledger  $ledger
     * @return \Illuminate\Http\Response
     */
    public function edit(Ledger $ledger)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ledger  $ledger
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ledger $ledger)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ledger  $ledger
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ledger $ledger)
    {
        //
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ledgerFileImport()
    {
        $accounts = Bank::where('is_active', true)->get();
        return view('ledger.ledger-file-import', ['accounts' => $accounts]);
    }

    /**
     * Store a ledger excel in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function ledgerExcelImport(Request $request)
    {
        $bank_id = $request->ac_no;
        $created_by = auth()->id();
        //dd($request->all());
        Excel::import(new LedgerImport($bank_id, $created_by), $request->file('execl_file')
            ->store('temp'));
        return back();
    }
}
