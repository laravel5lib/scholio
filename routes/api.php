<?php

use App\Events\SchoolConfirmsUser;
use App\Events\UserAppliedOnSchool;
use App\Jobs\Algolia;
use App\Models\Card;
use App\Models\CategoryReview as Category;
use App\Models\Cvteacherstudy;
use App\Models\DummyScholarship;
use App\Models\Image;
use App\Models\Level;
use App\Models\Review;
use App\Models\Scholarship;
use App\Models\ScholarshipLimit;
use App\Models\School;
use App\Models\SchoolInterest;
use App\Models\Section;
use App\Models\Skill;
use App\Models\Study;
use App\Models\Tag;
use App\Models\Temp;
use App\Scholio\Scholio;
use App\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Route;

Scholio::bot();

// 'ApiController@'

Route::get('/school/profile/hashtag', 'ApiController@getSchoolProfileHastags')->middleware('auth:api');
Route::post('/school/profile/hashtag/save/{tag}', 'ApiController@saveSchoolProfileHastags')->middleware('auth:api');
Route::post('/school/profile/hashtag/delete/{tag}', 'ApiController@deleteSchoolProfileHastags')->middleware('auth:api');
Route::post('/school/profile/hashtag/new/{tag}', 'ApiController@addSchoolProfileHastag')->middleware('auth:api');
Route::post('/school/update/cards/swap/{from}/{to}', 'ApiController@swapSchoolCards')->middleware('auth:api');
Route::get('/school/getCards/{status}/{study}/{name}', 'ApiController@getSchoolCards')->middleware('auth:api');
Route::post('/school/update/card/{card}/{field}/{newValue}', 'ApiController@updateSchoolCard')->middleware('auth:api');
Route::post('/school/uploadImage', 'ApiController@uploadSchoolImage')->middleware('auth:api');
Route::post('/user/uploadAvatar', 'ApiController@uploadUserAvatar')->middleware('auth:api');
Route::post('/student/saveStudy', 'ApiController@saveStudentStudy')->middleware('auth:api');
Route::post('/student/removeStudy', 'ApiController@removeStudentStudy')->middleware('auth:api');
Route::get('/notifications/getSchoolLevelSections', 'ApiController@notificationGetSchoolLevelSections')->middleware('auth:api');
Route::get('/notifications/getSchoolLevelStudies', 'ApiController@notificationGetSchoolLevelStudies')->middleware('auth:api');
Route::get('/notifications/getSchoolLevelStudies/public/{school_id}', 'ApiController@notificationGetSchoolLevelStudiesFromSchool')->middleware('api');
Route::get('/notifications/getSchoolLevelSections/public/{school_id}', 'ApiController@notificationGetSchoolLevelSectionsFromSchool')->middleware('auth:api');

Route::get('/user', 'ApiController@users')->middleware('auth:api');
Route::get('/users/all', 'ApiController@usersAll')->middleware('auth:api');
Route::get('/notifications', 'ApiController@notifications')->middleware('auth:api');
Route::get('/notifications/requests', 'ApiController@notificationsRequest')->middleware('auth:api');
Route::post('/notifications/read/{id}', 'ApiController@notificationsRead')->middleware('auth:api');
Route::get('/notifications/all', 'ApiController@notificationsAll')->middleware('auth:api');
Route::get('/schools/all', 'ApiController@schoolsAll')->middleware('auth:api');
Route::get('/school/id/{id}', 'ApiController@schoolId')->middleware('auth:api');
Route::get('/financial/id/{id}', 'ApiController@financialId')->middleware('auth:api');
Route::get('/scholarships/all', 'ApiController@scholarshipsAll')->middleware('auth:api');
Route::get('/scholarship/{school}', 'ApiController@scholarship')->middleware('auth:api');
Route::get('/scholarship/requests', 'ApiController@scholarshipRequests')->middleware('auth:api');
Route::get('/schoolstudies', 'ApiController@studiesGET')->middleware('auth:api');
Route::post('/school/studies', 'ApiController@studiesPOST')->middleware('auth:api');
Route::get('/getSchoolStudies', 'ApiController@getStudies')->middleware('auth:api');
Route::get('/public/profile', 'ApiController@publicProfile')->middleware('auth:api');
Route::get('/school/{school}', 'ApiController@school')->middleware('api');
Route::get('/results/{type}', 'ApiController@results')->middleware('api');
Route::get('/profile/{school}', 'ApiController@schoolProfile')->middleware('api');
Route::get('/profile/auth/{school}', 'ApiController@schoolAuthProfile')->middleware('auth:api');
Route::post('/scholarship/save', 'ApiController@scholarshipSave')->middleware('auth:api');

