<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Service;
use Illuminate\Http\Request;
use Exception;

class ServiceController extends Controller
{

    /**
     * Display a listing of the services.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $services = Service::paginate(25);

        return view('services.index', compact('services'));
    }

    /**
     * Show the form for creating a new service.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {


        return view('services.create');
    }

    /**
     * Store a new service in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {

            $data = $this->getData($request);

            Service::create($data);

            return redirect()->route('services.service.index')
                ->with('success_message', 'Service was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified service.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $service = Service::findOrFail($id);

        return view('services.show', compact('service'));
    }

    /**
     * Show the form for editing the specified service.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $service = Service::findOrFail($id);


        return view('services.edit', compact('service'));
    }

    /**
     * Update the specified service in the storage.
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

            $service = Service::findOrFail($id);
            $service->update($data);

            return redirect()->route('services.service.index')
                ->with('success_message', 'Service was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Remove the specified service from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $service = Service::findOrFail($id);
            $service->delete();

            return redirect()->route('services.service.index')
                ->with('success_message', 'Service was successfully deleted.');
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
            'prelude' => 'nullable|numeric|min:-2147483648|max:2147483647',
            'offertory' => 'nullable|numeric|min:-2147483648|max:2147483647',
            'special' => 'nullable|numeric|min:-2147483648|max:2147483647',
            'leader' => 'required|numeric|min:-2147483648|max:2147483647',
            'speaker' => 'nullable|string|min:0|max:191',
            'theme' => 'nullable|string|min:0|max:191',
        ];

        $data = $request->validate($rules);


        return $data;
    }

}
