<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App, View, Redirect, Response, Input, URL;

use App\Models\Serviteca;

class ServitecaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data['serviteca'] = $parking = Serviteca::getData();
        if($request->ajax())
        {
            $parking = View::make('serviteca.list', $data)->render();
            return Response::json(['html' => $parking]);
        }
        return View::make('serviteca.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $serviteca = new Serviteca;
        return View::make('serviteca.form')->with('serviteca', $serviteca);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $serviteca = new Serviteca;
        $data = Input::all();
        if ($serviteca->validAndSave($data)){
            return Redirect::route('serviteca.show', [$serviteca->id]);
        }else{
            return Redirect::route('serviteca.create')->withInput()->withErrors($serviteca->errors);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $serviteca = Serviteca::find($id);
        if (!$serviteca instanceof Serviteca) {
            App::abort(404);
        }
        return View::make('serviteca.show', ['serviteca' => $serviteca]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $serviteca = Serviteca::find($id);
        if (!$serviteca instanceof Serviteca) {
            App::abort(404);
        }
        return View::make('serviteca.form')->with('serviteca', $serviteca);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $serviteca = Serviteca::find($id);
        if (!$serviteca instanceof Serviteca) {
            App::abort(404);
        }
        $data = Input::all();
        if ($serviteca->validAndSave($data)){
            return Redirect::route('serviteca.show', [$serviteca->id]);
        }else{
            return Redirect::route('serviteca.edit', $serviteca->id)->withInput()->withErrors($serviteca->errors);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Store file parking.
     *
     * @return Response
     */
    public function file()
    {
        $serviteca = Serviteca::find(Input::get('serviteca_id'));
        if (!$serviteca instanceof Serviteca) {
            App::abort(404);
        }

        if (Input::hasFile('serviteca_imagen')) {
            $file = Input::file('serviteca_imagen');
            if(strpos($file->getClientMimeType(),'image') !== FALSE) {
                $upload_folder = '/img/';
                $file_name = str_random(). '.' . $file->getClientOriginalExtension();
                $file->move(public_path() . $upload_folder, $file_name);

                $serviteca->serviteca_imagen =  URL::to('/').$upload_folder.$file_name;
                $serviteca->save();
            }
        }
        return Redirect::route('serviteca.show', [$serviteca->id]);
    }
}