Route::get('/scholarship/get/{scholarship}', 'ApiController@getScholarship')->middleware('api');
Route::post('/interested/save', 'ApiController@interestedSave')->middleware('auth:api');
Route::get('/interested/check', 'ApiController@interestedCheck')->middleware('auth:api');
Route::get('/school/types/all', 'ApiController@schoolTypes')->middleware('api');
Route::get('/socialLinks/get/{user}', 'ApiController@getSocialLinks')->middleware('api');

Route::post('/interest/school', function () {
    $user = User::where('email', request()->email)->get();
    $interest = new SchoolInterest;
    $interest->name = request()->name;
    $interest->email = request()->email;
    $interest->tel = request()->tel;
    $interest->study_id = request()->study_id;
    $interest->school_id = request()->school_id;
    $interest->student = request()->student == 'student' ? true : false;
    if (count($user) > 0) {
        $interest->user_id = $user->id;
    }
    $interest->save();
    return 'ok';

})->middleware('api');

Route::post('/school/scholarshipSave', function () {
    try {
        $scholarship = new Scholarship;
        $scholarship->school_id = auth()->user()->info->id;
        $scholarship->financial_id = request()->financial;
        $scholarship->financial_amount = request()->financial_amount;
        $scholarship->price = request()->price;
        $scholarship->title = request()->title;
        if (count(request()->studies) == 1) {
            $scholarship->study_id = request()->studies[0]['id'];
            $scholarship->multiple = 0;
        } else {
            $scholarship->study_id = 0;
            $scholarship->multiple = 1;
        }
        $scholarship->level_id = request()->level['id'];
        $scholarship->criteria_id = request()->criteria;
        $scholarship->terms = request()->terms;
        if (request()->exams == 1) {
            $scholarship->exam = true;
            $scholarship->exam_date = Carbon\Carbon::createFromFormat('d-m-Y', request()->exams_date);
        }
        $scholarship->end_at = Carbon\Carbon::createFromFormat('d-m-Y', request()->end_at);

        if (request()->allWinners) {
            $scholarship->winners = 0;
        } else {
            $scholarship->winners = request()->winners;
        }
        $scholarship->save();

        if ($scholarship->multiple) {
            foreach (request()->studies as $study) {
                $scholarship->multipleStudies()->attach($study['id']);
            }
        }

        // Add tags
        foreach (request()->tags as $tag) {
            if (!isset($tag['id'])) {
                $newTag = new Tag;
                $newTag->name = $tag['name'];
                $newTag->slag = $tag['name'];
                $newTag->save();
                $scholarship->tag()->attach($newTag);
            } else {
                $scholarship->tag()->attach(Tag::find($tag['id']));
            }
        }

        $data = ['message' => 'SAVED SUCCESSFULLY', 'url' => '/panel/school/scholarship/' . $scholarship->id];
        // Scholio::updateDummy($scholarship->school);
        Scholio::dummyScholarshipCreate($scholarship);
        dispatch(new Algolia($scholarship));
    } catch (\Exception $e) {
        $data = ['message' => 'ERROR ' . $e];
    }
    return $data;
})->middleware('auth:api');

Route::get('/getSchoolLevels', function () {
    $school = auth()->user()->info;
    $levels = [];

    foreach ($school->levels() as $l) {
        $level = Level::find($l);
        array_push($levels, ['id' => $level->id, 'name' => $level->name]);
    }
    return $levels;
})->middleware('auth:api');

Route::get('/school/getStudiesGroupedFromLevel/{level}', function ($level) {
    $school = auth()->user()->info;
    $data = [];
    $studies = [];

    foreach ($school->section($level) as $section) {
        $s = Section::find($section);
        foreach ($school->studyFromSection($section) as $study) {
            array_push($studies, ['name' => Study::find($study)->name, 'id' => Study::find($study)->id, 'section_id' => $s->id, 'icon' => $s->icon, 'section_name' => $s->name]);
        }

        array_push($data, ['section' => $s->name, 'study' => $studies]);
        $studies = [];
    }
    return $data;
})->middleware('auth:api');

Route::get('/schoolstudiesCount', function () {
    $school = auth()->user()->info;
    return count($school->study);
})->middleware('auth:api');

Route::get('/getScholarshipLimits', function () {
    $school = auth()->user()->info;
    $scholarshipLimits = ScholarshipLimit::where('school_id', $school->id)->first();
    return $scholarshipLimits;
})->middleware('auth:api');

