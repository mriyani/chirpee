<?php

namespace App\Http\Controllers;

use App\Models\Chirp;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ChirpController extends Controller
{
    use AuthorizesRequests;
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $chirps = Chirp::with('user')
            ->latest()
            ->limit(50)  // Limit to 50 most recent chirps
            ->get();

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

        // Validate the request
        $validated = $request->validate([
            'message' => 'required|string|max:255|min:3',
        ], [
            'message.required' => 'Please write something to chirp!',
            'message.max' => 'Chirps must be 255 characters or less.',
        ]);

        // Create chirp for authenticated user
        $user = $request->user();
        // auth()->user()->chirps()->create($validated);
        $user->chirps()->create($validated);

        // Redirect back to the feed
        return redirect('/')
            ->with('success', 'Your chirp has been posted!');
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
    public function edit(Chirp $chirp)
    {
        $this->authorize('update', $chirp);
        // We'll add authorization in lesson 11
        return view('chirps.edit', compact('chirp'));
    }

    public function update(Request $request, Chirp $chirp)
    {
        $this->authorize('update', $chirp);

        // Validate
        $validated = $request->validate(
            [
                'message' => 'required|string|max:255',
            ],
            [
                'message.required' => 'Please write something to chirp!',
                'message.max' => 'Chirps must be 255 characters or less.'
            ]
        );

        // Update
        $chirp->update($validated);

        return redirect('/')->with('success', 'Your chirp has been updated!');
    }

    public function destroy(Chirp $chirp)
    {
        $this->authorize('delete', $chirp);

        $chirp->delete();

        return redirect('/')->with('success', 'Your chirp has been deleted!');
    }
}
