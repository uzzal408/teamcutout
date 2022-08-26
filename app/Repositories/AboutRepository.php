<?php
namespace App\Repositories;

use App\Contracts\AboutContract;
use App\Models\About;
use App\Models\Slider;
use App\Repositories\BaseRepository;
use Illuminate\Http\UploadedFile;
use App\Traits\UploadAble;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Doctrine\Instantiator\Exception\InvalidArgumentException;


class AboutRepository extends BaseRepository implements AboutContract
{
    use UploadAble;

    public function __construct(About $model)
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
    public function listAbout(string $order = 'id', string $sort = 'desc', array $columns = ['*'])
    {
        return $this->all($columns,$order,$sort);
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function findAboutById(int $id)
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
    public function createAbout(array $params)
    {

        try{
            $collection = collect($params);
            $image = null;

            if($collection->has('image') && ($params['image'] instanceof UploadedFile)){
                $image = $this->uploadOne($params['image'],'sliders');
            }
            $status   = $collection->has('status') ? 1 : 0 ;
            $merge = $collection->merge(compact('image','status'));
            $about = new About($merge->all());
            $about->save();
            return $about;

        }catch (QueryException $exception){
            throw  new InvalidArgumentException($exception->getMessage());
        }
    }


    /**
     * @param array $params
     * @return mixed
     */
    public function updateAbout(array $params)
    {
        $about = $this->findAboutById($params['id']);
        $image = $about->image;

        $collection = collect($params)->except('_token');

        if ($collection->has('image') && ($params['image'] instanceof UploadedFile)){

            if($about->image !=null){
                $this->deleteOne($about->image);
            }

            $image = $this->uploadOne($params['image'],'abouts');
        }
        $status    = $collection->has('status') ? 1 : 0 ;
        $merge = $collection->merge(compact('status','image'));
        $about->update($merge->all());

        return $about;


    }

    public function deleteAbout(int $id)
    {
        $about = $this->findAboutById($id);
        if($about->image != null){
            $this->deleteOne($about->image);
        }
        $about->delete();
        return $about;
    }
}