Route::get('/school/getCheckedStudiesFromSection/{section}', function ($section) {
    $school = auth()->user()->info;
    $studies = [];

    foreach ($school->studyFromSection($section) as $study) {
        $s = Study::find($study);
        array_push($studies, ['id' => $s->id, 'name' => $s->name]);
    }

    return $studies;
})->middleware('auth:api');

Route::post('/school/deleteStudy', function () {
    $school = auth()->user()->info;
    $study = request()->study;

    if ($school->study->contains($study)) {
        $school->study()->detach($study);
    }

    return 'OK';
})->middleware('auth:api');

Route::post('/school/deleteAllStudies', function () {
    $school = auth()->user()->info;
    $school->study()->detach();

    return 'OK';
})->middleware('auth:api');

Route::post('/school/studySave', function () {
    $school = auth()->user()->info;
    $level = request()->level;
    $section = request()->section;
    $studies = request()->study;
    $level_id = $level['id'];
    $section_id = $section['id'];

    if ($level['id'] == 0 || Level::find($level['id'])->school_types_id != $school->type->id) {
        $newLevel = new Level;
        $newLevel->school_types_id = $school->type->id;
        $newLevel->name = $level['name'];
        $newLevel->save();
        $level_id = $newLevel->id;
    }

    if ($section['id'] == 0 || Section::find($section['id'])->level_id != $level_id) {
        $icon = null;
        if (count($s = Section::where('name', $section['name'])->get()) > 0) {
            $icon = $s[0]->icon;
        }
        $newSection = new Section;
        $newSection->level_id = $level_id;
        $newSection->name = $section['name'];
        if ($icon) {
            $newSection->icon = $icon;
        }
        $newSection->save();
        $section_id = $newSection->id;
    }

    foreach ($school->studyFromSection($section_id) as $sectionStudy) {
        $school->study()->detach($sectionStudy);
    }

    foreach ($studies as $study) {
        $study_id = $study['id'];
        if ($study['id'] == 0 || $section['id'] == 0) {
            $newStudy = new Study;
            $newStudy->name = $study['name'];
            $newStudy->save();
            $study_id = $newStudy->id;

            $cvteacherstudy = Cvteacherstudy::where('name', $newStudy->name)->first();

            if (!$cvteacherstudy) {
                $cvteacherstudy = new Cvteacherstudy;
                $cvteacherstudy->name = $newStudy->name;
                $cvteacherstudy->save();
            }
        }

        if (!Study::find($study_id)->section->contains(Section::find($section_id))) {
            Study::find($study_id)->section()->attach(Section::find($section_id));
        }

        Study::find($study_id)->school()->attach($school);
    }
    return 'OK';
})->middleware('auth:api');

Route::get('/school/getStudiesFromSection/{section}', function (Section $section) {
    $studies = $section->study;
    return $studies;
})->middleware('auth:api');

Route::get('/school/getSectionsFromLevel/{level}', function (Level $level) {
    $sections = $level->section;
    return $sections;
})->middleware('auth:api');

Route::get('/getSchoolLevelsWithRelations', function () {
    $school = auth()->user()->info;
    $result = [];

    foreach (Level::all() as $level) {
        if ($level->type->schools->contains($school)) {
            $data = [];
            foreach ($level->section as $section) {
                array_push($data, ['section_id' => $section->id, 'section_name' => $section->name, 'study' => $section->study]);
            }
            array_push($result, ['level_id' => $level->id, 'level_name' => $level->name, 'section' => $data]);
        }
    }

    return $result;
})->middleware('auth:api');

