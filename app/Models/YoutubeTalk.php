<?php

namespace App\Models;

use Carbon\CarbonInterval;
use Exception;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;

class YoutubeTalk
{
    private string $id;
    private Response $response;

    public function __construct(string $id)
    {
        $this->id = $id;
    }

    public function save(Course $course, Lesson $lesson)
    {
        $lesson->fill([
            'course_id' => $course->id,
            'title' => $this->json('items.0.snippet.title'),
            'duration' => CarbonInterval::make($this->json('items.0.contentDetails.duration'))->totalSeconds,
            'embed_html' => $this->json('items.0.player.embedHtml'),
            'thumbnail_url' => $this->thumbnailUrl(),
            'description' => $this->json('items.0.snippet.description'),
            'external_id' => $this->id,
            'published_at' => $this->json('items.0.snippet.publishedAt'),
        ])->save();
    }

    private function json(string $key = null)
    {
        if (isset($this->response)) {
            return $this->response->json($key);
        }

        $this->response = Http::asJson()
            ->get(
                config('services.youtube.endpoint') . '/videos',
                [
                    'part' => 'snippet,player,contentDetails',
                    'id' => $this->id,
                    'key' => config('services.youtube.secret')
                ]
            );

        $validator = Validator::make($this->response->json(), [
            'items.0.snippet.title' => ['required'],
            'items.0.contentDetails.duration' => ['required'],
            'items.0.player.embedHtml' => ['required'],
            'items.0.snippet.description' => [],
            'items.0.snippet.thumbnails' => ['min:1'],
            'items.0.snippet.publishedAt' => ['required', 'date'],
        ]);

        if ($this->response->failed() || $validator->fails()) {
            throw new Exception("Failed to fetch video details for: $this->id");
        }

        return $this->response->json($key);
    }

    private function thumbnailUrl()
    {
        if ($this->json('items.0.snippet.thumbnails.standard.url')) {
            return $this->json('items.0.snippet.thumbnails.standard.url');
        }

        return optional(
            collect($this->json('items.0.snippet.thumbnails'))
                ->sortByDesc('width')
                ->first()
        )['url'];
    }
}
