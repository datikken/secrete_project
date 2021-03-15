<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\File;
use Laravel\Nova\Fields\Select;

class Book extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Book::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'name';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id',
        'name',
        'description',
        'author',
        'cover',
        'file',
        'rating'
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function fields(Request $request)
    {
        return [
            ID::make(__('ID'), 'id')->sortable(),
            Text::make('name'),
            Text::make('description')
                ->displayUsing(function($id) {
                    $part = strip_tags(substr($id, 0, 25));
                    return $part . " ...";
                }),
            Text::make('author'),
            Image::make('cover')
                ->disk('local')
                ->store(function (Request $request) {
                    $filename = $request->cover->getClientOriginalName();
                    $request->cover->storeAs('/public/books_images', $filename, 'local');
                    return [
                        'cover' => '/books_images/' . $filename
                    ];
                }),
            File::make('file')
                ->disk('local')
                ->store(function (Request $request) {
                    $filename = $request->file->getClientOriginalName();
                    $request->file->storeAs('/public/books', $filename, 'local');
                    return [
                        'file' => '/books/' . $filename
                    ];
                }),
            Select::make('rating')->options([
                '1' => '1',
                '2' => '2',
                '3' => '3',
                '4' => '4',
                '5' => '5'
            ]),
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function cards(Request $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function filters(Request $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function lenses(Request $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function actions(Request $request)
    {
        return [];
    }
}
