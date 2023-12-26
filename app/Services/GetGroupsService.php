<?php

namespace App\Services;

use App\Models\Group;
use App\Models\Subgroup;

class GetGroupsService
{
    public function run(): array
    {
        $groups = Group::with(['subgroups', 'supervisor'])->get();

        $response = [];
        /* @var Group $group */
        foreach ($groups as $group) {
            $subgroups = [];
            $group->subgroups->each(function (Subgroup $subgroup) use (&$subgroups){
                $subgroups[] = [
                    'id' => $subgroup->id,
                    'subgroup_value' => $subgroup->subgroup_value,
                ];
            });
            $response[] = [
                'id' => $group->id,
                'name' => $group->name,
                'supervisor' => "{$group->supervisor->first_name} {$group->supervisor->second_name}",
                'subgroups' => $subgroups,
            ];
        }

        return $response;
    }
}
