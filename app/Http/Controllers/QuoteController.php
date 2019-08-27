<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quote;
use App\Models\User;
use Auth;
use Carbon\Traits\Timestamp;

class QuoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $quotes = Quote::all();
        return view('quotes.index', compact('quotes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('quotes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title'     => 'required|min:3',
            'subject'   => 'required|min:5'
        ]);

        $slug = str_slug($request->title, '-');

        if(Quote::where('title', $request->title)->first() != null)
            return redirect('/quotes/create')->with('msg', 'Judul sudah ditemukan, tidak boleh sama.');

        $quotes = Quote::create([
            'title'     => $request->title,
            'slug'      => $slug,
            'subject'   => $request->subject,
            'user_id'   => Auth::user()->id,
        ]);

        return redirect('/quotes')->with('msg', 'Kutipan berhasil dibuat');
    }

    /**
     * Display the specified resource.
     *
     * @param  string slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $quote = Quote::where('slug',$slug)->first();

        if(empty($quote))
            abort(404);

        return view('quotes.single', compact('quote'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $quote = Quote::findOrFail($id);
        return view('quotes.edit', compact('quote'));
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
        $quote = Quote::findOrFail($id);

        if($quote->userIsOwner())
        {
            $this->validate($request,[
                'title'     => 'required|min:3',
                'subject'   => 'required|min:5'
            ]);

            $quote->update([
                'title'   => $request->title,
                'subject' => $request->subject
            ]);
        }
        else return redirect('/quotes')->with('msg', 'User Bangsat! Tidak boleh ngedit ini jancoeg!');;

        return redirect('/quotes')->with('msg', 'Kutipan berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $quote = Quote::findOrFail($id);

        if($quote->userIsOwner())
            $quote->delete();
        else abort(403);

        return redirect('/quotes')->with('msg', 'Kutipan berhasil dihapus');
    }
}
