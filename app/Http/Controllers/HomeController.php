<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Review;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Review $review)
    {
        $this->middleware('auth');
        $this->review = $review;
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
        return view('detail', compact('review'));
    }
    public function create()
    {
        return view('create');
    }
    public function add(Request $request)
    {
        $review = new Review();
        $user_id = Auth::id();
        $input_arr = $request->input();
        $input_arr['user_id'] = $user_id;
        $review->create($input_arr);
        return redirect('/home');
    }

    public function comment($id) {
        // return redirect('/home');
        // $review = Review::find($id);
        // $review = Review::select('review.*', 'users.name AS user_name')
        //                 ->leftjoin('users', 'review.user_id', '=', 'users.id')->first($id);
        $review = $this->review->getJoinedUserFirst($id);
        return view('comment', compact('review'));
    }
}
