<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Song;
use Illuminate\Http\Request;
use Exception;
use Log;

class SongsController extends Controller
{

    /**
     * Display a listing of the songs.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $songs = Song::paginate(25);

        return view('songs.index', compact('songs'));
    }

    /**
     * Show the form for creating a new song.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {


        return view('songs.create');
    }

    /**
     * Store a new song in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {

            $data = $this->getData($request);
            Log::debug($data);
            Song::create($data);

            return redirect()->route('songs.song.index')
                ->with('success_message', 'Song was successfully added.');
        } catch (Exception $exception) {
            Log::debug($exception);
            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified song.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $song = Song::findOrFail($id);

        return view('songs.show', compact('song'));
    }

    /**
     * Show the form for editing the specified song.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $song = Song::findOrFail($id);


        return view('songs.edit', compact('song'));
    }

    /**
     * Update the specified song in the storage.
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

            $song = Song::findOrFail($id);
            $song->update($data);

            return redirect()->route('songs.song.index')
                ->with('success_message', 'Song was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Remove the specified song from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $song = Song::findOrFail($id);
            $song->delete();

            return redirect()->route('songs.song.index')
                ->with('success_message', 'Song was successfully deleted.');
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
                'title' => 'required|string|min:1|max:191',
            'songwriter' => 'nullable|string|min:0|max:191',
            'hymnal_page' => 'nullable|numeric|min:-2147483648|max:2147483647',
        ];

        $data = $request->validate($rules);


        return $data;
    }

}
