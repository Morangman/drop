<?php

declare(strict_types = 1);

namespace App\Http\Controllers;

use App\Comment;
use App\Http\Requests\Admin\Order\StoreRequest;
use App\Notifications\CommentNotification;
use App\Order;
use App\Setting;
use App\User;
use Butschster\Head\Facades\Meta;
use Butschster\Head\Packages\Entities\OpenGraphPackage;
use Illuminate\Contracts\View\View as ViewContract;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View;
use Spatie\MediaLibrary\Models\Media;

/**
 * Class HomeController
 *
 * @package App\Http\Controllers
 */
class HomeController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\View
     *
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    public function index(): ViewContract
    {
        $settings = Setting::latest('updated_at')->first() ?? null;

        $seoTitle = isset($settings) && isset($settings->getAttribute('general_settings')['seo_title'])
            ? $settings->getAttribute('general_settings')['seo_title']
            : '';
        $seoImage = isset($settings) && isset($settings->getAttribute('general_settings')['seo_image'])
            ? $settings->getAttribute('general_settings')['seo_image']
            : '';

        $og = new OpenGraphPackage('home_og');

        $og->setType('OG META TAGS')
            ->setSiteName($seoTitle)
            ->setTitle($seoTitle)
            ->addImage($seoImage);

        $og->toHtml();

        Meta::registerPackage($og);

        Meta::prependTitle($seoTitle)
            ->setKeywords(isset($settings) ? $settings->getAttribute('general_settings')['seo_keywords'] : '')
            ->setDescription($seoTitle);

        return View::make('home', [
            'settings' => $settings ?? [],
            'content' => json_decode(Storage::disk('file')->get('content.json'), true),
            'comments' => Comment::query()->where('is_hidden', false)->get() ?? []
        ]);
    }

    /**
     * @return \Illuminate\Contracts\View\View
     *
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    public function prom(): ViewContract
    {
        $settings = Setting::latest('updated_at')->first() ?? null;

        return View::make('prom', [
            'settings' => $settings ?? [],
            'content' => json_decode(Storage::disk('file')->get('content.json'), true),
            'files' => $settings->getMedia(Setting::MEDIA_COLLECTION_PROM_PRICE)
                ->map(static function (Media $media) {
                    return [
                        'id' => $media->getKey(),
                        'url' => $media->getFullUrl(),
                        'title' => $media->getCustomProperty('title'),
                    ];
                })->toArray()
        ]);
    }

    /**
     * @return \Illuminate\Contracts\View\View
     *
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    public function terms(): ViewContract
    {
        $settings = Setting::latest('updated_at')->first() ?? null;

        return View::make('terms', [
            'settings' => $settings ?? [],
            'content' => json_decode(Storage::disk('file')->get('content.json'), true),
        ]);
    }

    /**
     * @param \App\Http\Requests\Admin\Order\StoreRequest $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function makeOrder(StoreRequest $request): JsonResponse
    {
        $orderData = array_merge($request->all(), ['ip_address' => $request->ip()]);

        Order::create($orderData);

        return $this->json()->noContent();
    }

    /**
     * @param \App\Http\Requests\Admin\Comment\StoreRequest $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function addComment(\App\Http\Requests\Admin\Comment\StoreRequest $request): JsonResponse
    {
        $comment = Comment::create(array_merge($request->all(), ['is_hidden' => true]));

        Notification::send(
            User::query()->scopes(['notifiableUsers'])->get(),
            new CommentNotification($comment->getKey())
        );

        return $this->json()->noContent();
    }
}
