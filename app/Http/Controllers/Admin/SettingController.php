<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Admin;

use App\Setting;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Setting\StoreRequest;
use App\Http\Requests\Admin\Setting\UpdateRequest;
use Illuminate\Contracts\View\View as ViewContract;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View;

/**
 * Class SettingController
 *
 * @package App\Http\Controllers\Admin
 */
class SettingController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\View
     *
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    public function index(): ViewContract
    {
        return View::make('admin.setting.index', [
            'settings' => Setting::latest('updated_at')->first() ?? (object)[],
            'content' => json_decode(Storage::disk('file')->get('content.json'), true)
        ]);
    }

    /**
     * @param \App\Http\Requests\Admin\Setting\StoreRequest $request
     *
     * @return \Illuminate\Http\JsonResponse
     *
     * @throws \Spatie\MediaLibrary\Exceptions\FileCannotBeAdded
     */
    public function store(StoreRequest $request): JsonResponse
    {
        $settingData = $request->except(
                [
                    'code_insert',
                ]
            ) + [
                'code_insert' => $request->get('code_insert') ?? '',
            ];

        $setting = Setting::create($settingData);

        $this->handleDocuments($request, $setting);

        Session::flash(
            'success',
            Lang::get('admin/setting.messages.create')
        );

        return $this->json()->noContent();
    }

    /**
     * @param \App\Http\Requests\Admin\Setting\UpdateRequest $request
     * @param \App\Setting $setting
     *
     * @return \Illuminate\Http\JsonResponse
     *
     * @throws \Spatie\MediaLibrary\Exceptions\FileCannotBeAdded
     * @throws \Spatie\MediaLibrary\Exceptions\FileCannotBeAdded\DiskDoesNotExist
     * @throws \Spatie\MediaLibrary\Exceptions\FileCannotBeAdded\FileDoesNotExist
     * @throws \Spatie\MediaLibrary\Exceptions\FileCannotBeAdded\FileIsTooBig
     */
    public function update(UpdateRequest $request, Setting $setting): JsonResponse
    {
        $promExcel = '';
        $seoImage = '';

        if (isset($request->file('general_settings')['prom']) && $file = $request->file('general_settings')['prom']) {
            $media = $setting->addMedia($file)
                ->toMediaCollection(Setting::MEDIA_COLLECTION_SETTING);

            $promExcel = $media->getFullUrl();
        } else {
            $promExcel = $request->get('general_settings')['prom'] ?? '';
        }

        $settingData = $request->except(
                [
                    'code_insert',
                    'prom_excel',
                ]
            ) + [
                'code_insert' => $request->get('code_insert') ?? '',
                'prom_excel' => $promExcel,
            ];

        $setting->update($settingData);

        $this->handleDocuments($request, $setting);

        if ($content = $request->get('content')) {
            //Storage::disk('public')->delete('content.json');

            Storage::disk('file')->put('content.json', json_encode($content));
        }

        Session::flash(
            'success',
            Lang::get('admin/setting.messages.update')
        );

        return $this->json()->noContent();
    }

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function modify(Request $request): JsonResponse
    {
        $data = [
            'attribute' => $request->get('attribute'),
            'value' => $request->get('value'),
        ];

        Storage::disk('public')->put('content.json', json_encode($data));

        return $this->json()->noContent();
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Setting $setting
     *
     * @return void
     *
     * @throws \Spatie\MediaLibrary\Exceptions\FileCannotBeAdded
     */
    protected function handleDocuments(Request $request, Setting $setting): void
    {
        if (isset($request->file('general_settings')['seo_image']) && $settingSeoImage = $request->file('general_settings')['seo_image']) {
            $media = $setting->addMedia($settingSeoImage)
                ->toMediaCollection(Setting::MEDIA_COLLECTION_SETTING);

            $setting->update([
                'code_insert' => $request->get('code_insert') ?? '',
                'prom_excel' => $request->get('prom_excel') ?? '',
                'general_settings' => [
                'email' => $request->get('general_settings')['email'] ?? null,
                'contact_email' => $request->get('general_settings')['contact_email'] ?? null,
                'phone' => $request->get('general_settings')['phone'] ?? null,
                'manager' => $request->get('general_settings')['manager'] ?? null,
                'vk' => $request->get('general_settings')['vk'] ?? null,
                'tg' => $request->get('general_settings')['tg'] ?? null,
                'gd' => $request->get('general_settings')['gd'] ?? null,
                'inst' => $request->get('general_settings')['inst'] ?? null,
                'seo_meta' => $request->get('general_settings')['seo_meta'] ?? null,
                'seo_title' => $request->get('general_settings')['seo_title'] ?? null,
                'seo_keywords' => $request->get('general_settings')['seo_keywords'] ?? null,
                'seo_image' => $media->getFullUrl(),
                'iframe_map' => $request->get('general_settings')['iframe_map'] ?? null,
                'iframe_map' => $request->get('general_settings')['iframe_map'] ?? null,
            ]]);
        } elseif (
            $request->has('general_settings')['seo_image']
            && $setting->getAttribute('general_settings')['seo_image']
            !== $image = $request->get('general_settings')['seo_image']
        ) {
            $setting->update([
                'code_insert' => $request->get('code_insert') ?? '',
                'prom_excel' => $request->get('prom_excel') ?? '',
                'general_settings' => [
                'email' => $request->get('general_settings')['email'] ?? null,
                'contact_email' => $request->get('general_settings')['contact_email'] ?? null,
                'phone' => $request->get('general_settings')['phone'] ?? null,
                'manager' => $request->get('general_settings')['manager'] ?? null,
                'vk' => $request->get('general_settings')['vk'] ?? null,
                'tg' => $request->get('general_settings')['tg'] ?? null,
                'gd' => $request->get('general_settings')['gd'] ?? null,
                'inst' => $request->get('general_settings')['inst'] ?? null,
                'seo_meta' => $request->get('general_settings')['seo_meta'] ?? null,
                'seo_title' => $request->get('general_settings')['seo_title'] ?? null,
                'seo_keywords' => $request->get('general_settings')['seo_keywords'] ?? null,
                'seo_image' => $setting->getAttribute('general_settings')['seo_image'] ?? '',
                'iframe_map' => $request->get('general_settings')['iframe_map'] ?? null,
            ]]);
        }
    }
}
