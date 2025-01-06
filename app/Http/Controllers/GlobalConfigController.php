<?php

namespace App\Http\Controllers;

use App\Models\GlobalConfig;
use Illuminate\Http\Request;

class GlobalConfigController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.global.config');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $request->validate([
            "application_name" => 'required|max:100',
            "application_email" => 'required|max:100',
            "phone" => 'required|max:100',
            "address" => 'required|max:100',
            "application_logo" => 'nullable|image|mimes:jpeg,jpg,png|max:1024',
        ]);
        // dd($request->all());
        $des = 'logo';
        $request->request->remove('_token');
        foreach ($request->all() as $key => $value) {

            if ($key == 'application_logo') {
                if ($request->hasFile('application_logo')) {

                    if (getGlobalConfig('application_logo')) {
                        deleteFile(getGlobalConfig('application_logo'));
                    }
                    $path = saveImage($des, $request->application_logo);
                    $this->GlobalConfigUpdate($key, $path);
                }
            } else {
                $this->GlobalConfigUpdate($key, $value);
            }
        }


        return redirect(route('global.config'));
    }

    private function GlobalConfigUpdate($key, $value)
    {
        $config = GlobalConfig::where('key', $key)->first();

        if ($config != NULL) {
            $config->value = is_array($value) ? implode(',', $value) : $value;

            return $config->save();
        } else {
            $config = new GlobalConfig();

            $config->key   = $key;
            $config->value = is_array($value) ? implode(',', $value) : $value;

            return $config->save();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\GlobalConfig  $globalConfig
     * @return \Illuminate\Http\Response
     */
    public function show(GlobalConfig $globalConfig)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\GlobalConfig  $globalConfig
     * @return \Illuminate\Http\Response
     */
    public function edit(GlobalConfig $globalConfig)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\GlobalConfig  $globalConfig
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GlobalConfig $globalConfig)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\GlobalConfig  $globalConfig
     * @return \Illuminate\Http\Response
     */
    public function destroy(GlobalConfig $globalConfig)
    {
        //
    }
}
