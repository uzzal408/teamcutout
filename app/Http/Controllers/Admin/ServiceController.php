<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Repositories\ServiceRepository;
use Illuminate\Http\Request;

class ServiceController extends BaseController
{
    protected $serviceRepository;

    public function __construct(ServiceRepository $serviceRepository)
    {
        $this->serviceRepository = $serviceRepository;
    }

    public function index()
    {
        $services = $this->serviceRepository->listSerivce();
        $this->setPageTitle('Services','List of all services');
        return view('backend.services.index',compact('services'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(){
        $this->setPageTitle('Services','Create New Service');
        return view('backend.services.create');
    }

    public function store(Request $request){
        $this->validate($request,[
            'title'          => 'required|max:191',
            'sorting'        => 'required|numeric',
            'image'          =>  'nullable|mimes:jpg,jpeg,png,webp,gif,svg|max:1000'
        ]);

        $params = $request->except('_token');


        $content = $this->serviceRepository->createService($params);

        if(!$content){
            return $this->responseRedirectBack('Error occurred while creating content','error',true,true);
        }

        return $this->responseRedirect('admin.services.index','Content Added Successfully','success',false,false);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $t_service = $this->serviceRepository->findServiceById($id);
        $this->setPageTitle('Services','Edit service : '.$t_service->title);
        return view('backend.services.edit',compact('t_service'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request){

        $this->validate($request,[
            'title'          => 'required|max:191',
            'sorting'        => 'required|numeric',
            'image'         =>  'nullable|mimes:jpg,jpeg,png,webp,gif,svg|max:1000'
        ]);

        $params = $request->except('_token');

        $content = $this->serviceRepository->updateService($params);

        if(!$content){
            return $this->responseRedirectBack('Error occurred while updating content','error',true,true);
        }

        return $this->responseRedirectBack('Content updated successfully','success',false,false);
    }

    public function delete($id){
        $content = $this->serviceRepository->deleteService($id);

        if(!$content){
            return $this->responseRedirectBack('Error occurred while deleting content','error',true,true);
        }

        return $this->responseRedirect('admin.services.index','Content deleted successfully','success',false,false);
    }
}