Route::get('/school/getScholarships/{order}/{asc}/{active}/{field}', function ($order, $asc, $active, $field) {
    $school = auth()->user()->info;
    $sort = 'asc';
    if ($asc == 'true') {
        $sort = 'desc';
    }

    $scholarships = DummyScholarship::where('school_id', $school->id)->where('active', $active)->orderBy($order, $sort)->get();

    $active = 0;
    foreach ($school->dummyScholarships as $scholar) {
        if ($scholar->active == 1) {
            $active++;
        }
    }

    $deactive = count($school->dummyScholarships) - $active;

    if ($field != '%20') {
        $scholarships = $scholarships->filter(function ($item) use ($field) {
            $replacement = preg_replace('/ά/iu', '${1}α', $item->level_name);
            $replacement = preg_replace('/έ/iu', '${1}ε', $replacement);
            $replacement = preg_replace('/ή/iu', '${1}η', $replacement);
            $replacement = preg_replace('/ί/iu', '${1}ι', $replacement);
            $replacement = preg_replace('/ό/iu', '${1}ο', $replacement);
            $replacement = preg_replace('/ύ/iu', '${1}υ', $replacement);
            $replacement = preg_replace('/ώ/iu', '${1}ω', $replacement);

            $replacement2 = preg_replace('/ά/iu', '${1}α', $item->study_name);
            $replacement2 = preg_replace('/έ/iu', '${1}ε', $replacement2);
            $replacement2 = preg_replace('/ή/iu', '${1}η', $replacement2);
            $replacement2 = preg_replace('/ί/iu', '${1}ι', $replacement2);
            $replacement2 = preg_replace('/ό/iu', '${1}ο', $replacement2);
            $replacement2 = preg_replace('/ύ/iu', '${1}υ', $replacement2);
            $replacement2 = preg_replace('/ώ/iu', '${1}ω', $replacement2);

            $replacement3 = preg_replace('/ά/iu', '${1}α', $item->criteria_name);
            $replacement3 = preg_replace('/έ/iu', '${1}ε', $replacement3);
            $replacement3 = preg_replace('/ή/iu', '${1}η', $replacement3);
            $replacement3 = preg_replace('/ί/iu', '${1}ι', $replacement3);
            $replacement3 = preg_replace('/ό/iu', '${1}ο', $replacement3);
            $replacement3 = preg_replace('/ύ/iu', '${1}υ', $replacement3);
            $replacement3 = preg_replace('/ώ/iu', '${1}ω', $replacement3);

            $replacement4 = preg_replace('/ά/iu', '${1}α', $item->financial_plan);
            $replacement4 = preg_replace('/έ/iu', '${1}ε', $replacement4);
            $replacement4 = preg_replace('/ή/iu', '${1}η', $replacement4);
            $replacement4 = preg_replace('/ί/iu', '${1}ι', $replacement4);
            $replacement4 = preg_replace('/ό/iu', '${1}ο', $replacement4);
            $replacement4 = preg_replace('/ύ/iu', '${1}υ', $replacement4);
            $replacement4 = preg_replace('/ώ/iu', '${1}ω', $replacement4);

            if (preg_match('/' . $field . '/iu', $replacement) || preg_match('/' . $field . '/iu', $replacement2) || preg_match('/' . $field . '/iu', $replacement3) || preg_match('/' . $field . '/iu', $replacement4) || preg_match('/' . $field . '/iu', $item->financial_plan) || preg_match('/' . $field . '/iu', $item->level_name) || preg_match('/' . $field . '/iu', $item->criteria_name) || preg_match('/' . $field . '/iu', $item->study_name)) {
                return $item;
            }
        });
    }

    $perPage = config('scholio.perPage.scholarships');
    $items = $scholarships;
    $page = $page ?? (Paginator::resolveCurrentPage() ?? 1);
    $items = $items instanceof Collection ? $items : Collection::make($items);

    $paginatedData = [];
    foreach ($items->forPage($page, $perPage) as $key => $value) {
        $paginatedData[] = $value;
    }

    $result = new LengthAwarePaginator($paginatedData, $items->count(), $perPage, $page, []);
    $custom = collect(['active' => $active, 'deactive' => $deactive, 'school_type' => $school->type->id]);
    $data = $custom->merge($result);
    return $data;
})->middleware('auth:api');

Route::get('/school/getAvgReviews/{role}/{status}', function ($role, $status) {
    if ($role == 'all') {
        $role = null;
    }
    if ($status == 'all') {
        $status = null;
    }

    $school = auth()->user()->info;
    $data['stars'] = $school->averageStars($role, $status);
    $data['avgReviews'] = $school->averageReviews($role, $status);
    return $data;
})->middleware('auth:api');

