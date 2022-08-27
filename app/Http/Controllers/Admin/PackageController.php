<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Repositories\PackageRepository;
use Illuminate\Http\Request;

class PackageController extends BaseController
{
    protected $packageRepository;

    public function __construct(PackageRepository $packageRepository)
    {
        $this->packageRepository = $packageRepository;
    }

    public function index()
    {
        $packages = $this->packageRepository->listPackage();
        $this->setPageTitle('Packages','List of all packages');
        return view('backend.packages.index',compact('packages'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(){
        $this->setPageTitle('Packages','Create New Packages');
        return view('backend.packages.create');
    }

    public function store(Request $request){
        $this->validate($request,[
            'title'          => 'required|max:191',
            'name'          => 'required|max:191',
            'sorting'        => 'required|numeric',
            'price'        => 'required|numeric',
        ]);

        $params = $request->except('_token');


        $content = $this->packageRepository->createPackage($params);

        if(!$content){
            return $this->responseRedirectBack('Error occurred while creating content','error',true,true);
        }

        return $this->responseRedirect('admin.packages.index','Content Added Successfully','success',false,false);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $t_package = $this->packageRepository->findPackageById($id);
        $this->setPageTitle('Packages','Edit packages : '.$t_package->name);
        return view('backend.packages.edit',compact('t_package'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request){

        $this->validate($request,[
            'title'          => 'required|max:191',
            'name'          => 'required|max:191',
            'sorting'        => 'required|numeric',
            'price'        => 'required|numeric',
        ]);

        $params = $request->except('_token');

        $content = $this->packageRepository->updatePackage($params);

        if(!$content){
            return $this->responseRedirectBack('Error occurred while updating content','error',true,true);
        }

        return $this->responseRedirectBack('Content updated successfully','success',false,false);
    }

    public function delete($id){
        $content = $this->packageRepository->deletePackage($id);

        if(!$content){
            return $this->responseRedirectBack('Error occurred while deleting content','error',true,true);
        }

        return $this->responseRedirect('admin.packages.index','Content deleted successfully','success',false,false);
    }
}
