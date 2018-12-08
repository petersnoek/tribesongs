<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Session;
use App\Song;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class SongsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index($order_by='id', $order_direct='asc')
    {
        $order_by         = Input::get('order_by')
                          ? Input::get('order_by')
                          : $order_by;

        $order_direct     = Input::get('order_direct')
                          ? Input::get('order_direct')
                          : $order_direct;

        $songs = Song::orderBy($order_by, $order_direct)->paginate(15);
        return view('songs.index', compact('songs'))
                ->with('order_by',      $order_by)
                ->with('order_direct',  $order_direct);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        return view('songs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return void
     */
    public function store(Request $request)
    {
        $this->validate($request, ['title' => 'required', 'author' => 'required', ]);

        Song::create($request->all());

        Session::flash('flash_message', 'Song added!');

        return redirect('songs');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function show($id)
    {
        $song = Song::findOrFail($id);
        return view('songs.show', compact('song'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function edit($id)
    {
        $song = Song::findOrFail($id);
        return view('songs.edit', compact('song'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function update($id, Request $request)
    {
        $this->validate($request, ['title' => 'required', 'author' => 'required', ]);

        $song = Song::findOrFail($id);
        $song->update($request->all());

        Session::flash('flash_message', 'Song updated!');

        return redirect('songs');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function destroy($id)
    {
        Song::destroy($id);

        Session::flash('flash_message', 'Song deleted!');

        return redirect('songs');
    }
}
