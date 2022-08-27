<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Models\Settings;
use App\Traits\UploadAble;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

class CounterController extends BaseController
{
    use UploadAble;
    public function index()
    {
        $this->setPageTitle('Portfolio(Counter)','Manage Portfolio');
        return view('backend.mix-blades.counter');
    }

    public function update(Request $request)
    {
        $keys = $request->except('_token');
        if($request->has('counter_image') && $request->file('counter_image') instanceof UploadedFile){
            if(config('settings.counter_image')!=null){
                $this->deleteOne(config('settings.counter_image'));
            }
            $logo = $this->uploadOne($request->file('counter_image'),'img');
            Settings::set('counter_image',$logo);

        }else {
            foreach ($keys as $key => $value) {
                Settings::set($key, $value);
            }
        }
        return $this->responseRedirectBack('Portfolio updated successfully.','success');
    }
}
