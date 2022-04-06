<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\Heading;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Http\Requests\NovaRequest;

class Config extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Config::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'id';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id',
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
            Heading::make('Datos'),
            Text::make('Titulo','title'),
            Text::make('Dirección','address')->hideFromIndex(),
            Text::make('Horario')->hideFromIndex(),
            Text::make('Celular','cellphone')->hideFromIndex(),
            Text::make('Teléfono','phone')->hideFromIndex(),
            Text::make('Email','email')->hideFromIndex(),
            Heading::make('Meta'),
            Textarea::make('Keywords')->hideFromIndex(),
            Textarea::make('Description')->hideFromIndex(),
            Heading::make('Imagenes'),
            Image::make('Logo')->disk('public')->disableDownload(),
            Image::make('Logo footer', 'logo_footer')->disk('public')->disableDownload()->hideFromIndex(),
            Heading::make('Redes sociales'),
            Text::make('Facebook')->hideFromIndex(),
            Text::make('Instagram')->hideFromIndex(),
            Text::make('Tiktok')->hideFromIndex(),
            Text::make('Twitter')->hideFromIndex(),
            Text::make('Youtube')->hideFromIndex(),
            Text::make('Linkedin')->hideFromIndex()
            
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
