<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Urlinfos;
use Illuminate\Support\Str;

use Illuminate\Support\Facades\Auth;

class UrlController extends Controller
{
    public function index(Request $request) {
        $urls = Urlinfos::where('user_id', auth()->id())->get();

        return view('urls.index', compact('urls'));
    }
    

    public function create() {
        return view('urls.create');
    }

   
    public function store(Request $request) {
     
        $request->validate([
            'urllink' => 'required|url',
            'urlname' => 'required'
        ]);

        $shortUrl = Str::random(10); 

       

        Urlinfos::create([
            'user_id' => Auth::id(),
            'name' => $request->urlname,
            'long_url' => $request->urllink,
            'short_url' => $shortUrl,

        ]);

       
        return redirect()->route('urls.index')->with('success', 'Urls created successfully.');
    }

 
    public function golink($url)
    {
        $url = Urlinfos::where('short_url', $url)->firstOrFail();
        $url->increment('click_count');
        return redirect($url->long_url);
    }

   
    public function edit(Urlinfos $url) {
        return view('urls.edit', compact('url'));
    }

   
    public function update(Request $request, Urlinfos $url)
    {
      
        $request->validate([
            'urllink' => 'required|url',
            'urlname' => 'required'
        ]);

        $shortUrl = Str::random(10); 

        $url->update([
            'user_id' => Auth::id(),
            'name' => $request->urlname,
            'long_url' => $request->urllink,
            'short_url' => $shortUrl,

        ]);
    
      
        return redirect()->route('urls.index')->with('success', 'Url updated successfully!');
    }

 
    public function destroy($id) {

        $url = Urlinfos::find($id); 
        $url->delete();
        return redirect()->route('urls.index')->with('success', 'Url deleted successfully.');
    }
}
