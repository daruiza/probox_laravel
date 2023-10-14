<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

use App\Http\Controllers\Api\AuthController;
use App\Query\Abstraction\IAuthQuery;
use App\Query\Request\AuthQuery;


use App\Http\Controllers\Api\UserController;
use App\Query\Abstraction\IUserQuery;
use App\Query\Request\UserQuery;

use App\Http\Controllers\Api\GeneralListController;
use App\Query\Abstraction\IGeneralListQuery;
use App\Query\Request\GeneralListQuery;

use App\Http\Controllers\Api\ModuleController;
use App\Query\Abstraction\IModuleQuery;
use App\Query\Request\ModuleQuery;

use App\Http\Controllers\Api\RolController;
use App\Query\Abstraction\IRolQuery;
use App\Query\Request\RolQuery;

use App\Http\Controllers\Api\OptionController;
use App\Query\Abstraction\IOptionQuery;
use App\Query\Request\OptionQuery;

use App\Http\Controllers\Api\OptionRolController;
use App\Query\Abstraction\IOptionRolQuery;
use App\Query\Request\OptionRolQuery;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(IAuthQuery::class, AuthQuery::class);
        $this->app->make(AuthController::class);

        $this->app->bind(IUserQuery::class, UserQuery::class);
        $this->app->make(UserController::class);

        $this->app->bind(IGeneralListQuery::class, GeneralListQuery::class);
        $this->app->make(GeneralListController::class);

        $this->app->bind(IModuleQuery::class, ModuleQuery::class);
        $this->app->make(ModuleController::class);

        $this->app->bind(IRolQuery::class, RolQuery::class);
        $this->app->make(RolController::class);

        $this->app->bind(IOptionQuery::class, OptionQuery::class);
        $this->app->make(OptionController::class);

        $this->app->bind(IOptionRolQuery::class, OptionRolQuery::class);
        $this->app->make(OptionRolController::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
    }
}
