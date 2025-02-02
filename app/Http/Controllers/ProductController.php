<?php

namespace App\Http\Controllers;

use App\Services\ProductService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function __construct(private readonly ProductService $productService)
    {
    }

    public function index(): JsonResponse
    {
        return response()->json($this->productService->getAllProducts());
    }

    public function show(int $id): JsonResponse
    {
        $product = $this->productService->getProductById($id);

        return $product
            ? response()->json($product)
            : response()->json(['error' => 'Product not found'], 404);
    }

    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0'
        ]);

        return response()->json($this->productService->createProduct($validated), 201);
    }

    public function update(Request $request, int $id): JsonResponse
    {
        $validated = $request->validate([
            'name' => 'sometimes|string|max:255',
            'price' => 'sometimes|numeric|min:0',
            'stock' => 'sometimes|integer|min:0'
        ]);

        $updatedProduct = $this->productService->updateProduct($id, $validated);

        return $updatedProduct
            ? response()->json($updatedProduct)
            : response()->json(['error' => 'Product not found'], 404);
    }

    public function destroy(int $id): JsonResponse
    {
        return response()->json(['success' => $this->productService->deleteProduct($id)]);
    }
}
