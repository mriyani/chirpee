<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChirpController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch chirps with optional user data (LEFT JOIN handles nullable user_id)
        $chirps = DB::table('chirps')
            ->leftJoin('users', 'chirps.user_id', '=', 'users.id')
            ->select(
                'chirps.id',
                'chirps.message',
                'chirps.created_at',
                'users.name as author_name' // fallback to 'Anonymous' if null
            )
            ->orderBy('chirps.created_at', 'desc')
            ->paginate(10); // or ->get() for all records

        return view('home', ['chirps' => $chirps]);
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
