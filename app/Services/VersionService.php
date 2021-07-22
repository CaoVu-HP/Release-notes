<?php
namespace App\Services;
use App\Models\Version;
use App\Repositories\VersionRepository;

class VersionService
{
    private $versionRepository;

    /**
     * GroupService constructor.
     * @param $groupRepository
     */
    public function __construct(VersionRepository $versionRepository)
    {
        $this->versionRepository = $versionRepository;
    }

    public function getAllVersion()
    {
        return $this->versionRepository->getAllVersion();
    }

    public function insert($param)
    {
         $param->validate([
            'name' => 'required',
            'content' => 'required',
            'author' => 'required',
            'time' => 'required'
                                    ]);
            $version = new Version();
            $version ->name  =$param ['name'];
            $version ->content  =$param['content'];
            $version ->author =$param ['author'];
            $version ->time =$param ['time'];
        return  $this->versionRepository->insert($version);
    }

    public function findVersion($id)
    {
        return  $this->versionRepository->findVersion($id);
    }

    public function edit($id)
    {
        $version= $this->versionRepository->findVersion($id);
    }

    public function saveVersion( $param)
    {
        $version=Version::find($param->id);
        $version ->name  =$param ['name'];
        $version ->content  =$param ['content'];
        $version ->author =$param ['author'];
        $version ->time =$param ['time'];
        return  $this->versionRepository->insert($version);
    }

    public function delete($param)
    {
        $this->versionRepository->delete($param);
    }


}
