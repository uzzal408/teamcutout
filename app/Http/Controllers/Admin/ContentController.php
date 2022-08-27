<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Models\Settings;
use App\Traits\UploadAble;
use Illuminate\Http\Request;

class ContentController extends BaseController
{
    use UploadAble;
    public function index()
    {
        $this->setPageTitle('Content Page','Manage Content');
        return view('backend.mix-blades.index');
    }

    public function update(Request $request)
    {

        $keys = $request->except('_token');
        foreach ($keys as $key => $value){
            Settings::set($key,$value);
        }
        return $this->responseRedirectBack('Content updated successfully.','success');
    }
}
