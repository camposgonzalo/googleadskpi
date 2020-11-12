<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tables\Country;
use App\Models\Tables\Department;
use App\Models\Tables\District;
use App\Models\Tables\Province;

class TableController extends Controller
{
    public function locations()
    {
        // $departments = Department::where('active', true)->orderBy('description')->get();
        // $provinces = Province::where('active', true)->orderBy('description')->get();
        // $districts = District::where('active', true)->orderBy('description')->get();
        $locations = $this->getLocationCascade();

        return compact( 'locations');
    }

    public function getLocationCascade()
    {
        $locations = [];
        $countries = Country::where('active', true)->orderBy('description')->get();
        $departments = Department::where('active', true)->get();

        // foreach ($countries as $country)
        // {
            // $children_departments = [];
            // if ($country->id == 'PE') {
                foreach ($departments as $department)
                {
                    $children_provinces = [];
                    foreach ($department->provinces as $province)
                    {
                        $children_districts = [];
                        foreach ($province->districts as $district)
                        {
                            $children_districts[] = [
                                'value' => $district->id,
                                'label' => $district->description
                            ];
                        }
                        $children_provinces[] = [
                            'value' => $province->id,
                            'label' => $province->description,
                            'children' => $children_districts
                        ];
                    }
                    $locations[] = [
                        'value' => $department->id,
                        'label' => $department->description,
                        'children' => $children_provinces
                    ];
                }
            // }
            // $locations[] = [
            //     'value' => $country->id,
            //     'label' => $country->description,
            //     'children' => is_array($children_departments) ? $children_departments : ''
            // ];

        // }



        return $locations;
    }
}