Route::get('/school/getReviews/{role}/{status}/{stars}', function ($role, $status, $stars) {
    $school = auth()->user()->info;
    $reviews = $school->reviews()->with('user', 'category.category')->get();

    $totalAllumni = 0;
    $totalConnected = 0;
    $connectedParents = 0;
    $allumniParents = 0;
    $ratingStars = $school->ratingStars();

    foreach ($reviews as $review) {
        $user = $review->user;
        $connected = $school->connected;
        $allumni = $school->allumni;
        $conParent = $school->connectedParents;
        $alParent = $school->allumniParents;

        if ($connected->contains($user)) {
            $totalConnected++;
        } elseif ($allumni->contains($user)) {
            $totalAllumni++;
        }
        if ($conParent->contains($user)) {
            $connectedParents++;
        } elseif ($alParent->contains($user)) {
            $allumniParents++;
        }
    }

    if ($stars != -1) {
        $reviews = $school->reviewsFilteredByRating($stars);
    } else {
        if ($status != 'all' || $role !== 'all') {
            if ($role == 'student') {
                $connected = $school->$status;
            } else {
                if ($status == 'connected') {
                    $connected = $school->connectedParents;
                } else {
                    $connected = $school->allumniParents;
                }
            }

            $reviews = $reviews->filter(function ($item) use ($connected, $role, $status) {
                $bool = $status == 'all' ? true : $connected->contains($item->user);
                if ($item->user->role == $role && $bool) {
                    return $item;
                }
            });
        }
    }

    $perPage = config('scholio.perPage.reviews');
    $items = $reviews;
    $page = $page ?? (Paginator::resolveCurrentPage() ?? 1);
    $items = $items instanceof Collection ? $items : Collection::make($items);

    $paginatedData = [];
    foreach ($items->forPage($page, $perPage) as $key => $value) {
        $paginatedData[] = $value;
    }

    $result = new LengthAwarePaginator($paginatedData, $items->count(), $perPage, $page, []);
    $custom = collect(['connectedStudents' => $totalConnected, 'allumniStudents' => $totalAllumni, 'connectedParents' => $connectedParents, 'allumniParents' => $allumniParents, 'ratingStars' => $ratingStars]);
    $data = $custom->merge($result);
    return $data;
})->middleware('auth:api');

Route::get('/getScholarshipFullAdmissions', function () {
    $arr = [];
    $school = auth()->user()->info;
    foreach ($school->admissions() as $admission) {
        array_push($arr, [
            'user' => $admission->user,
            'student' => $admission->user->info,
            'scholarship' => $admission->scholarship->study->name ?? 'Multiple',
            'tooltip' => $admission->scholarship->multipleStudies,
            'scholarship_id' => $admission->scholarship->id,
            'criteria' => $admission->scholarship->criteria->icon,
            'id' => $admission->id,
        ]);
    }
    return $arr;
})->middleware('auth:api');

Route::post('/request/school', function () {
    if (auth()->user()->role != 'school') {
        $school = App\Models\School::find(request()->school);
        auth()->user()->apply()->toggle(request()->school);

        if (auth()->user()->role == 'student') {
            event(new UserAppliedOnSchool(auth()->user(), User::find($school->user_id), Study::find(request()->study), request()->status));
        } else {
            event(new UserAppliedOnSchool(auth()->user(), User::find($school->user_id), request()->study, request()->status));
        }

        return 'OK';
    }

    return 'Error';
})->middleware('auth:api');

Route::post('/connection/{id}/{type}/{status}/{card}/confirm', function ($id, $type, $status, $card) {

    $user = User::find($id);
    $school = auth()->user()->info;
    event(new SchoolConfirmsUser($school, $user, $card, $type, $status));

    // $user->notify(new SchoolAcceptedUser($user, auth()->user()));

    return 'Accepted';
})->middleware('auth:api');

Route::post('/connection/{id}/deny', function ($id) {
    foreach (auth()->user()->unreadNotifications as $notification) {
        if ($notification->id == $id) {
            $user = User::find(request()->user);
            $school_user = User::find($notification->notifiable_id);

            $user->apply()->toggle($school_user->info->id);
            $notification->delete();
        }
    }
    return 'Denied';
})->middleware('auth:api');

Route::post('/skills/set', function () {
    $user = User::find(request()->user);
    $skill = Skill::find(request()->skill);

    $end = $user->toggleEndorsement($skill);
    return $end;
})->middleware('auth:api');

Route::get('/skill/check', function () {
    $user = User::find(request()->user);
    $skill = Skill::find(request()->skill);

    $end = $user->checkSkill($skill);
    return $end;
})->middleware('auth:api');

Route::get('/student/mySchools', function () {
    $schools = auth()->user()->connectedSchool;
    return $schools->load('admin.subscription');
})->middleware('auth:api');

Route::get('/scholarship/{id}', function (Scholarship $id) {
    $scholarship->criteriaName = $scholarship->criteria->name;
    return $scholarship->load('school', 'level', 'financial', 'criteria');
})->middleware('api');

