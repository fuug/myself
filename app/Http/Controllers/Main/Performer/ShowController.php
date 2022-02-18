<?php

namespace App\Http\Controllers\Main\Performer;

use App\Http\Controllers\Controller;
use App\Http\Requests\Main\FilterRequest;
use App\Models\Category;
use App\Models\Review;
use App\Models\User;
use App\Service\ListUrgencyService;

class ShowController extends Controller
{
    public function __invoke(User $performer)
    {
        $experience = $performer->performerDescription->experience;
        switch ($experience){
            case 1:
                $experience_str = $experience . ' год';
                break;
            case 2 && 3 && 4:
                $experience_str = $experience . ' года';
                break;
            default:
                $experience_str = $experience . ' лет';

        }
        $reviews = $performer->performer_reviews;
        $directionsArr = explode(';' ,$performer->performerDescription->activities);
        return view('main.performer.performerAbout', compact('performer','reviews', 'experience_str', 'directionsArr'));
    }

}
