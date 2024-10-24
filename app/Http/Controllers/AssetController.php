<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAssetRequest;
use App\Http\Requests\UpdateAssetRequest;
use App\Models\Asset;

class AssetController extends Controller
{
    public function index()
    {
        $assets = Asset::all();

        return view('pages.admin.asset.asset', ['assets' => $assets]);
    }

    public function show(string $id)
    {
        $asset = Asset::findOrFail($id);

        return view('pages.admin.asset.asset-detail', ['asset' => $asset]);
    }

    public function create()
    {
        return view('pages.admin.product.product-create');
    }

    public function store(StoreAssetRequest $request)
    {
        $data = $request->validated();
        $image = $data['imgURL'];
        // $uploadedFileUrl = Cloudinary::upload($image->getRealPath())->getSecurePath();
        // $data['imgURL'] = $uploadedFileUrl;
        $product = Asset::create($data);

        return redirect()->route('admin.product.detail', ['id' => $product->_id])->with('success', 'Product created successfully');
    }

    public function edit(string $id)
    {
        $product = Asset::findOrFail($id);

        return view('pages.admin.product.product-edit', ['product' => $product]);
    }

    public function update(UpdateAssetRequest $request, string $id)
    {
        $asset = Asset::findOrFail($id);

        $data = $request->validated();

        $asset->update($data);

        return redirect()->route('admin.product.detail', ['id' => $id])->with('success', 'Asset updated successfully');
    }

    public function destroy(string $id)
    {
        $asset = Asset::findOrFail($id);

        $asset->delete();

        return redirect()->route('admin.asset')->with('success', 'Asset deleted successfully');
    }
}
