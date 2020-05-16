<?php

namespace App\Http\Controllers\API;

use App\Abstractions\APIResponse;
use App\Contracts\Services\SettingServiceInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\Setting\Group;
use App\Http\Requests\Setting\GroupAndKeys;
use App\Http\Requests\Setting\Menu;
use Exception;
use Illuminate\Http\JsonResponse;

class SettingController extends Controller
{
    /**
     * @var SettingServiceInterface
     */
    protected $settingService;
    /**
     * @var APIResponse
     */
    protected $apiResponse;

    /**
     * SettingController constructor.
     * @param SettingServiceInterface $settingService
     * @param APIResponse $apiResponse
     */
    public function __construct(SettingServiceInterface $settingService, APIResponse $apiResponse)
    {
        $this->settingService = $settingService;
        $this->apiResponse = $apiResponse;
    }

    /**
     * Get the settings by group and keys.
     *
     * @param GroupAndKeys $request
     * @return JsonResponse
     */
    public function getSettingsByGroupAndKeys(GroupAndKeys $request)
    {
        try {
            $response = $this->settingService->getSettingsByGroupAndKeys($request->group, $request->keys);
            return $this->apiResponse->success($response->data, $response->message, $response->statusCode);
        } catch (Exception $exception) {
            return $this->apiResponse->errors($exception->getMessage(), $exception->getCode());
        }
    }

    /**
     *  Get the settings by group
     *
     * @param Group $request
     * @return JsonResponse
     */
    public function getSettingsByGroup(Group $request)
    {
        try {
            $response = $this->settingService->getSettingsByGroup($request->group);
            return $this->apiResponse->success($response->data, $response->message, $response->statusCode);
        } catch (Exception $exception) {
            return $this->apiResponse->errors($exception->getMessage(), $exception->getCode());
        }
    }

    /**
     * Get the menus by name
     *
     * @param Menu $request
     * @return JsonResponse
     */
    public function getMenusByName(Menu $request)
    {
        try {
            $response = $this->settingService->getMenusByName($request->menu);
            return $this->apiResponse->success($response->data, $response->message, $response->statusCode);
        } catch (Exception $exception) {
            return $this->apiResponse->errors($exception->getMessage(), $exception->getCode());
        }
    }
}
