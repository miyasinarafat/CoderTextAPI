<?php


namespace App\Services;


use App\Abstractions\ServiceDTO;
use App\Contracts\Repositories\SettingRepositoryInterface;
use App\Contracts\Services\SettingServiceInterface;

class SettingService implements SettingServiceInterface
{
    /**
     * @var SettingRepositoryInterface
     */
    protected $settingRepository;

    /**
     * SettingService constructor.
     * @param SettingRepositoryInterface $settingRepository
     */
    public function __construct(SettingRepositoryInterface $settingRepository)
    {
        $this->settingRepository = $settingRepository;
    }

    /**
     * Get settings by group and keys
     *
     * @param $group
     * @param $keys
     * @return ServiceDTO
     */
    public function getSettingsByGroupAndKeys($group, $keys): ServiceDTO
    {
        $settings = $this->settingRepository->getSettingsByGroupAndKeys($group, $keys);
        return new ServiceDTO('List of settings by group and keys', 200, $settings);
    }

    /**
     * Get settings by group
     *
     * @param $group
     * @return ServiceDTO
     */
    public function getSettingsByGroup($group): ServiceDTO
    {
        $settings = $this->settingRepository->getSettingsByGroup($group);
        return new ServiceDTO('List of settings by group', 200, $settings);
    }
}