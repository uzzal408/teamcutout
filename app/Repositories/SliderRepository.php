<?php
namespace App\Repositories;

use App\Models\Slider;
use App\Contracts\SliderContract;
use App\Repositories\BaseRepository;
use Illuminate\Http\UploadedFile;
use App\Traits\UploadAble;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Doctrine\Instantiator\Exception\InvalidArgumentException;


class SliderRepository extends BaseRepository implements SliderContract
{
    use UploadAble;

    /**
     * SliderRepository constructor.
     * @param Slider $model
     */
    public function __construct(Slider $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }

    /**
     * @param string $order
     * @param string $sort
     * @param array $columns
     * @return mixed
     */
    public function listSlider(string $order = 'id', string $sort = 'desc', array $columns = ['*'])
    {
        return $this->all($columns,$order,$sort);
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function findSliderById(int $id)
    {
        try{
            return $this->findOneOrFail($id);
        } catch (ModelNotFoundException $e){
            throw new ModelNotFoundException($e);
        }
    }

    /**
     * @param array $params
     * @return Slider|mixed
     */
    public function createSlider(array $params)
    {
        // TODO: Implement createSlider() method.

        try{
            $collection = collect($params);
            $image = null;

            if($collection->has('image') && ($params['image'] instanceof UploadedFile)){
                $image = $this->uploadOne($params['image'],'sliders');
            }
            $status   = $collection->has('status') ? 1 : 0 ;
            $merge = $collection->merge(compact('image','status'));
            $slider = new Slider($merge->all());
            $slider->save();
            return $slider;

        }catch (QueryException $exception){
            throw  new InvalidArgumentException($exception->getMessage());
        }
    }


    /**
     * @param array $params
     * @return mixed
     */
    public function updateSlider(array $params)
    {
        // TODO: Implement updateSlider() method.

        $slider = $this->findSliderById($params['id']);
        $image = $slider->image;

        $collection = collect($params)->except('_token');

        if ($collection->has('image') && ($params['image'] instanceof UploadedFile)){

            if($slider->image !=null){
                $this->deleteOne($slider->image);
            }

            $image = $this->uploadOne($params['image'],'sliders');
        }
        $status    = $collection->has('status') ? 1 : 0 ;
        $merge = $collection->merge(compact('status','image'));
        $slider->update($merge->all());

        return $slider;


    }

    public function deleteSlider(int $id)
    {
        // TODO: Implement deleteSlider() method.

        $slider = $this->findSliderById($id);

        if($slider->image != null){
            $this->deleteOne($slider->image);
        }

        $slider->delete();

        return $slider;
    }
}
