<?php

namespace App\Http\Controllers\API\v2;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use App\Models\FinancialIntelligentHub;
use App\Models\MarketOpportunity;
use Illuminate\Http\Request;

class GapProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function market()
    {
        $user = auth()->user();
        $published = MarketOpportunity::where('is_published', true)->limit(6)->get();

        return response()->json([
            'status' => true,
            'data' => $published,
            'message' => 'Market Opportunity list retrieved succesfully'
        ]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function financialHub(Request $request)
    {
        $user = auth()->user();

        $published = FinancialIntelligentHub::where('is_published', true)->limit(6)->get();

        return response()->json([
            'status' => true,
            'data' => $published,
            'message' => 'Financial Intelligent Hub list retrieved succesfully'
        ]);
    }

    public function blog(Request $request)
    {
        $query = BlogPost::published()
                    ->with(['category:id,name,slug'])
                    ->select('id', 'title', 'slug', 'excerpt', 'featured_image',  'author',
                            'published_at', 'category_id', 'views', 'is_featured');

        // Filter by category
        if ($request->filled('category')) {
            $query->whereHas('category', function($q) use ($request) {
                $q->where('slug', $request->category);
            });
        }

        // Search functionality
        if ($request->filled('search')) {
            $searchTerm = $request->search;
            $query->where(function($q) use ($searchTerm) {
                $q->where('title', 'like', '%' . $searchTerm . '%')
                  ->orWhere('excerpt', 'like', '%' . $searchTerm . '%')
                  ->orWhere('content', 'like', '%' . $searchTerm . '%')
                  ->orWhereHas('category', function($categoryQuery) use ($searchTerm) {
                      $categoryQuery->where('name', 'like', '%' . $searchTerm . '%');
                  });
            });
        }

        // Sorting
        $sortBy = $request->get('sort_by', 'published_at');
        $sortOrder = $request->get('sort_order', 'desc');
        
        if (in_array($sortBy, ['published_at', 'views', 'title'])) {
            $query->orderBy($sortBy, $sortOrder);
        } else {
            $query->latest('published_at');
        }

        // Featured posts first if requested
        if ($request->boolean('featured_first')) {
            $query->orderBy('is_featured', 'desc');
        }

        $perPage = $request->get('per_page', 15);
        $posts = $query->paginate($perPage);

        return response()->json([
            'success' => true,
            'data' => $posts->items(),
            'pagination' => [
                'current_page' => $posts->currentPage(),
                'last_page' => $posts->lastPage(),
                'per_page' => $posts->perPage(),
                'total' => $posts->total(),
                'from' => $posts->firstItem(),
                'to' => $posts->lastItem(),
            ]
        ]);
    }

    public function show($slug)
    {
        $post = BlogPost::published()
                   ->with([ 'category:id,name,slug'])
                   ->where('slug', $slug)
                   ->firstOrFail();

        // Increment views
        $post->incrementViews();

        return response()->json([
            'success' => true,
            'data' => $post
        ]);
    }

    public function related(BlogPost $post)
    {
        $related = BlogPost::published()
                      ->where('id', '!=', $post->id)
                      ->where(function($query) use ($post) {
                          $query->where('category_id', $post->category_id);
                      })
                      ->with(['category:id,name,slug'])
                      ->select('id', 'title', 'slug', 'excerpt', 'featured_image', 
                              'published_at', 'author', 'category_id', 'views')
                      ->latest('published_at')
                      ->limit(4)
                      ->get();

        return response()->json([
            'success' => true,
            'data' => $related
        ]);
    }

    public function search(Request $request)
    {
        $request->validate([
            'q' => 'required|string|min:2',
            'per_page' => 'integer|min:1|max:50'
        ]);

        $searchTerm = $request->q;
        $perPage = $request->get('per_page', 10);

        // Use Laravel Scout if configured, otherwise fallback to database search
        if (class_exists('\Laravel\Scout\Searchable')) {
            $posts = BlogPost::search($searchTerm)
                        ->where('status', 'published')
                        ->paginate($perPage);
        } else {
            $posts = BlogPost::published()
                        ->where(function($query) use ($searchTerm) {
                            $query->where('title', 'like', '%' . $searchTerm . '%')
                                  ->orWhere('excerpt', 'like', '%' . $searchTerm . '%')
                                  ->orWhere('content', 'like', '%' . $searchTerm . '%')
                                  ->orWhereHas('category', function($q) use ($searchTerm) {
                                      $q->where('name', 'like', '%' . $searchTerm . '%');
                                  });
                        })
                        ->with(['category:id,name,slug'])
                        ->latest('published_at')
                        ->paginate($perPage);
        }

        return response()->json([
            'success' => true,
            'data' => $posts->items(),
            'pagination' => [
                'current_page' => $posts->currentPage(),
                'last_page' => $posts->lastPage(),
                'per_page' => $posts->perPage(),
                'total' => $posts->total(),
            ],
            'search_term' => $searchTerm
        ]);
    }
}
