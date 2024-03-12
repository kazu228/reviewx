<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Comments;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Review $review, Comments $commets)
    {
        $this->middleware('auth');
        $this->review = $review;
        $this->comments = $commets;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $reviews = Review::select('review.*', 'users.name AS user_name')
        //                     ->leftjoin('users', 'review.user_id', '=', 'users.id')->get();
        $reviews = $this->review->getJoinedUsers();
        return view('home', compact('reviews'));
    }

    public function detail($id)
    {
        // $review = Review::select('review.*', 'users.name AS user_name')
        //                     ->leftjoin('users', 'review.user_id', '=', 'users.id')->first($id);
        $review = $this->review->getJoinedUserFirst($id);
        $file_name = $review->file_name;
        $path = storage_path('app');
        $program = file_get_contents($path.'\/'.$file_name);

        $comments = $this->comments->getCommentByReviewId($review->id);
        return view('detail', compact('review', 'program', 'comments'));
    }
    public function create()
    {
        return view('create');
    }
    public function add(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'contents' => 'required',
            'sentences' => 'required',],
            [
                'title.required' => 'タイトルは必須です。',
                'contents.required' => 'プログラムファイルは必須項目です。', 
                'sentences.required' => '説明分は必須項目です。'
            ]
        );
            
        $review = new Review();
        $user_id = Auth::id();

        $file_name = $request->file('contents')->getClientOriginalName();
        // ファイルアップロード
        $request->file('contents')->storeAs('', $file_name);
        

        $input_arr = $request->input();
        $input_arr['user_id'] = $user_id;
        $input_arr['file_name'] = $file_name;
        $review->create($input_arr);
        return redirect('/home');
    }

    public function comment($id) {
        // return redirect('/home');
        // $review = Review::find($id);
        // $review = Review::select('review.*', 'users.name AS user_name')
        //                 ->leftjoin('users', 'review.user_id', '=', 'users.id')->first($id);
        $review = $this->review->getJoinedUserFirst($id);
        $review_id = $id;

        $path = storage_path('app');
        $program = file_get_contents($path.'\/'.$review->file_name);

        return view('comment', compact('review', 'review_id', 'program'));
    }
}
