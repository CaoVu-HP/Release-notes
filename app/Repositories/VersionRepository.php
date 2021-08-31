<?php
namespace App\Repositories;
use App\Models\Department;
use App\Models\Version;
class VersionRepository
{
    // Get all Version
    public function getAllVersion(){
        return Version::orderBy('created_at')->get();
    }
    public function searchVersions($param){
        return Version::where(array('name'=> array('$regex' => "$param")))->get();
    }
    public function insert( $version)
    {
         $version ->save();
       $department= Department::where('name',$version['department'])->first();
        Department::where('name',$version['department'])->push(['user_id' => $version->_id]);
        $department->amount++;
       $department->save();
    }
    public function update( $version,$oldDepartment)
    {
        $version ->save();
        $department= Department::where('name',$version['department'])->first();
        Department::where('name',$version['department'])->push(['user_id' => $version->_id]);
        $department->amount++;
        $department->save();
        $oldDepartment= Department::where('name',$oldDepartment['name'])->first();
        Department::where('name',$oldDepartment['name'])->pull(['user_id' => $version->_id]);
        $oldDepartment->amount--;
        $oldDepartment->save();
    }


    public function findVersion($version)
    {
        return  Version::find($version);
    }

    public function delete($version)
    {
        $version=Version::where('_id', $version)->first();
        $version->delete();
        $department=Department::where('name',$version->department)->first();
        Department::where('name',$version->department)->pull(['user_id' => $version->_id]);
        $department->amount--;
        $department->save();
    }
}

