<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books=\App\perpustakaan::all();
        return view('index',compact('books'));        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $book = new \App\perpustakaan;
        $book->judul = $request->get('judul');
        $book->penerbit = $request->get('penerbit');
        $book->tanggal_terbit = $request->get('tanggal_terbit');
        $book->pengarang = $request->get('pengarang');
        $book->save();
        
        return redirect('books')->with('success', 'Data buku telah ditambahkan');   
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = \App\perpustakaan::find($id);
        return view('edit',compact('book','id'));       
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
        //
        $book= \App\perpustakaan::find($id);
        $book->judul = $request->get('judul');
        $book->penerbit = $request->get('penerbit');
        $book->tanggal_terbit = $request->get('tanggal_terbit');
        $book->pengarang = $request->get('pengarang');
        $book->save();
        return redirect('books')->with('success', 'Data buku telah diubah');     
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
        $book = \App\perpustakaan::find($id);
        $book->delete();
        return redirect('books')->with('success','Data buku telah di hapus');

    }
}