Route::get('/connected/students/card/search/{order}/{asc}/{status}/{field}', function ($order, $asc, $status, $field) {
    $user = auth()->user();
    $school = $user->info;

    $orderType = $asc == 'false' ? 'asc' : 'desc';
    $students = Card::where('user_id', auth()->user()->id)->where('status', $status)->orderBy($order, $orderType)->get();

    $studentCounter = 0;

    if ($field != '%20') {
        $students = $students->filter(function ($item) use ($field) {
            $replacement = preg_replace('/ά/iu', '${1}α', $item->name);
            $replacement = preg_replace('/έ/iu', '${1}ε', $replacement);
            $replacement = preg_replace('/ή/iu', '${1}η', $replacement);
            $replacement = preg_replace('/ί/iu', '${1}ι', $replacement);
            $replacement = preg_replace('/ό/iu', '${1}ο', $replacement);
            $replacement = preg_replace('/ύ/iu', '${1}υ', $replacement);
            $replacement = preg_replace('/ώ/iu', '${1}ω', $replacement);

            $active1 = $item->type;
            $active2 = $item->type2;
            $active1Level = $item->level;
            $active2Level = $item->level2;

            $dummy = $active1 . ',' . $active2 . ',' . $active1Level . ',' . $active2Level;

            $replacement2 = preg_replace('/ά/iu', '${1}α', $dummy);
            $replacement2 = preg_replace('/έ/iu', '${1}ε', $replacement2);
            $replacement2 = preg_replace('/ή/iu', '${1}η', $replacement2);
            $replacement2 = preg_replace('/ί/iu', '${1}ι', $replacement2);
            $replacement2 = preg_replace('/ό/iu', '${1}ο', $replacement2);
            $replacement2 = preg_replace('/ύ/iu', '${1}υ', $replacement2);
            $replacement2 = preg_replace('/ώ/iu', '${1}ω', $replacement2);

            if (preg_match('/' . $field . '/iu', $replacement) || preg_match('/' . $field . '/iu', $item->school_number) || preg_match('/' . $field . '/iu', $item->name) ||
                preg_match('/' . $field . '/i', $item->email) || preg_match('/' . $field . '/i', $item->student_phone) ||
                preg_match('/' . $field . '/iu', $replacement2) || preg_match('/' . $field . '/iu', $dummy)) {
                return $item;
            }
        });
    }

    $items = $students;
    $studentCounter = count($students);

    $perPage = config('scholio.perPage.students');

    $page = $page ?? (Paginator::resolveCurrentPage() ?? 1);
    $items = $items instanceof Collection ? $items : Collection::make($items);
    $p = new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, []);
    $custom = collect(['allumniStudents' => auth()->user()->card->where('status', 'allumni')->count(), 'connectedStudents' => auth()->user()->card->where('status', 'connected')->count(), 'studentCounter' => $studentCounter]);
    $data = $custom->merge($p);
    return $data;

})->middleware('auth:api');

Route::get('/connected/students/search/{order}/{asc}/{status}/{field}', function ($order, $asc, $status, $field) {
    $user = auth()->user();
    $school = $user->info;
    $students = $school->$status;

    $orderType = $asc == 'false' ? 'asc' : 'desc';

    $students = $school->$status()->orderBy($order, $orderType)->with('cv', 'student')->get();

    $studentCounter = 0;

    if ($field != '%20') {
        $students = $students->filter(function ($item) use ($field) {
            $replacement = preg_replace('/ά/iu', '${1}α', $item->name);
            $replacement = preg_replace('/έ/iu', '${1}ε', $replacement);
            $replacement = preg_replace('/ή/iu', '${1}η', $replacement);
            $replacement = preg_replace('/ί/iu', '${1}ι', $replacement);
            $replacement = preg_replace('/ό/iu', '${1}ο', $replacement);
            $replacement = preg_replace('/ύ/iu', '${1}υ', $replacement);
            $replacement = preg_replace('/ώ/iu', '${1}ω', $replacement);

            $active1 = $item->connectedSchool->where('id', auth()->user()->info->id)->first()->pivot->type;
            $active2 = $item->connectedSchool->where('id', auth()->user()->info->id)->first()->pivot->type2;
            $active1Level = $item->connectedSchool->where('id', auth()->user()->info->id)->first()->pivot->level;
            $active2Level = $item->connectedSchool->where('id', auth()->user()->info->id)->first()->pivot->level2;

            $dummy = $active1 . ',' . $active2 . ',' . $active1Level . ',' . $active2Level;

            // foreach($item->studyConnection()->wherePivot('school_id', auth()->user()->info->id)->get() as $std){
            //     $section = $std->section[0];
            //     $level = $section->level;
            //     $dummy .= $std->name . ',' . $section->name . ',' . $level->name . ',';
            // }

            $replacement2 = preg_replace('/ά/iu', '${1}α', $dummy);
            $replacement2 = preg_replace('/έ/iu', '${1}ε', $replacement2);
            $replacement2 = preg_replace('/ή/iu', '${1}η', $replacement2);
            $replacement2 = preg_replace('/ί/iu', '${1}ι', $replacement2);
            $replacement2 = preg_replace('/ό/iu', '${1}ο', $replacement2);
            $replacement2 = preg_replace('/ύ/iu', '${1}υ', $replacement2);
            $replacement2 = preg_replace('/ώ/iu', '${1}ω', $replacement2);

            if (preg_match('/' . $field . '/iu', $replacement) || preg_match('/' . $field . '/iu', $item->name) ||
                preg_match('/' . $field . '/i', $item->email) || preg_match('/' . $field . '/i', $item->cv->student_phone) ||
                preg_match('/' . $field . '/iu', $replacement2) || preg_match('/' . $field . '/iu', $dummy)) {
                return $item;
            }
        });
    }

    $items = $students;
    $studentCounter = count($students);

    $perPage = config('scholio.perPage.students');

    $page = $page ?? (Paginator::resolveCurrentPage() ?? 1);
    $items = $items instanceof Collection ? $items : Collection::make($items);
    $p = new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, []);
    $custom = collect(['allumniStudents' => $school->allumni()->count(), 'connectedStudents' => $school->connected()->count(), 'studentCounter' => $studentCounter]);
    $data = $custom->merge($p);
    return $data;
})->middleware('auth:api');

