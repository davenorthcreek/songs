<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Playlist;
use Illuminate\Http\Request;
use Exception;

class PlaylistController extends Controller
{

    /**
     * Display a listing of the playlists.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $playlists = Playlist::paginate(25);

        return view('playlists.index', compact('playlists'));
    }

    /**
     * Show the form for creating a new playlist.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {


        return view('playlists.create');
    }

    /**
     * Store a new playlist in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {

            $data = $this->getData($request);

            Playlist::create($data);

            return redirect()->route('playlists.playlist.index')
                ->with('success_message', 'Playlist was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified playlist.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $playlist = Playlist::findOrFail($id);

        return view('playlists.show', compact('playlist'));
    }

    /**
     * Show the form for editing the specified playlist.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $playlist = Playlist::findOrFail($id);


        return view('playlists.edit', compact('playlist'));
    }

    /**
     * Update the specified playlist in the storage.
     *
     * @param int $id
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        try {

            $data = $this->getData($request);

            $playlist = Playlist::findOrFail($id);
            $playlist->update($data);

            return redirect()->route('playlists.playlist.index')
                ->with('success_message', 'Playlist was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Remove the specified playlist from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $playlist = Playlist::findOrFail($id);
            $playlist->delete();

            return redirect()->route('playlists.playlist.index')
                ->with('success_message', 'Playlist was successfully deleted.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }


    /**
     * Get the request's data from the request.
     *
     * @param Illuminate\Http\Request\Request $request
     * @return array
     */
    protected function getData(Request $request)
    {
        $rules = [
                'date' => 'required|date_format:j/n/Y g:i A',
        ];

        $data = $request->validate($rules);


        return $data;
    }

}
