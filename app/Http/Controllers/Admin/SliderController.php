<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\SliderContract;
use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;

class SliderController extends BaseController
{
    protected $sliderRepository;

    public function __construct(SliderContract $sliderRepository)
    {
        $this->sliderRepository = $sliderRepository;
    }

    public function index()
    {
        $sliders = $this->sliderRepository->listSlider();

        $this->setPageTitle('Slider','List of all sliders');
        return view('backend.sliders.index',compact('sliders'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(){
        $this->setPageTitle('Slider','Create Slider');
        return view('backend.sliders.create');
    }

    public function store(Request $request){
        $this->validate($request,[
            'title_one'          => 'required|max:191',
            'image'         =>  'nullable|mimes:jpg,jpeg,png,webp,gif,svg|max:1000'
        ]);

        $params = $request->except('_token');


        $slider = $this->sliderRepository->createSlider($params);

        if(!$slider){
            return $this->responseRedirectBack('Error occurred while creating slider','error',true,true);
        }

        return $this->responseRedirect('admin.sliders.index','Slider Added Successfully','success',false,false);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $t_slider = $this->sliderRepository->findSliderById($id);
        $this->setPageTitle('Slider','Edit Slider : '.$t_slider->title_one);
        return view('backend.sliders.edit',compact('t_slider'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request){

        $this->validate($request,[
            'title_one'          => 'required|max:191',
            'image'         =>  'nullable|mimes:jpg,jpeg,png,webp,gif,svg|max:1000'
        ]);

        $params = $request->except('_token');

        $slider = $this->sliderRepository->updateSlider($params);

        if(!$slider){
            return $this->responseRedirectBack('Error occurred while updating slider','error',true,true);
        }

        return $this->responseRedirectBack('Slider updated successfully','success',false,false);
    }

    public function delete($id){
        $slider = $this->sliderRepository->deleteSlider($id);

        if(!$slider){
            return $this->responseRedirectBack('Error occurred while deleting slider','error',true,true);
        }

        return $this->responseRedirect('admin.sliders.index','Slider deleted successfully','success',false,false);
    }

}
