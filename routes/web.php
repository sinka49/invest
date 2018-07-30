<?php
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
$localization = new LaravelLocalization();




Route::post('/', "IndexController@answer");
Route::post('ru/search', "IndexController@search");
Route::post('en/search', "IndexController@search");
Route::post('/direct', 'PageController@directCommunicationSend');
Route::post('feedBack', 'PageController@feedBackSend');
Route::post('/messages/project', "PageController@projectSend");

Route::post('/admin/add/articles/{id?}','Admin\ArticleController@add');
Route::post('/admin/add/pages/{id?}','Admin\PagesController@add');
Route::post('/admin/add/projects/{id?}','Admin\ProjectsController@add');
Route::post('/admin/search/news','Admin\NewsController@search');
Route::post('/admin/search/articles','Admin\ArticleController@search');
Route::post('/admin/search/pages','Admin\PagesController@search');
Route::post('/admin/search/projects','Admin\ProjectsController@search');
Route::post('admin/settings/opros', 'Admin\PollsController@add');
Route::post('admin/settings/add/link', 'Admin\LinksController@add');
Route::post('admin/settings/menu/add', 'Admin\MenuController@add');
Route::post('/admin/settings/menu/remove', 'Admin\MenuController@remove');
Route::post('/admin/settings/menu/edit', 'Admin\MenuController@edit');
Route::post('admin/settings/ad', 'Admin\AdsController@add');
Route::post('admin/settings/mail/send', 'Admin\MailController@send');
Route::post('admin/settings/slide', 'Admin\SlidesController@add');
Route::post('/mail', 'MailController@add');
Route::post('/admin/add/news/{id?}','Admin\NewsController@add');
Route::post('/admin/change/Bigslider/slide2','Admin\SlidesController@slide2Add');
Route::post('/admin/slider/mediaslider', 'Admin\SlidesController@setSlider');
Route::post('/admin/change/Bigslider/slide1','Admin\SlidesController@slide1Add');
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function()
{

    Auth::routes();
    Route::get('/logout','Admin\IndexController@logout');
    Route::get('/register','Admin\IndexController@login');
    Route::get('/', "IndexController@index");
    Route::get('/news', 'NewsController@index');
    Route::get('/newsJson', 'NewsController@getNewItems');
    Route::get('/news/{id?}', 'NewsController@getItem');
    Route::get('/logistika', function () {
        return view('logistika');
    });
    Route::get('/investment_project', function () {
        return view('investment_project');
    });
    Route::get('/support', function () {
        return view('support');
    });
    Route::get('/direct', 'PageController@directCommunication');

    Route::get('/parseMkala', 'ParserController@index');

    Route::get('feedBack', 'PageController@feedBack');



    Route::get('/page/{id}', 'PageController@page');
    Route::get('/pp', 'PageController@pp');
    Route::get('/search', 'PageController@search');


   /* Route::get('/documents', function () {
        return view('documents');
    });
*/
/*ADMIN*/


    Route::get('/admin/home', function () {
        return view('admin.admMain');
    });

    Route::get('/admin/edit/news/{id?}', 'Admin\NewsController@edit');
    Route::get('admin/remove/news/{id?}','Admin\NewsController@remove');

    Route::get('/admin/edit/articles/{id?}', 'Admin\ArticleController@edit');
    Route::get('admin/remove/articles/{id?}','Admin\ArticleController@remove');

    Route::get('/admin/edit/pages/{id?}', 'Admin\PagesController@edit');
    Route::get('admin/remove/pages/{id?}','Admin\PagesController@remove');

    Route::get('/admin/edit/projects/{id?}', 'Admin\ProjectsController@edit');
    Route::get('admin/remove/projects/{id?}','Admin\ProjectsController@remove');


    Route::get('/admin/change/news', 'Admin\NewsController@change');

    Route::get('/admin/change/docs', function () {
        return view('admin.editDocs');
    });

    Route::get('/admin/change/media','Admin\SlidesController@index');
    Route::get('/admin/change/mediaRed','Admin\SlidesController@indexChange');

    Route::get('/admin/change/settingSlider','Admin\SlidesController@slideChange');


    Route::get('/admin/change/settingMediaSlider', 'Admin\SlidesController@mainSlider');


    Route::get('/admin/change/articles', 'Admin\ArticleController@change');
    Route::get('/admin/docs/remove/{id}', 'Admin\ArticleController@removeD');

    Route::get('/admin/change/pages', 'Admin\PagesController@change');
    Route::get('/admin/docs/remove/p/{id}', 'Admin\PagesController@removeD');

    Route::get('admin/change/projects','Admin\ProjectsController@change');

    Route::get('admin/settings/opros', 'Admin\PollsController@index');

    Route::get('admin/settings/red', function () {
        return view('admin.redMenu');
    });

    Route::get('admin/settings/opros/remove/{id}', 'Admin\PollsController@remove');

    Route::get('admin/settings/usefullink', 'Admin\LinksController@index');

    Route::get('admin/settings/remove/link/{id?}', 'Admin\LinksController@remove');


    Route::get('admin/settings/menu', 'Admin\MenuController@index');
    Route::get('admin/settings/mail', 'Admin\MailController@index');

    Route::get('admin/settings/ad', 'Admin\AdsController@index');
    Route::get('admin/settings/ad/remove/{id}', 'Admin\AdsController@remove');

    Route::get('admin/settings/slide/{id?}', 'Admin\SlidesController@index');
    Route::get('admin/settings/slideremove', 'Admin\SlidesController@remove');

    Route::get('admin/notification/window', 'Admin\MessagesController@window');
    Route::get('admin/notification/search/{keyword?}', 'Admin\MessagesController@search');
    Route::get('admin/notification/goinvest', 'Admin\MessagesController@goinvest');
    Route::get('admin/notification/directcommunication', 'Admin\MessagesController@directcommunication');
    Route::get('admin/messages/checked/{id}', 'Admin\MessagesController@checked');
    Route::get('admin/messages/remove/{id}', 'Admin\MessagesController@remove');


    /*СТАТЬИ ыыы*/
    Route::get('/article/{id?}', 'ArticleController@item');

    Route::get('/articles/{id?}','ArticleController@index');



    Route::get('/projects/{id?}','ProjectsController@index');

    Route::get('/project/{id?}', 'ProjectsController@item');



    /*Изображения*/

    Route::get('/admin/image/news/remove/{id}', 'Admin\NewsController@remImg');
    Route::get('/admin/image/projects/remove/{id}', 'Admin\ProjectsController@remImg');
    Route::get('/admin/image/articles/remove/{id}', 'Admin\ArticleController@remImg');

});


