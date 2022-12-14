<?php

namespace App\Http\Controllers;

use App\Traits\FlashMessage;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    use FlashMessage;

    protected $data= null;

    /**
     * @param $title
     * @param $subTitle
     */


    protected function setPageTitle($title,$subTitle)
    {
        view()->share(['pageTitle'=>$title, 'pageSubTitle' => $subTitle]);
    }

    /**
     * @param @errorCode
     * @param null @message
     * @return \Illuminate\Http\Response
     */

    protected function showErrorPage($errorCode=404,$message=null)
    {
        $data['message'] = $message;
        return response()->view('errors. '.$errorCode,$data,$errorCode);
    }

    /**
     * @param bool $error
     * @param int $responseCode
     * @param array $message
     * @param null $data
     * @return \Illuminate\Http\JsonResponse
     */

    protected function jsonResponse($error=true,$responseCode=200,$message=[],$data=null)
    {
        return response()->json([
            'error'         => $error,
            'response_code' => $responseCode,
            'message'       => $message,
            'data'          => $data
        ]);
    }

    /**
     * @param $route
     * @param $message
     * @param string $type
     * @param bool $error
     * @param bool @withOldInputError
     * @return \Illuminate\Http\RedirectResponse
     */

    protected function responseRedirect($route,$message,$type='info',$error=false,$withOldInputError=false)
    {
        $this->setFlashMessage($message,$type);
        $this->showFlashMessage();

        if ($error && $withOldInputError){
            return redirect()->back()->withInput();
        }

        return redirect()->route($route);
    }

    /**
     * @param $message
     * @param string $type
     * @param bool $error
     * @param bool $withOldInputError
     * @return \Illuminate\Http\RedirectResponse
     */

    protected function responseRedirectBack($message,$type = 'info',$error=false,$withOldInputError=false)
    {
        $this->setFlashMessage($message,$type);
        $this->showFlashMessage();
        if($error && $withOldInputError){
            return redirect()->back()->withInput();
        }
        return redirect()->back();
    }
}
