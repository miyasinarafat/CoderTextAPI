<?php

namespace App\Http\Controllers\API;

use App\Abstractions\APIResponse;
use App\Contracts\Services\ProductServiceInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\Product\Index;
use App\Http\Requests\Product\Show;
use Illuminate\Http\JsonResponse;

class ProductController extends Controller
{
    /**
     * @var ProductServiceInterface
     */
    protected $productService;
    /**
     * @var APIResponse
     */
    protected $apiResponse;

    /**
     * ProductController constructor.
     * @param ProductServiceInterface $productService
     * @param APIResponse $apiResponse
     */
    public function __construct(ProductServiceInterface $productService, APIResponse $apiResponse)
    {
        $this->productService = $productService;
        $this->apiResponse = $apiResponse;
    }

    /**
     * Get products with paginate
     *
     * @param Index $request
     * @return JsonResponse
     */
    public function index(Index $request)
    {
        $response = $this->productService->index();
        return $this->apiResponse->success($response->data, $response->message, $response->statusCode);
    }

    /**
     * Get product by slug
     *
     * @param Show $request
     * @return JsonResponse
     */
    public function show(Show $request)
    {
        $response = $this->productService->show($request->slug);
        return $this->apiResponse->success($response->data, $response->message, $response->statusCode);
    }
}
