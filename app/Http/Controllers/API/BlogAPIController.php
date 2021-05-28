<?php

namespace App\Http\Controllers\API;

use App\Models\Blog;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\BlogRequest;
use App\Http\Controllers\AppBaseController;

class BlogAPIController extends AppBaseController
{

 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {   
        $blogs=Blog::where('user_id',$id)->get();
        return $this->sendSuccess($blogs,"My blogs list!");
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BlogRequest $request,$id)
    {
        $input=$request->all();
        $input['user_id']=$id;
        $input['status']=1;//1=active, 0=inactive
        $blog=Blog::create($input);
        return $this->sendSuccess($blog,"Successfully store your blog");

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog,$id)
    {
        return $this->sendSuccess($blog->where('id',$id)->first(),"Successfully get blog");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(BlogRequest $request, Blog $blog,$id)
    {
        
        $blog->where('id',$id)->update($request->all());
        return $this->sendSuccess($blog->where('id',$id)->first(),"Successfully update your blog");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog,$id)
    {
        
        $blog->where('id',$id)->delete();
        return $this->sendSuccess([],"Successfully deleted your blog");
    }
}
