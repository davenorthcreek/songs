<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Musician;
use Illuminate\Http\Request;
use Exception;

class MusicianController extends Controller
{

    /**
     * Display a listing of the musicians.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $musicians = Musician::paginate(25);

        return view('musicians.index', compact('musicians'));
    }

    /**
     * Show the form for creating a new musician.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {


        return view('musicians.create');
    }

    /**
     * Store a new musician in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {

            $data = $this->getData($request);

            Musician::create($data);

            return redirect()->route('musicians.musician.index')
                ->with('success_message', 'Musician was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified musician.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $musician = Musician::findOrFail($id);

        return view('musicians.show', compact('musician'));
    }

    /**
     * Show the form for editing the specified musician.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $musician = Musician::findOrFail($id);


        return view('musicians.edit', compact('musician'));
    }

    /**
     * Update the specified musician in the storage.
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

            $musician = Musician::findOrFail($id);
            $musician->update($data);

            return redirect()->route('musicians.musician.index')
                ->with('success_message', 'Musician was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Remove the specified musician from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $musician = Musician::findOrFail($id);
            $musician->delete();

            return redirect()->route('musicians.musician.index')
                ->with('success_message', 'Musician was successfully deleted.');
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
                'name' => 'required|string|min:1|max:191',
            'email' => 'required|string|min:1|max:191',
            'phone' => 'required|string|min:1|max:191',
        ];

        $data = $request->validate($rules);


        return $data;
    }

}
