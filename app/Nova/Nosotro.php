<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Trix;
use Laravel\Nova\Http\Requests\NovaRequest;
use Media24si\NovaYoutubeField\Youtube;

class Nosotro extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Nosotro::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'titulo';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'titulo',
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function fields(Request $request)
    {
        return [
            ID::make(__('ID'), 'id')->sortable(),
            Text::make('Titulo'),
            Trix::make('Descripcion')->hideFromIndex(),
            Image::make('Imagen derecha')->hideFromIndex(),
            Image::make('Imagen izquierda')->hideFromIndex(),
            Image::make('Icon1')->hideFromIndex(),
            Text::make('Titulo icono 1', 'titulo_icon1')->hideFromIndex(),
            Image::make('Icon2')->hideFromIndex(),
            Text::make('Titulo icono 2', 'titulo_icon2')->hideFromIndex(),
            Image::make('Icon3')->hideFromIndex(),
            Text::make('Titulo icono 3', 'titulo_icon3')->hideFromIndex(),
            Image::make('Icon4')->hideFromIndex(),
            Text::make('Titulo icono 4', 'titulo_icon4')->hideFromIndex(),
            Youtube::make('Video')
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function cards(Request $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function filters(Request $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function lenses(Request $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function actions(Request $request)
    {
        return [];
    }

    public static function authorizedToCreate(Request $request)
    {
        return false;
    }

    public function authorizedToDelete(Request $request)
    {
        return false;
    }
}
