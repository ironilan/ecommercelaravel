<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;
use Vyuldashev\NovaMoneyField\Money;

class Pedidoentregado extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Pedidoentregado::class;

    public static function label() {
        return 'Pedidos entregados';
    }


    public static function indexQuery(NovaRequest $request, $query)
    {
        
        return $query->where('estado_admin', 'entregado');
    }

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
            BelongsTo::make('Usuario', 'user', 'App\Nova\User'),
            Text::make('Codigo cupon', 'cod_cupon')->hideFromIndex(),
            Text::make('Dscto cupon', 'dscto_cupon')->hideFromIndex(),
            Money::make('Monto original', 'PEN','monto_original')->locale('es-Pe')->hideFromIndex(),
            Money::make('Monto final', 'PEN','monto_final')->locale('es-Pe'),
            Text::make('Cod operacion', 'cargo'),
            DateTime::make('Fecha', 'fecha_pago'),
            Text::make('Estado pedido', 'estado'),
            Select::make('Estado de entrega', 'estado_admin')->options([
                'no_comprado' => 'No comprado',
                'pendiente' => 'Pendiente',
                'entregado' => 'Entregado',
            ])->default('pendiente')->hideFromIndex(),
            Text::make('Estado entrega', 'estado_admin', function(){
                if ($this->estado_admin == 'no_comprado') {
                    return '<span class="font-bold cursor-pointer text-danger">'.$this->estado_admin.'</span>';
                }elseif($this->estado_admin == 'pendiente')
                {
                    return '<span class="font-bold cursor-pointer text-info">'.$this->estado_admin.'</span>';
                }else{
                    return '<span class="font-bold cursor-pointer text-success">'.$this->estado_admin.'</span>';
                }
                
            })->asHtml()->exceptOnForms(),
            HasMany::make('pedidodetalles')
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


    public function authorizedToDelete(Request $request)
    {
        return false;
    }
}
