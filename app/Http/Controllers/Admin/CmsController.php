<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cms;

class CmsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.cms.list');
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
        //
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
        $cms = Cms::find($id);
        if(!is_null($cms) && $cms->slug=="about-us"){
            return view('admin.cms.about-us-edit',compact('cms'));
        }elseif(!is_null($cms) && $cms->slug=="privacy-policy"){
            return view('admin.cms.privacy-policy-edit',compact('cms'));
        }elseif(!is_null($cms) && $cms->slug=="privacy"){
            return view('admin.cms.privacy',compact('cms'));
        }elseif(!is_null($cms) && $cms->slug=="terms-of-use"){
            return view('admin.cms.terms-conditions-edit',compact('cms'));
        }elseif(!is_null($cms) && $cms->slug=="copyright-policy"){
            return view('admin.cms.copyright-policy-edit',compact('cms'));
        }else{
            return redirect()->back()->with('error','CMS not found');
        }
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
}
