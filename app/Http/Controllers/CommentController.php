<?php

namespace App\Http\Controllers;

use App\Models\comments;
use App\Models\visits;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function showComments($id_visit,$id_patient)
    {
        $commentsData = comments::select('*')
            ->where([
                ['fk_visit','=',$id_visit],
            ])
            ->get();
        return view('comment', ['commentsData' => $commentsData]);
    }

    public function addComment($id_visit,$id_patient)
    {

        request()->validate([
            'textarea' => 'required|max:254',
        ]);

        $comment = new comments();
        $comment->message = request('textarea');
        $comment->fk_staff = session('id_user');
        $comment->fk_visit = $id_visit;
        $comment->fk_patient = $id_patient;
        $comment->save();
        return redirect('/analysis');
    }
}