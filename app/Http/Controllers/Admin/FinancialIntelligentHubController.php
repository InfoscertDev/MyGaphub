<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FinancialIntelligentHub;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FinancialIntelligentHubController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     /**
     * Display a listing of the videos.
     */
    public function index()
    {
        $videos = FinancialIntelligentHub::orderBy('display_order')->get();
        $publishedCount = FinancialIntelligentHub::where('is_published', true)->count();
        $youtubePlaylistLink = config('app.youtube_playlist_link', 'https://www.youtube.com/playlist?list=YOUR_PLAYLIST_ID');

        return view('admin.financial-hub.index', compact('videos', 'publishedCount', 'youtubePlaylistLink'));
    }

    /**
     * Show the form for creating a new video.
     */
    public function create()
    {
        $categories = [
            'Financial Tips',
            'Investment Strategies',
            'Market Analysis',
            'Wealth Management',
            'Retirement Planning',
            'Tax Planning',
            'Credit Scores',
            'Banking Tips'
        ];

        return view('admin.financial-hub.create', compact('categories'));
    }

    /**
     * Store a newly created video in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'banner_image' => 'required|image|mimes:jpeg,png,jpg|dimensions:width=253,height=142',
            'video_link' => 'required|url',
            'is_published' => 'boolean',
        ]);

        // Handle image upload
        if ($request->hasFile('banner_image')) {
            $image = $request->file('banner_image');

            // Process image with Intervention Image
            // $processedImage = Image::make($image)
            //     ->resize(253, 142)
            //     ->encode('jpg', 90);

            $filename = 'financial-hub-' . time() . '.jpg';
            $path = $request->file('banner_image')->storeAs('product/videos', $filename, 'public');
            $validated['banner_image'] = $path;
        }

        // Handle the maximum number of published videos
        if (isset($validated['is_published']) && $validated['is_published']) {
            $publishedCount = FinancialIntelligentHub::where('is_published', true)->count();

            if ($publishedCount >= 8) {
                return redirect()->back()->with('error', 'Maximum of 8 published video banners allowed. Please unpublish an existing video first.');
            }
        }

        // Set display order for new items
        $maxOrder = FinancialIntelligentHub::max('display_order') ?? 0;
        $validated['display_order'] = $maxOrder + 1;

        FinancialIntelligentHub::create($validated);

        return redirect()->route('financial-hub.index')
            ->with('success', 'Video banner created successfully.');
    }

    /**
     * Display the specified video.
     */
    public function show(FinancialIntelligentHub $video)
    {
        return view('admin.financial-hub.show', compact('video'));
    }

    /**
     * Show the form for editing the specified video.
     */
    public function edit(FinancialIntelligentHub $video)
    {
        $categories = [
            'Financial Tips',
            'Investment Strategies',
            'Market Analysis',
            'Wealth Management',
            'Retirement Planning',
            'Tax Planning',
            'Credit Scores',
            'Banking Tips'
        ];

        return view('admin.financial-hub.edit', compact('video', 'categories'));
    }

    /**
     * Update the specified video in storage.
     */
    public function update(Request $request, FinancialIntelligentHub $video)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'banner_image' => 'nullable|image|mimes:jpeg,png,jpg|dimensions:width=253,height=142',
            'video_link' => 'required|url',
            'is_published' => 'boolean',
            'display_order' => 'nullable|integer'
        ]);

        // If is_published is not in the request, set it to false
        if (!isset($validated['is_published'])) {
            $validated['is_published'] = false;
        }

        // Handle the minimum and maximum number of published videos
        if ($video->is_published != $validated['is_published']) {
            $publishedCount = FinancialIntelligentHub::where('is_published', true)->count();

            if ($validated['is_published'] && $publishedCount >= 8) {
                return redirect()->back()->with('error', 'Maximum of 8 published video banners allowed. Please unpublish an existing banner first.');
            }

            if (!$validated['is_published'] && $publishedCount <= 4) {
                return redirect()->back()->with('error', 'Minimum of 4 published video banners required. Please publish another banner first.');
            }
        }

        // Handle image upload
        if ($request->hasFile('banner_image')) {
            // Delete old image
            if ($video->banner_image && Storage::disk('public')->exists($video->banner_image)) {
                Storage::disk('public')->delete($video->banner_image);
            }

            $image = $request->file('banner_image');

            // Process image with Intervention Image
            // $processedImage = Image::make($image)
            //     ->resize(253, 142)
            //     ->encode('jpg', 90);

            $filename = 'financial-hub-' . time() . '.jpg';
            $path = $request->file('banner_image')->storeAs('product/videos', $filename, 'public');
            $validated['banner_image'] = $path;
        }

        $video->update($validated);

        return redirect()->route('financial-hub.index')
            ->with('success', 'Video banner updated successfully.');
    }

    /**
     * Remove the specified video from storage.
     */
    public function destroy(FinancialIntelligentHub $video)
    {
        // Check if deleting would result in fewer than 4 published banners
        if ($video->is_published) {
            $publishedCount = FinancialIntelligentHub::where('is_published', true)->count();

            if ($publishedCount <= 4) {
                return redirect()->back()->with('error', 'Cannot delete. Minimum of 4 published video banners required.');
            }
        }

        // Delete the banner image
        if ($video->banner_image && Storage::disk('public')->exists($video->banner_image)) {
            Storage::disk('public')->delete($video->banner_image);
        }

        $video->delete();

        return redirect()->route('financial-hub.index')
            ->with('success', 'Video banner deleted successfully.');
    }

    /**
     * Toggle the published status of a video.
     */
    public function togglePublish(FinancialIntelligentHub $video)
    {
        $newStatus = !$video->is_published;
        $publishedCount = FinancialIntelligentHub::where('is_published', true)->count();

        // Check publishing constraints
        if ($newStatus && $publishedCount >= 8) {
            return redirect()->back()->with('error', 'Maximum of 8 published video banners allowed.');
        }

        if (!$newStatus && $publishedCount <= 4) {
            return redirect()->back()->with('error', 'Minimum of 4 published video banners required.');
        }

        $video->update(['is_published' => $newStatus]);

        $status = $newStatus ? 'published' : 'unpublished';
        return redirect()->back()->with('success', "Video banner {$status} successfully.");
    }

    /**
     * Update the display order of videos.
     */
    public function updateOrder(Request $request)
    {
        $validated = $request->validate([
            'orders' => 'required|array',
            'orders.*' => 'integer|exists:video_hubs,id',
        ]);

        foreach ($validated['orders'] as $index => $id) {
            FinancialIntelligentHub::where('id', $id)->update(['display_order' => $index + 1]);
        }

        return response()->json(['success' => true]);
    }

    /**
     * Update the YouTube playlist link.
     */
    public function updatePlaylistLink(Request $request)
    {
        $validated = $request->validate([
            'youtube_playlist_link' => 'required|url',
        ]);

        // This would typically update a setting in the database
        // For simplicity, we'll use a config file or env variable
        // In a real app, you'd want to use a settings table or similar

        // Update .env file (this is a simplification)
        $envFile = base_path('.env');
        if (file_exists($envFile)) {
            $content = file_get_contents($envFile);

            if (strpos($content, 'YOUTUBE_PLAYLIST_LINK=') !== false) {
                $content = preg_replace(
                    '/YOUTUBE_PLAYLIST_LINK=.*/',
                    'YOUTUBE_PLAYLIST_LINK=' . $validated['youtube_playlist_link'],
                    $content
                );
            } else {
                $content .= "\nYOUTUBE_PLAYLIST_LINK=" . $validated['youtube_playlist_link'];
            }

            file_put_contents($envFile, $content);
        }

        return redirect()->route('financial-hub.index')
            ->with('success', 'YouTube playlist link updated successfully.');
    }
}
