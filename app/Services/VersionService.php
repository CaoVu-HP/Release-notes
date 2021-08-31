<?php
namespace App\Services;
use App\Models\Department;
use App\Models\Version;
use App\Repositories\VersionRepository;
use Intervention\Image\Facades\Image;
use Symfony\Component\Console\Input\Input;

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

    public function searchVersions($param)
    {
        return $this->versionRepository->searchVersions($param);
    }
    public function insert($param)
    {
         $param->validate([
            'name' => 'required',
            'department' => 'required',
            'position' => 'required',
            'time' => 'required',
             'image' => '',
                                    ]);
            $imagePath = (\request('image')->store('uploads', 'public'));
            $image=Image::make(public_path("storage/{$imagePath}"))->fit(100,100);
            $image->save();
            $version = new Version();
            $version ->name  =$param ['name'];
            $version ->department  =$param['department'];
            $version ->position =$param ['position'];
            $version ->time =$param ['time'];
            $version->image=$imagePath;
            $this->versionRepository->insert($version);
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
        request()->validate(
            [
                'image' => '',
            ]
        );
        if(request('image')){
            $imagePath = (\request('image')->store('uploads', 'public'));
            $image=Image::make(public_path("storage/{$imagePath}"))->fit(100,100);
            $image->save();
        }
        $version=Version::find($param->id);
        $oldDepartment=Department::where('name',$version->department)->first();
        if(request('image')){
            $version->image = $imagePath;
        }
        $version ->name  =$param ['name'];
        $version ->department  =$param['department'];
        $version ->position =$param ['position'];
        $version ->time =$param ['time'];

        $this->versionRepository->update($version,$oldDepartment);
    }

    public function delete($param)
    {
        $this->versionRepository->delete($param);
    }


}
