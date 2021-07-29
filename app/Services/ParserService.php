<?php

namespace App\Services;

use App\Contracts\ParserContract;
use App\Models\Category;
use App\Models\News;
use Orchestra\Parser\Xml\Facade as XmlParser;
use Illuminate\Support\Str;

class ParserService implements ParserContract
{
    public function getParsedList(string $url): array
    {
        $xml = XmlParser::load($url);
        $data = $xml->parse([
            'title' => [
                'uses' => 'channel.title',
            ],
            'link' => [
                'uses' => 'channel.link',
            ],
            'description' => [
                'uses' => 'channel.decription',
            ],
            'image' => [
                'uses' => 'channel.image.url'
            ],
            'news' => [
                'uses' => 'channel.item[title,link,guid,description,pubDate]'
            ],
        ]);
        return $data;
    }

    public function saveNewsInDB(string $url): void
    {
        $parsedList = $this->getParsedList($url);
        $doubleCategoryTitle = Category::where('title', '=', $parsedList['title'])->first();
        if (is_null($doubleCategoryTitle)) {
            $result = Category::create([
                'title' => $parsedList['title'],
                'description' => $parsedList['description'],
            ]);
            $categoryId = $result->id;
            foreach ($parsedList['news'] as $news) {
                News::create([
                    'category_id' => $categoryId,
                    'title' => $news['title'],
                    'slug' => Str::slug($news['title']),
                    'description' => $news['description'],
                    'created_at' => $news['pubDate'],
                ]);
            }
        } else {
            $categoryId = $doubleCategoryTitle->id;
            News::where('category_id', '=', $categoryId)
                ->delete();
            foreach ($parsedList['news'] as $news) {
                News::create([
                    'category_id' => $categoryId,
                    'title' => $news['title'],
                    'slug' => Str::slug($news['title']),
                    'description' => $news['description'],
                    'created_at' => $news['pubDate'],
                ]);
            }
        }
    }
}
