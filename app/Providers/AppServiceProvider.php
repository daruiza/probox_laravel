<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

use App\Http\Controllers\Api\AuthController;
use App\Query\Abstraction\IAuthQuery;
use App\Query\Request\AuthQuery;

use App\Http\Controllers\Api\UploadController;
use App\Query\Abstraction\IUploadQuery;
use App\Query\Request\UploadQuery;

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

use App\Http\Controllers\Api\CommerceController;
use App\Query\Abstraction\ICommerceQuery;
use App\Query\Request\CommerceQuery;

use App\Http\Controllers\Api\ProjectController;
use App\Query\Abstraction\IProjectQuery;
use App\Query\Request\ProjectQuery;

use App\Http\Controllers\Api\TagController;
use App\Query\Abstraction\ITagQuery;
use App\Query\Request\TagQuery;

use App\Http\Controllers\Api\ProjectTagController;
use App\Query\Abstraction\IProjectTagQuery;
use App\Query\Request\ProjectTagQuery;

use App\Http\Controllers\Api\DocumentController;
use App\Query\Abstraction\IDocumentQuery;
use App\Query\Request\DocumentQuery;

use App\Http\Controllers\Api\NoteController;
use App\Query\Abstraction\INoteQuery;
use App\Query\Request\NoteQuery;

use App\Http\Controllers\Api\CustomerController;
use App\Query\Abstraction\ICustomerQuery;
use App\Query\Request\CustomerQuery;

use App\Http\Controllers\Api\ColaboratorController;
use App\Query\Abstraction\IColaboratorQuery;
use App\Query\Request\ColaboratorQuery;

use App\Http\Controllers\Api\EvidenceController;
use App\Query\Abstraction\IEvidenceQuery;
use App\Query\Request\EvidenceQuery;

use App\Http\Controllers\Api\TaskController;
use App\Query\Abstraction\ITaskQuery;
use App\Query\Request\TaskQuery;

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

        $this->app->bind(IUploadQuery::class, UploadQuery::class);
        $this->app->make(UploadController::class);

        $this->app->bind(IGeneralListQuery::class, GeneralListQuery::class);
        $this->app->make(GeneralListController::class);

        $this->app->bind(IUserQuery::class, UserQuery::class);
        $this->app->make(UserController::class);

        $this->app->bind(IModuleQuery::class, ModuleQuery::class);
        $this->app->make(ModuleController::class);

        $this->app->bind(IRolQuery::class, RolQuery::class);
        $this->app->make(RolController::class);

        $this->app->bind(IOptionQuery::class, OptionQuery::class);
        $this->app->make(OptionController::class);

        $this->app->bind(IOptionRolQuery::class, OptionRolQuery::class);
        $this->app->make(OptionRolController::class);

        $this->app->bind(ICommerceQuery::class, CommerceQuery::class);
        $this->app->make(CommerceController::class);

        $this->app->bind(IProjectQuery::class, ProjectQuery::class);
        $this->app->make(ProjectController::class);

        $this->app->bind(ITagQuery::class, TagQuery::class);
        $this->app->make(TagController::class);

        $this->app->bind(IProjectTagQuery::class, ProjectTagQuery::class);
        $this->app->make(ProjectTagController::class);

        $this->app->bind(IDocumentQuery::class, DocumentQuery::class);
        $this->app->make(DocumentController::class);

        $this->app->bind(INoteQuery::class, NoteQuery::class);
        $this->app->make(NoteController::class);

        $this->app->bind(ICustomerQuery::class, CustomerQuery::class);
        $this->app->make(CustomerController::class);

        $this->app->bind(IColaboratorQuery::class, ColaboratorQuery::class);
        $this->app->make(ColaboratorController::class);

        $this->app->bind(IEvidenceQuery::class, EvidenceQuery::class);
        $this->app->make(EvidenceController::class);

        $this->app->bind(ITaskQuery::class, TaskQuery::class);
        $this->app->make(TaskController::class);
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