Route::get('/connected/teachers/search/{order}/{asc}/{status}/{field}', function ($order, $asc, $status, $field) {
    $user = auth()->user();
    $school = $user->info;
    $teachers = $school->$status();

    $orderType = $asc == 'false' ? 'asc' : 'desc';

    $teachers = $school->$status()->orderBy($order, $orderType)->with('teacher')->get();

    if ($field != '%20') {
        $teachers = $teachers->filter(function ($item) use ($field) {
            $replacement = preg_replace('/ά/iu', '${1}α', $item->name);
            $replacement = preg_replace('/έ/iu', '${1}ε', $replacement);
            $replacement = preg_replace('/ή/iu', '${1}η', $replacement);
            $replacement = preg_replace('/ί/iu', '${1}ι', $replacement);
            $replacement = preg_replace('/ό/iu', '${1}ο', $replacement);
            $replacement = preg_replace('/ύ/iu', '${1}υ', $replacement);
            $replacement = preg_replace('/ώ/iu', '${1}ω', $replacement);

            $study = $item->connectedSchool->where('id', auth()->user()->info->id)->first()->pivot->type;

            $replacement2 = preg_replace('/ά/iu', '${1}α', $study);
            $replacement2 = preg_replace('/έ/iu', '${1}ε', $replacement2);
            $replacement2 = preg_replace('/ή/iu', '${1}η', $replacement2);
            $replacement2 = preg_replace('/ί/iu', '${1}ι', $replacement2);
            $replacement2 = preg_replace('/ό/iu', '${1}ο', $replacement2);
            $replacement2 = preg_replace('/ύ/iu', '${1}υ', $replacement2);
            $replacement2 = preg_replace('/ώ/iu', '${1}ω', $replacement2);

            if (preg_match('/' . $field . '/iu', $replacement) || preg_match('/' . $field . '/iu', $item->name) ||
                preg_match('/' . $field . '/i', $item->email) || preg_match('/' . $field . '/iu', $replacement2) || preg_match('/' . $field . '/iu', $study)) {
                return $item;
            }
        });
    }

    $items = $teachers;

    $perPage = config('scholio.perPage.teachers');

    $page = $page ?? (Paginator::resolveCurrentPage() ?? 1);
    $items = $items instanceof Collection ? $items : Collection::make($items);
    $p = new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, []);
    $custom = collect(['allumniTeachers' => $school->allumniTeachers()->count(), 'connectedTeachers' => $school->connectedTeachers()->count()]);
    $data = $custom->merge($p);
    return $data;
})->middleware('auth:api');

Route::post('/registration/social', function () {
    $temp = Temp::firstOrNew(['name' => 'social-role']);
    $temp->value = request()->role;
    $temp->save();

    // $temp = new Temp;
    // $temp->name = 'social-role';
    // $temp->value = request()->role;
    // $temp->save();
    return 'Stored!';
})->middleware('api');

Route::get('/terms/last', function () {
    $school = auth()->user();
    $scholarship = Scholarship::where('school_id', $school->id)->get();
    if ($scholarship->last()->terms != null) {
        return $scholarship->last()->terms;
    }
    return 'NO';
})->middleware('auth:api');

