<?php

namespace App\Http\Controllers;

use App\Models\Content;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    function getContains()
    {
        $contentData =  Content::orderby('created_at', 'desc')->get();
        return view('Content.Content', compact('contentData'));
    }
    function editContent(Content $content)
    {
        return  view('Content.UpdateContent', compact('content'));
    }
    function updateContent(Request $request, Content $content)
    {
        // return $request;
        // dd("before -> ",$params);
        $request->validate([
            'description' => 'required'
        ]);
        $params = $this->attributes($request);
        $params['slug'] = strtolower(str_replace(' ', '-', $request->name));

        // dd("before -> ", $params);

        if ($request->hasFile("media")) {
            $params["media"] = $this->media($request, "cart");
        }
        // dd($params);
        $content->update($params);
        // $content->update($this->attributes($request));
        return  redirect(route('content.list'))->with('message', 'Content Updated Successfully');
    }
    private function attributes($request)
    {
        $data = $request->only([
            'name',
            'type',
            'description',
            'media',
        ]);

        return $data;
    }
}
