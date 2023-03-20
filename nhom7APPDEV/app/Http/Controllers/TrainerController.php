<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Topics;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
class TrainerController extends Controller
{
    //
    public function Trainerindex() {
        return view('Trainer.Page.indexTrainer');
    }

    public function Profileindex() {
        $account=Auth::user();
        return view('Trainer.Page.Profile.profileAccount', compact('account'));
    }
    public function getUpdateProfile() {
        $account=Auth::user();
        return view('Trainer.Page.Profile.updateAccount', compact('account'));
    }
    public function postUpdateProfile(Request $request) {
        $user = Auth::user();

        $user->update([
            'name' => $request->input('name'),
            'type' => $request->input('type'),
            'department' => $request->input('department'),
            'phone' => $request->input('phone'),
            'email' => $request->input('email'),
        ]);

        return redirect()->route('trainer.profile')->with('success', 'Profile updated successfully!');
    }

    public function Topicindex() {
        $user = Auth::user(); // Assuming the user is logged in
        $trainerTopics = DB::table('trainer_topics')
        ->join('users', 'trainer_topics.user_id', '=', 'users.id')
        ->join('topics', 'trainer_topics.topic_id', '=', 'topics.id')
        ->select(
            'trainer_topics.id', 
            'trainer_topics.user_id', 
            'users.name as trainer_name', 
            'trainer_topics.topic_id', 
            'topics.name as topic_name',
            'topics.description'
        )
        ->where('user_id', $user->id)->get();
        return view('Trainer.Page.Topic.listTopic', compact('trainerTopics'));
    }

}