Route::post('/image/background/save', function () {
    $school = auth()->user()->info;
    $school->background = request()->image;
    $school->save();
    dispatch(new Algolia($school));
    return 'OK';
})->middleware('auth:api');

Route::post('/school/settings', function () {
    $school = auth()->user()->info;
    $settings = $school->settings;
    $settings->{request()->name} = request()->section;
    $settings->save();
    return 'OK';
})->middleware('auth:api');

Route::get('/algolia/results', function () {
    return session()->pull('schools', 'oxi');
})->middleware('api');

Route::get('/user/reviews/', function () {
    return auth()->user()->reviews;
})->middleware('auth:api');

Route::get('/categories/{school}', function (School $school) {
    return $school->categories();
})->middleware('auth:api');

Route::post('/review/{school}/save', function (School $school) {
    $total = 0;
    $count = 0;
    try {
        $newReview = new Review;
        $newReview->user_id = auth()->user()->id;
        $newReview->school_id = $school->id;
        $newReview->text = request()->text;
        $newReview->save();
        foreach (request()->review as $review) {
            $r = new Category;
            $r->review_id = $newReview->id;
            $r->category_id = $review['category'];
            $r->stars = $review['stars'];
            $total += $review['stars'];
            $r->save();
            $count++;
        }
        $newReview->average = $total / $count;
        $newReview->save();
    } catch (\Exception $e) {
        return $total / $count;
    }

    // Scholio::updateDummy($school);
    return 'OK';
})->middleware('auth:api');

Route::get('/review/{school}', function (School $school) {
    return $school->averageReviews();
})->middleware('auth:api');

Route::post('/setRoleType', function () {
    $id = request()->role;
    if ($id == 1) {
        session()->put('tttt', 'student');
    }

    if ($id == 2) {
        session()->put('tttt', 'parent');
    }

    if ($id == 3) {
        session()->put('tttt', 'teacher');
    }

    return session()->get('tttt');
});

Route::get('status/{user}/{id}', function ($user, $id) {
    if ($user == 'teacher') {
        $teacher = Teacher::find($id);
        return $teacher->status;
    }

    if ($user == 'parent') {
        $parent = Guardian::find($id);
        return $parent->status;
    }

    if ($user == 'student') {
        $student = Student::find($id);
        return $student->status;
    }
});

Route::get('/searchTag', function () {
    $search = request('tags');
    return Tag::where('name', 'LIKE', "$search%")->take(3)->pluck('slag');
});

Route::post('/school/changeStudentStatus/{id}/{status}', function ($id, $status) {
    $school = auth()->user()->info;
    $card = Card::find($id);
    if ($card->role == 'student' && $card->student_id) {
        $line = $school->students->where('id', $card->student_id)->first();
        $line->pivot->status = $status;
        $line->pivot->save();
    }

    $card->status = $status;
    $card->save();

    return 'ok';
})->middleware('auth:api');

Route::post('/school/changeTeacherStatus/{id}/{status}', function ($id, $status) {
    $school = auth()->user()->info;
    $line = $school->teachers->where('id', $id)->first();
    $line->pivot->status = $status;
    $line->pivot->save();
    return 'ok';
})->middleware('auth:api');

Route::get('/hashtag/all', function () {
    $tags = Tag::all();
    return $tags;
})->middleware('auth:api');

Route::post('/hashtag/{tag}/add', function ($tag) {
})->middleware('auth:api');

Route::get('/getSchoolCurrentStudies', function () {
    $school = auth()->user()->info;
    $studies = [];
    $data = [];
    $sections = [];

    $schoolLevels = $school->levels();

    foreach ($schoolLevels as $level) {
        foreach ($school->section($level) as $section) {
            foreach ($school->studyFromSection($section) as $study) {
                array_push($studies, ['study' => Study::find($study)->load('user'), 'link'=>$school->study()->where('study_id', $study)->first()->pivot->url]);
            }

            array_push($sections, ['section' => Section::find($section), 'studies' => $studies]);
            $studies = [];
        }
        array_push($data, ['level' => Level::find($level), 'sections' => $sections]);
        $sections = [];
    }

    return $data;
})->middleware('auth:api');

// Route::post('/saveStudyLink', function () {

//     $message = 'OK';
//     try {
//         $link = request('link');
//         $study = request('study');
//         $school = auth()->user()->info;

//         $school->study()->where('study_id', $study->id)->detach();

//         $school->study()->attach($study, ['url' => $link]);
//     } catch (\Exception $e) {
//         $message = $e;
//     }

//     return $message;
// })->middleware('auth:api');
