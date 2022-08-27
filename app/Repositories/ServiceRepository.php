<?php
namespace App\Repositories;

use App\Contracts\ServiceContract;
use App\Models\Service;
use App\Repositories\BaseRepository;
use Illuminate\Http\UploadedFile;
use App\Traits\UploadAble;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Doctrine\Instantiator\Exception\InvalidArgumentException;


class ServiceRepository extends BaseRepository implements ServiceContract
{
    use UploadAble;

    public function __construct(Service $model)
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
    public function listSerivce(string $order = 'id', string $sort = 'desc', array $columns = ['*'])
    {
        return $this->all($columns,$order,$sort);
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function findServiceById(int $id)
    {
        try{
            return $this->findOneOrFail($id);
        } catch (ModelNotFoundException $e){
            throw new ModelNotFoundException($e);
        }
    }

    public function createService(array $params)
    {

        try{
            $collection = collect($params);
            $image = null;

            if($collection->has('image') && ($params['image'] instanceof UploadedFile)){
                $image = $this->uploadOne($params['image'],'services');
            }
            $status   = $collection->has('status') ? 1 : 0 ;
            $merge = $collection->merge(compact('image','status'));
            $service = new Service($merge->all());
            $service->save();
            return $service;

        }catch (QueryException $exception){
            throw  new InvalidArgumentException($exception->getMessage());
        }
    }


    /**
     * @param array $params
     * @return mixed
     */
    public function updateService(array $params)
    {
        $service = $this->findServiceById($params['id']);
        $image = $service->image;

        $collection = collect($params)->except('_token');

        if ($collection->has('image') && ($params['image'] instanceof UploadedFile)){

            if($service->image !=null){
                $this->deleteOne($service->image);
            }

            $image = $this->uploadOne($params['image'],'services');
        }
        $status    = $collection->has('status') ? 1 : 0 ;
        $merge = $collection->merge(compact('status','image'));
        $service->update($merge->all());

        return $service;


    }

    public function deleteService(int $id)
    {
        $service = $this->findServiceById($id);
        if($service->image != null){
            $this->deleteOne($service->image);
        }
        $service->delete();
        return $service;
    }
}
