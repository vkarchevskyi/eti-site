<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Actions\Lessons\CreateLesson;
use App\Actions\Lessons\GetGroupLessons;
use App\Models\Course;
use App\Models\Group;
use App\Models\Lesson;
use App\Models\Subgroup;
use App\Models\Teacher;
use App\Models\TypeOfLesson;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\View\View;

class LessonsController extends Controller
{
    public function index()
    {
        return null;
    }
}
