<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Slug;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Fields\Trix;
use Laravel\Nova\Http\Requests\NovaRequest;
use Vyuldashev\NovaMoneyField\Money;

class Promocion extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Promocion::class;


    public static function label() {
        return 'Promociones';
    }
    
    public static function indexQuery(NovaRequest $request, $query)
    {
        

        return $query->where('tipo', 'promo');
    }

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
            BelongsTo::make('Categoria', 'categoria', 'App\Nova\Categoria'),
            BelongsTo::make('Subcategoria', 'subcategoria', 'App\Nova\Subcategoria')->hideFromIndex(),
            BelongsTo::make('Marca', 'marca', 'App\Nova\Marca')->hideFromIndex(),
            Text::make('titulo')
                ->sortable()
                ->rules('required', 'max:255'),          
            Slug::make('Slug')->from('titulo')->separator('-')->hideFromIndex(),
            Textarea::make('Resumen'),
            Trix::make('Descripcion'),
            
            Number::make('Stock')->min(1)->max(1000),
            Money::make('Precio actual', 'PEN')->locale('es-Pe'),
            
            Money::make('Precio antes', 'PEN')->locale('es-Pe')->hideFromIndex(),
            
            
            Select::make('Tipo')->options([
                'promo' => 'Promoción'
            ])->default('promo')->hideFromIndex(),
            Image::make('Imagen 1280x959px','imagen')->disk('public')->disableDownload(),
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
}
