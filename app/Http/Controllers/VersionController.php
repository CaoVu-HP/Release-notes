<?php

namespace App\Http\Controllers;
use App\Models\Department;
use Illuminate\Http\Request;
use App\Models\Version;
use Session;
use App\Services\VersionService;
class VersionController extends Controller
{
    //
    private $versionService;

    /**
     * GroupController constructor.
     * @param VersionService $versionService
     */
    public function __construct(VersionService $versionService)
    {
        $this->versionService = $versionService;
    }

    public function index(Request $request)
    {
        $department=Department::all()->pluck('name');
        if(count($request->all()) == 0)
        {
            $versions=$this->versionService->getAllVersion();
            return view('version.version',['allVersion'=>$versions],compact('department'));
        }else
        {
            $allVersion=$this->versionService->searchVersions($request->get('name'));
            return view('version.version',compact('allVersion','department'));
        }

    }

    public function insert(Request $request)
    {

        $this->versionService->insert($request);
        return redirect('/versions')->with('message','Version has been created successfully');
    }
    public function edit($id)
    {
        $department=Department::all()->pluck('name');
        $version=$this->versionService->findVersion($id);
        return view('version.versionEdit',['singleVersion'=>$version],compact('department'));
    }
    public function update( Request $request)
    {
        $this->versionService->saveVersion($request);
        return redirect('/versions')->with('message','Version has been Updated successfully');
    }
    public function delete($id)
    {
        $this->versionService->delete($id);
        return redirect('/versions')->with('message','Version has been Deleted successfully');
    }

}
