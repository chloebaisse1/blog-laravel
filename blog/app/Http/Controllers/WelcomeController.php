<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Controllers\Controller;
use Inertia\Inertia;
use Inertia\Response;

class WelcomeController extends Controller
{
    public function index(): Response
    {
        $posts = Post::with('author')->latest()->get();

        return Inertia::render('Welcome',[
            'posts' => $posts,
            'canRegister' => config('services.registration.enabled', true)
        ]);
    }
}
