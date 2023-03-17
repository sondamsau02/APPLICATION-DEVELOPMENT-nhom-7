<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Topics;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

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
}
