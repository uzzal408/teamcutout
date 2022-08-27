<?php
namespace App\Repositories;

use App\Contracts\PackageContract;
use App\Models\Package;
use App\Repositories\BaseRepository;
use Illuminate\Http\UploadedFile;
use App\Traits\UploadAble;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Doctrine\Instantiator\Exception\InvalidArgumentException;


class PackageRepository extends BaseRepository implements PackageContract
{
    use UploadAble;

    public function __construct(Package $model)
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
    public function listPackage(string $order = 'id', string $sort = 'desc', array $columns = ['*'])
    {
        return $this->all($columns,$order,$sort);
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function findPackageById(int $id)
    {
        try{
            return $this->findOneOrFail($id);
        } catch (ModelNotFoundException $e){
            throw new ModelNotFoundException($e);
        }
    }

    public function createPackage(array $params)
    {

        try{
            $collection = collect($params);
            $image = null;

            if($collection->has('image') && ($params['image'] instanceof UploadedFile)){
                $image = $this->uploadOne($params['image'],'package');
            }
            $status   = $collection->has('status') ? 1 : 0 ;
            $merge = $collection->merge(compact('image','status'));
            $package = new Package($merge->all());
            $package->save();
            return $package;

        }catch (QueryException $exception){
            throw  new InvalidArgumentException($exception->getMessage());
        }
    }


    /**
     * @param array $params
     * @return mixed
     */
    public function updatePackage(array $params)
    {
        $service = $this->findPackageById($params['id']);
        $image = $service->image;

        $collection = collect($params)->except('_token');

        if ($collection->has('image') && ($params['image'] instanceof UploadedFile)){

            if($service->image !=null){
                $this->deleteOne($service->image);
            }

            $image = $this->uploadOne($params['image'],'packages');
        }
        $status    = $collection->has('status') ? 1 : 0 ;
        $merge = $collection->merge(compact('status','image'));
        $service->update($merge->all());

        return $service;


    }

    public function deletePackage(int $id)
    {
        $service = $this->findPackageById($id);
        if($service->image != null){
            $this->deleteOne($service->image);
        }
        $service->delete();
        return $service;
    }
}
