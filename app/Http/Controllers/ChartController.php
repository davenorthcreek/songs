<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Song;
use App\Chart;
use Illuminate\Http\Request;
use Exception;

class ChartController extends Controller
{

    /**
     * Display a listing of the charts.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $charts = Chart::with('song')->paginate(25);

        return view('charts.index', compact('charts'));
    }

    /**
     * Show the form for creating a new chart.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $songs = Song::pluck('title','id')->all();

        return view('charts.create', compact('songs'));
    }

    /**
     * Store a new chart in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {

            $data = $this->getData($request);

            Chart::create($data);

            return redirect()->route('charts.chart.index')
                ->with('success_message', 'Chart was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified chart.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $chart = Chart::with('song')->findOrFail($id);

        return view('charts.show', compact('chart'));
    }

    /**
     * Show the form for editing the specified chart.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $chart = Chart::findOrFail($id);
        $songs = Song::pluck('title','id')->all();

        return view('charts.edit', compact('chart','songs'));
    }

    /**
     * Update the specified chart in the storage.
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

            $chart = Chart::findOrFail($id);
            $chart->update($data);

            return redirect()->route('charts.chart.index')
                ->with('success_message', 'Chart was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Remove the specified chart from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $chart = Chart::findOrFail($id);
            $chart->delete();

            return redirect()->route('charts.chart.index')
                ->with('success_message', 'Chart was successfully deleted.');
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
                'song_id' => 'required',
            'type' => 'required|string|min:1|max:191',
            'platform' => 'required|string|min:1|max:191',
            'link' => 'required|string|min:1|max:191',
            'key' => 'required|string|min:1|max:191',
        ];

        $data = $request->validate($rules);


        return $data;
    }

}
