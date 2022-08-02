<?php
namespace App\Traits;


use Illuminate\Http\Request;
trait FlashMessage
{
    /**
     * @var array
     */

    protected $errorMessages = [];

    /**
     * @var array
     */

    protected $infoMessages = [];

    /**
     * @var array
     */

    protected $successMessages = [];

    /**
     * @var array
     */

    protected $warningMessages = [];


    /**
     * @param $message
     * @param $type
     */

    protected function setFlashMessage($message,$type)
    {
        $model = 'infoMessages';

        switch ($type){

            case 'info':{
                $model = 'infoMessages';
            }
                break;

            case 'error':{
                $model = 'errorMessages';
            }
                break;

            case 'success':{
                $model = 'successMessages';
            }
                break;

            case 'warning':{
                $model = 'successMessages';
            }
        }

        if(is_array($message)){
            foreach ($message as $key=>$value){
                array_push($this->$model,$value);
            }

        }else{
            array_push($this->$model,$message);
        }

//        dd($model);
    }

    protected function getFlashMessage()
    {
        return [
            'error'     => $this->errorMessages,
            'info'      => $this->infoMessages,
            'success'   => $this->successMessages,
            'warning'   => $this->warningMessages,
        ];
    }

    protected function showFlashMessage()
    {
        session()->flash('error',$this->errorMessages);
        session()->flash('info',$this->infoMessages);
        session()->flash('success',$this->successMessages);
        session()->flash('warning',$this->warningMessages);
    }
}
