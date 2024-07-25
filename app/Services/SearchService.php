<?php
namespace App\Services;

use App\Models\City;
use App\Models\Company;
use App\Models\job_oppertunity;
use App\Models\JobOppertunity;
use App\Models\JobTitle;
use Illuminate\Support\Facades\DB; 

class SearchService
{
    public function search($request)
    {
        $search = $request->input('search');

        $job_oppertunities = job_oppertunity::where('opp_name', 'like', "%$search%")
            ->orWhereHas('company', function ($query) use ($search) {
                $query->where('name', 'like', "%$search%");
            })
            ->leftJoin('cities', 'cities.id', '=', 'job_oppertunities.city_id')
            ->leftJoin('job_titles', 'job_titles.id', '=', 'job_oppertunities.job_title_id') 
            ->leftJoin('job_levels', 'job_levels.id', '=', 'job_oppertunities.job_level_id') 
            ->leftJoin('companies', 'companies.id', '=', 'job_oppertunities.company_id')
            ->get([ 'opp_name', 'companies.name as company_name','cities.name as city_name','job_oppertunities.address' , 'job_titles.name as job_titles','job_levels.name as job_level']);
            // ->get();2

            return [ 'massage'=>'anything', 'data'=>$job_oppertunities];

        }
}
