<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Announcement;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    public function __construct(){
        return $this->middleware('auth')->except('indexAnnouncement','showAnnouncement');
    } 

    public function createAnnouncement(){
        return view('announcement.create');
    }

    public function showAnnouncement(Announcement $announcement)
    {
        return view('announcement.show', compact('announcement'));
    }


    // public function indexAnnouncement(){
    //     $announcements = Announcement::all();
    //     return view('announcement.index', compact('announcements'));
    // }

    public function indexAnnouncement(){
        $announcements = Announcement::where('is_accepted', true)->orderBy('created_at','desc')->paginate(6);
        return view('announcement.index', compact('announcements'));
    }

    
    
}
