<?php

namespace App\Providers;

use App\Models\Pedido;
use Coroowicaksono\ChartJsIntegration\StackedChart;
use DigitalCreative\CollapsibleResourceManager\CollapsibleResourceManager;
use DigitalCreative\CollapsibleResourceManager\Resources\InternalLink;
use DigitalCreative\CollapsibleResourceManager\Resources\TopLevelResource;
use Illuminate\Support\Facades\Gate;
use Laravel\Nova\Cards\Help;
use Laravel\Nova\Nova;
use Laravel\Nova\NovaApplicationServiceProvider;


class NovaServiceProvider extends NovaApplicationServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
    }

    /**
     * Register the Nova routes.
     *
     * @return void
     */
    protected function routes()
    {
        Nova::routes()
                ->withAuthenticationRoutes()
                ->withPasswordResetRoutes()
                ->register();
    }

    /**
     * Register the Nova gate.
     *
     * This gate determines who can access Nova in non-local environments.
     *
     * @return void
     */
    protected function gate()
    {
        Gate::define('viewNova', function ($user) {
            return in_array($user->email, [
                'ilanvaldez34@gmail.com',
                'erika.leon@peruperruno.pe',
                'jorge.olcese@peruperruno.pe',
                'diana.marticorena@peruperruno.pe'
            ]);
        });
    }

    /**
     * Get the cards that should be displayed on the default Nova dashboard.
     *
     * @return array
     */
    protected function cards()
    {
        $ventasEnero = Pedido::where('estado', 'finalizado')
                        ->whereMonth('fecha_pago', '01')
                        ->whereYear('fecha_pago', Date('Y'))
                        ->get()->sum('monto_final');

        $ventasFeb = Pedido::where('estado', 'finalizado')
                        ->whereYear('fecha_pago', Date('Y'))
                        ->whereMonth('fecha_pago', '02')
                        ->get()->sum('monto_final');

        $ventasMar = Pedido::where('estado', 'finalizado')
                        ->whereYear('fecha_pago', Date('Y'))
                        ->whereMonth('fecha_pago', '03')
                        ->get()->sum('monto_final');

        $ventasAbr = Pedido::where('estado', 'finalizado')
                        ->whereYear('fecha_pago', Date('Y'))
                        ->whereMonth('fecha_pago', '04')
                        ->get()->sum('monto_final');

        $ventasMay = Pedido::where('estado', 'finalizado')
                        ->whereYear('fecha_pago', Date('Y'))
                        ->whereMonth('fecha_pago', '05')
                        ->get()->sum('monto_final');

        $ventasJun = Pedido::where('estado', 'finalizado')
                        ->whereYear('fecha_pago', Date('Y'))
                        ->whereMonth('fecha_pago', '06')
                        ->get()->sum('monto_final');

        $ventasJul = Pedido::where('estado', 'finalizado')
                        ->whereYear('fecha_pago', Date('Y'))
                        ->whereMonth('fecha_pago', '07')
                        ->get()->sum('monto_final');

        $ventasAgo = Pedido::where('estado', 'finalizado')
                        ->whereYear('fecha_pago', Date('Y'))
                        ->whereMonth('fecha_pago', '08')
                        ->get()->sum('monto_final');

        $ventasSet = Pedido::where('estado', 'finalizado')
                        ->whereYear('fecha_pago', Date('Y'))
                        ->whereMonth('fecha_pago', '09')
                        ->get()->sum('monto_final');

        $ventasOct = Pedido::where('estado', 'finalizado')
                        ->whereYear('fecha_pago', Date('Y'))
                        ->whereMonth('fecha_pago', '10')
                        ->get()->sum('monto_final');

        $ventasNov = Pedido::where('estado', 'finalizado')
                        ->whereYear('fecha_pago', Date('Y'))
                        ->whereMonth('fecha_pago', '11')
                        ->get()->sum('monto_final');

        $ventasDic = Pedido::where('estado', 'finalizado')
                        ->whereYear('fecha_pago', Date('Y'))
                        ->whereMonth('fecha_pago', '12')
                        ->get()->sum('monto_final');

        return [
            (new StackedChart())
                ->title('Ventas')
                ->animations([
                    'enabled' => true,
                    'easing' => 'easeinout',
                ])
                ->series(array([
                    'barPercentage' => 0.5,
                    'label' => 'Ventas',
                    'backgroundColor' => '#FE0000',
                    'data' => [$ventasEnero, $ventasFeb, $ventasMar, $ventasAbr, $ventasMay, $ventasJun, $ventasJul, $ventasAgo, $ventasSet, $ventasOct, $ventasNov, $ventasDic],
                ]))
                ->options([
                    'xaxis' => [
                        'categories' => [ 'Ene', 'Feb', 'Mar','Abr', 'May', 'Jun', 'Jul', 'Ago', 'Set', 'Oct', 'Nov', 'Dic' ]
                    ],
                ])
                ->width('2/3'),
        ];
    }

    /**
     * Get the extra dashboards that should be displayed on the Nova dashboard.
     *
     * @return array
     */
    protected function dashboards()
    {
        return [];
    }

    /**
     * Get the tools that should be listed in the Nova sidebar.
     *
     * @return array
     */
    public function tools()
    {
        return [
           new CollapsibleResourceManager([
                'navigation' => [
                    TopLevelResource::make([
                        'label' => 'Usuarios',
                        'expanded' => false,
                        'resources' => [
                            \App\Nova\User::class
                        ]
                    ]),
                    TopLevelResource::make([
                        'label' => 'Configuración',
                        'expanded' => false,
                        'resources' => [
                            \App\Nova\Config::class                        
                        ]
                    ]),
                    TopLevelResource::make([
                        'label' => 'Ecomerce',
                        'expanded' => false,
                        'resources' => [
                            \App\Nova\Marca::class,
                            \App\Nova\Categoria::class,
                            \App\Nova\Subcategoria::class,
                            \App\Nova\Producto::class,
                            \App\Nova\Promocion::class,
                            \App\Nova\Cupon::class,
                            \App\Nova\Envio::class,
                        ]
                    ]),
                    TopLevelResource::make([
                        'label' => 'CMS',
                        'expanded' => false,
                        'resources' => [
                            \App\Nova\Banner::class,
                            \App\Nova\Nosotro::class,
                            \App\Nova\Galeria::class,
                            \App\Nova\Equipo::class,
                            \App\Nova\Testimonio::class,
                            \App\Nova\Legal::class,
                            \App\Nova\Inicio::class,
                        ]
                    ]),
                    TopLevelResource::make([
                        'label' => 'Pedidos',
                        'expanded' => false,
                        'resources' => [
                            \App\Nova\Cliente::class,
                            InternalLink::make([
                                'label' => 'Pendientes',
                                'badge' => null,
                                'icon' => null,
                                'target' => '_self',
                                'path' => '/resources/pedidos',
                                'params' => [ 'resourceId' => 1 ]
                            ]),
                            InternalLink::make([
                                'label' => 'Entregados',
                                'badge' => null,
                                'icon' => null,
                                'target' => '_self',
                                'path' => '/resources/pedidoentregados',
                                'params' => [ 'resourceId' => 1 ]
                            ]),
                        ]
                    ]),
                ]
            ])
        ];
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
