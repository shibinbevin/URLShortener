<?php

namespace App\Http\Controllers;

use App\Models\Url;
use Illuminate\Http\Request;

class UrlController extends Controller
{
    public function addurl(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'originalurl' => 'required|string|max:255',
        ]);

        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $shortenedurl = '';
        for ($i = 0; $i < 6; $i++) {
            $shortenedurl .= $characters[rand(0, strlen($characters) - 1)];
        }

        $model = new Url;
        $model->title = $validatedData['title'];
        $model->originalurl = $validatedData['originalurl'];
        $model->shortenedurl = $shortenedurl;

        $model->save();
        return redirect('/urls')->with('success', 'Url Added!');
    }
    public function redirect($shortenedurl)
    {
        // $parameters = $request->route()->parameters();
        // $shortenedurl = $parameters['shortenedurl'];

        $record = Url::where('shortenedurl', $shortenedurl)->first();

        if ($record) {
            return redirect($record->originalurl);
            }else {
            return abort(404);
        }
    }
    public function geturls(Request $request)
    {
        $data = Url::all(); 
        
        return view('User/urls', ['urls' => $data]);
    }
    public function deleteRecord($id)
{
    $record = Url::find($id);

    if ($record) {
        $record->delete();
        return redirect()->back()->with('success', 'Record deleted successfully');
    } else {
        return redirect()->back()->with('error', 'Record not found');
    }
}
public function edit($id)
{
    $url = Url::findOrFail($id);

    return view('/user/editurl', ['url' => $url]);
}
public function editurl(Request $request, $id)
{
    $url = Url::findOrFail($id);

    $validatedData = $request->validate([
        'title' => 'required|string|max:255',
        'originalurl' => 'required|string|max:255',
    ]);

    $url->update($validatedData);

    return redirect()->route('urls')->with('success', 'Record updated successfully');
}
}
