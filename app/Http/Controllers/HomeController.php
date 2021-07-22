<?php

namespace App\Http\Controllers;
use App\Services\VersionService;

class HomeController extends Controller
{
    private $versionService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(VersionService $versionService)
    {
        $this->versionService = $versionService;
    }
    public function index()
    {
        $versions=$this->versionService->getAllVersion();
        return view('release',['allVersion'=>$versions]);
    }
    public function get()
    {
        $versions=$this->versionService->getAllVersion();
        return view('home',['allVersion'=>$versions]);
    }
    public function detail($id)
    {
        $versions=$this->versionService->findVersion($id);
        return view('detail',['singleVersion'=>$versions]);
    }
}
