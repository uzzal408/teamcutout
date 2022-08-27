<?php
namespace App\Contracts;

interface PackageContract
{
    /**
     * @param string $order
     * @param string $sort
     * @param array $columns
     * @return mixed
     */
    public function listPackage(string $order='id',string $sort = 'desc', array $columns = ['*']);

    /**
     * @param int $id
     * @return mixed
     */
    public function findPackageById(int $id);

    /**
     * @param array $params
     * @return mixed
     */
    public function createPackage(array $params);

    /**
     * @param array $params
     * @return mixed
     */
    public function updatePackage(array $params);

    /**
     * @param int $id
     * @return bool
     */
    public function deletePackage(int $id);
}
