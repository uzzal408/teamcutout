<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\AboutContract;
use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;

class AboutController extends BaseController
{
    protected $aboutRepository;

    public function __construct(AboutContract $aboutContract)
    {
        $this->aboutRepository = $aboutContract;
    }

    public function index()
    {
        $abouts = $this->aboutRepository->listAbout();
        $this->setPageTitle('About Content','List of all abouts');
        return view('backend.abouts.index',compact('abouts'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(){
        $this->setPageTitle('About Page','Create About');
        return view('backend.abouts.create');
    }

    public function store(Request $request){
        $this->validate($request,[
            'title'          => 'required|max:191',
            'desc'          => 'required|max:191',
            'image'         =>  'nullable|mimes:jpg,jpeg,png,webp,gif,svg|max:1000'
        ]);

        $params = $request->except('_token');


        $content = $this->aboutRepository->createAbout($params);

        if(!$content){
            return $this->responseRedirectBack('Error occurred while creating content','error',true,true);
        }

        return $this->responseRedirect('admin.abouts.index','Content Added Successfully','success',false,false);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $t_about = $this->aboutRepository->findAboutById($id);
        $this->setPageTitle('About Content','Edit about : '.$t_about->title);
        return view('backend.abouts.edit',compact('t_about'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request){

        $this->validate($request,[
            'title'          => 'required|max:191',
            'desc'          => 'required|max:191',
            'image'         =>  'nullable|mimes:jpg,jpeg,png,webp,gif,svg|max:1000'
        ]);

        $params = $request->except('_token');

        $content = $this->aboutRepository->updateAbout($params);

        if(!$content){
            return $this->responseRedirectBack('Error occurred while updating content','error',true,true);
        }

        return $this->responseRedirectBack('Content updated successfully','success',false,false);
    }

    public function delete($id){
        $content = $this->aboutRepository->deleteAbout($id);

        if(!$content){
            return $this->responseRedirectBack('Error occurred while deleting content','error',true,true);
        }

        return $this->responseRedirect('admin.abouts.index','Content deleted successfully','success',false,false);
    }
}
