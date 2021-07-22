<?php
namespace App\Repositories;
use App\Models\Version;
class VersionRepository
{
    // Get all Version
    public function getAllVersion(){
        return Version::orderBy('created_at')->get();
    }

    public function insert( $version)
    {
        return $version ->save();
    }

    public function findVersion($version)
    {
        return  Version::find($version);
    }

    public function delete($version)
    {
        Version::where('_id', $version)->first()->delete();
    }
}

