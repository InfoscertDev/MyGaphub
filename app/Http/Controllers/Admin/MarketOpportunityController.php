<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MarketOpportunity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MarketOpportunityController extends Controller
{
    /**
     * Display a listing of the market opportunities.
     */
    public function index()
    {
        $marketOpportunities = MarketOpportunity::orderBy('display_order')->get();
        $publishedCount = MarketOpportunity::where('is_published', true)->count();

        return view('admin.market-opportunities.index', compact('marketOpportunities', 'publishedCount'));
    }

    /**
     * Show the form for creating a new market opportunity.
     */
    public function create()
    {
        $buttonOptions = [
            'Proceed',
            'Learn More',
            'View Details',
            'Get Started',
            'Explore'
        ];

        return view('admin.market-opportunities.create', compact('buttonOptions'));
    }

    /**
     * Store a newly created market opportunity in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'banner_image' => 'required|image|mimes:jpeg,png,jpg|dimensions:width=343,height=142',
            'button_text' => 'required|string|max:30',
            'destination_link' => 'required|url',
            'is_published' => 'boolean',
        ]);

        // Handle image upload
        if ($request->hasFile('banner_image')) {
            $image = $request->file('banner_image');

            // Process image with Intervention Image if needed
            $processedImage = Image::make($image)
                ->resize(343, 142)
                ->encode('jpg', 90);

            $filename = 'market-opportunity-' . time() . '.jpg';
            Storage::disk('public')->put('banners/' . $filename, (string) $processedImage);

            $validated['banner_image'] = 'banners/' . $filename;
        }

        // Handle the maximum number of published banners
        if (isset($validated['is_published']) && $validated['is_published']) {
            $publishedCount = MarketOpportunity::where('is_published', true)->count();

            if ($publishedCount >= 6) {
                return redirect()->back()->with('error', 'Maximum of 6 published banners allowed. Please unpublish an existing banner first.');
            }
        }

        // Set display order for new items
        $maxOrder = MarketOpportunity::max('display_order') ?? 0;
        $validated['display_order'] = $maxOrder + 1;

        MarketOpportunity::create($validated);

        return redirect()->route('admin.market-opportunities.index')
            ->with('success', 'Market opportunity created successfully.');
    }

    /**
     * Display the specified market opportunity.
     */
    public function show(MarketOpportunity $marketOpportunity)
    {
        return view('admin.market-opportunities.show', compact('marketOpportunity'));
    }

    /**
     * Show the form for editing the specified market opportunity.
     */
    public function edit(MarketOpportunity $marketOpportunity)
    {
        $buttonOptions = [
            'Proceed',
            'Learn More',
            'View Details',
            'Get Started',
            'Explore'
        ];

        return view('admin.market-opportunities.edit', compact('marketOpportunity', 'buttonOptions'));
    }

    /**
     * Update the specified market opportunity in storage.
     */
    public function update(Request $request, MarketOpportunity $marketOpportunity)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'banner_image' => 'nullable|image|mimes:jpeg,png,jpg|dimensions:width=343,height=142',
            'button_text' => 'required|string|max:30',
            'destination_link' => 'required|url',
            'is_published' => 'boolean',
            'display_order' => 'nullable|integer'
        ]);

        // If is_published is not in the request, set it to false
        if (!isset($validated['is_published'])) {
            $validated['is_published'] = false;
        }

        // Handle the minimum and maximum number of published banners
        if ($marketOpportunity->is_published != $validated['is_published']) {
            $publishedCount = MarketOpportunity::where('is_published', true)->count();

            if ($validated['is_published'] && $publishedCount >= 6) {
                return redirect()->back()->with('error', 'Maximum of 6 published banners allowed. Please unpublish an existing banner first.');
            }

            if (!$validated['is_published'] && $publishedCount <= 3) {
                return redirect()->back()->with('error', 'Minimum of 3 published banners required. Please publish another banner first.');
            }
        }

        // Handle image upload
        if ($request->hasFile('banner_image')) {
            // Delete old image
            if ($marketOpportunity->banner_image && Storage::disk('public')->exists($marketOpportunity->banner_image)) {
                Storage::disk('public')->delete($marketOpportunity->banner_image);
            }

            $image = $request->file('banner_image');

            // Process image with Intervention Image if needed
            $processedImage = Image::make($image)
                ->resize(343, 142)
                ->encode('jpg', 90);

            $filename = 'market-opportunity-' . time() . '.jpg';
            Storage::disk('public')->put('banners/' . $filename, (string) $processedImage);

            $validated['banner_image'] = 'banners/' . $filename;
        }

        $marketOpportunity->update($validated);

        return redirect()->route('admin.market-opportunities.index')
            ->with('success', 'Market opportunity updated successfully.');
    }

    /**
     * Remove the specified market opportunity from storage.
     */
    public function destroy(MarketOpportunity $marketOpportunity)
    {
        // Check if deleting would result in fewer than 3 published banners
        if ($marketOpportunity->is_published) {
            $publishedCount = MarketOpportunity::where('is_published', true)->count();

            if ($publishedCount <= 3) {
                return redirect()->back()->with('error', 'Cannot delete. Minimum of 3 published banners required.');
            }
        }

        // Delete the banner image
        if ($marketOpportunity->banner_image && Storage::disk('public')->exists($marketOpportunity->banner_image)) {
            Storage::disk('public')->delete($marketOpportunity->banner_image);
        }

        $marketOpportunity->delete();

        return redirect()->route('admin.market-opportunities.index')
            ->with('success', 'Market opportunity deleted successfully.');
    }

    /**
     * Toggle the published status of a market opportunity.
     */
    public function togglePublish(MarketOpportunity $marketOpportunity)
    {
        $newStatus = !$marketOpportunity->is_published;
        $publishedCount = MarketOpportunity::where('is_published', true)->count();

        // Check publishing constraints
        if ($newStatus && $publishedCount >= 6) {
            return redirect()->back()->with('error', 'Maximum of 6 published banners allowed.');
        }

        if (!$newStatus && $publishedCount <= 3) {
            return redirect()->back()->with('error', 'Minimum of 3 published banners required.');
        }

        $marketOpportunity->update(['is_published' => $newStatus]);

        $status = $newStatus ? 'published' : 'unpublished';
        return redirect()->back()->with('success', "Market opportunity {$status} successfully.");
    }

    /**
     * Update the display order of market opportunities.
     */
    public function updateOrder(Request $request)
    {
        $validated = $request->validate([
            'orders' => 'required|array',
            'orders.*' => 'integer|exists:market_opportunities,id',
        ]);

        foreach ($validated['orders'] as $index => $id) {
            MarketOpportunity::where('id', $id)->update(['display_order' => $index + 1]);
        }

        return response()->json(['success' => true]);
    }
}
