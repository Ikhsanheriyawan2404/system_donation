<?php

namespace App\Http\Controllers\API\V1;

use App\Models\Donation;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Http\Requests\DonationRequest;
use App\Http\Resources\DonationResource;

class DonationController extends Controller
{
    public function index()
    {
        return new DonationResource(true, null, Donation::with('category')->get());
    }

    public function show($slug)
    {
        $donation = Donation::where('slug', $slug)->get();
        return new DonationResource(true, null, $donation);
    }

    public function store(DonationRequest $request)
    {
        $request->validated();
        $donation =  Donation::create([
            'title' => request('title'),
            'slug' => Str::slug(request('title')),
            'image' => request('image'),
            'description' => request('description'),
            'category_id' => request('category_id'),
        ]);

        return new DonationResource(true, 'Donasi berhasil ditambahkan', $donation);
    }

    public function update(DonationRequest $request, $slug)
    {
        $request->validated();
        $donation = Donation::where('slug', $slug)->get();
        $donation->update([
            'title' => request('title'),
            'slug' => Str::slug(request('title')),
            'image' => request('image'),
            'description' => request('description'),
            'category_id' => request('category_id'),
        ]);

        return new DonationResource(true, 'Donasi berhasil diedit', $donation);
    }

    public function destroy(Donation $donation)
    {
        $donation->delete();
        return new DonationResource(true, 'Donasi berhasil dihapus', null);
    }
}
