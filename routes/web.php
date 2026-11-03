<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\SocialShareController;
use App\Http\Controllers\Admin\DownloadController;




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

Auth::routes();



Route::group(['namespace' => 'Admin', 'middleware' => 'auth', 'prefix' => 'admin'], function () {

  /*
  
    *Dashboard 
  */
  Route::get('dashboard', 'DashboardController@index')->name('dashboard');

  Route::put('dashboard/save/{id}', 'DashboardController@update')->name('dashboard.save');

  Route::resource('testimonial', 'TestimonialController');

  Route::resource('pages', 'PagesController');

  Route::resource('slider', 'SliderController');
  Route::post('/slider-sortable', 'SliderController@updateSortOrder')->name('slider-sortable');


  Route::resource('service', 'ServiceController');

  Route::post('/service-sortable', 'ServiceController@updateSortOrder')->name('service-sortable');

  Route::resource('permission', 'PermissionController');
  Route::resource('role', 'RoleController');
  Route::resource('user', 'UserController');
  Route::resource('resource','ResourceController');
  Route::resource('client', 'ClientController');
  Route::resource('teams', 'TeamsController');
  Route::resource('leaders','LeaderController');
  Route::resource('faq','FAQController');
  Route::resource('projects','ProjectController');
  Route::resource('customers','CustomerController');
  Route::resource('career', 'CareerController');
  Route::resource('product','ProductController');
  Route::post('/product-sortable', 'ProductController@updateSortOrder')->name('product-sortable');
   Route::resource('partner','PartnersController');
  Route::resource('training','TrainingController');
    Route::resource('trainer','TrainerController');
   Route::resource('download','DownloadController');
  Route::resource('category','DownloadCategoryController');
  Route::resource('microsoft-solution','MicrosoftSolutionController');
  Route::post('/microsoft-solution-sortable', 'MicrosoftSolutionController@updateSortOrder')->name('microsoft-solution-sortable');
  Route::get('microsoft-solution-enquiries', 'MicrosoftSolutionEnquiryController@index')->name('microsoft-solution-enquiries');
  Route::get('microsoft-solution-enquiry/{id}', 'MicrosoftSolutionEnquiryController@show')->name('microsoft-solution-enquiry.show');
  Route::delete('microsoft-solution-enquiry/{id}', 'MicrosoftSolutionEnquiryController@destroy')->name('microsoft-solution-enquiry.destroy');

  Route::resource('google-cloud-solution','GoogleCloudSolutionController');
  Route::post('/google-cloud-solution-sortable', 'GoogleCloudSolutionController@updateSortOrder')->name('google-cloud-solution-sortable');
  Route::get('google-cloud-solution-enquiries', 'GoogleCloudSolutionEnquiryController@index')->name('google-cloud-solution-enquiries');
  Route::get('google-cloud-solution-enquiry/{id}', 'GoogleCloudSolutionEnquiryController@show')->name('google-cloud-solution-enquiry.show');
  Route::delete('google-cloud-solution-enquiry/{id}', 'GoogleCloudSolutionEnquiryController@destroy')->name('google-cloud-solution-enquiry.destroy');

  Route::get('enquiry/lists', 'EnquiryController@enquiryList')->name('enquiryList');
  Route::delete('enquiry/remove/{id}', 'EnquiryController@removeEnquiry')->name('userenquiry.destroy');

  Route::get('quote/lists', 'RequestQuoteController@quoteList')->name('quoteList');
  Route::delete('quote/remove/{id}', 'RequestQuoteController@removeQuote')->name('request.destroy');
  
  Route::get('careerDetail/lists', 'CareerDetailController@detailList')->name('detailList');
  Route::delete('careerDetail/remove/{id}', 'CareerDetailController@removeDetail')->name('removeDetail');
   

Route::get('/cv/{filename}', 'CareerDetailController@viewCV')->name('viewCV');
  
  
    Route::get('trainingDetail/lists', 'TrainingDetailController@trainingDetail')->name('trainingDetail');
    Route::delete('trainingDetail/remove/{id}', 'TrainingDetailController@removetrainingDetail')->name('removetrainingDetail');


});

// <---------------Frontend------------------->
Route::group(['namespace' => 'Frontend'], function () {
  /*
   *Home Page Index page
   */

  Route::get('/', 'HomeController@index')->name('home');
  
 Route::get('sitemap', 'HomeController@sitemap')->name('sitemap');
  Route::get('teams', 'HomeController@teams')->name('teams');
  Route::get('testimonials','HomeController@testimonials')->name('testimonials');
  Route::get('customers','HomeController@customers')->name('customers');
  Route::get('resource', 'HomeController@resourceList')->name('resourceList');
  
  Route::get('search','HomeController@search')->name('search');
  Route::get('resource/{slug}', 'HomeController@resourceDetails')->name('resourceDetails');

  Route::get('service', 'HomeController@serviceList')->name('serviceList');
  Route::get('service/{slug}', 'HomeController@serviceDetails')->name('serviceDetails');
  
  Route::get('partners', 'HomeController@partnerList')->name('partnerList');

  Route::get('product','HomeController@productList')->name('productList');
  Route::get('emsisoft', 'HomeController@emsisoft')->name('emsisoft');
  Route::get('microsoft-solutions','HomeController@microsoftSolutions')->name('microsoftSolutions');
  Route::post('microsoft-solution-enquiry/save', 'HomeController@saveMicrosoftEnquiry')->name('saveMicrosoftEnquiry');
  Route::get('google-cloud-services','HomeController@googleCloudServices')->name('googleCloudServices');
  Route::post('google-cloud-solution-enquiry/save', 'HomeController@saveGoogleCloudEnquiry')->name('saveGoogleCloudEnquiry');
   Route::get('tools','HomeController@tools')->name('tools');
  
  Route::get('projects', 'HomeController@projectList')->name('projectList');
  Route::get('project/{slug}', 'HomeController@projectDetails')->name('projectDetails');
  
  Route::post('contact-us/save', 'HomeController@saveEnquiry')->name('enquirySave');
  Route::get('/request-quotes', 'HomeController@requestquote')->name('requestQuotes');
 Route::post('request-quote/save', 'HomeController@saveQuote')->name('quoteSave');
  
 Route::get('career', 'HomeController@careerList')->name('careerList');
 Route::get('career/{slug}', 'HomeController@careerDetails')->name('careerDetails');
 Route::post('careerdetail/save', 'HomeController@savedetail')->name('savedetail'); 
  
 Route::get('training','HomeController@trainingList')->name('trainingList');
 Route::get('training/{slug}','HomeController@trainingDetails')->name('trainingDetails');

 Route::post('trainingdetail/save','HomeController@saveTraining')->name('saveTraining');
  
   Route::get('/generate-hash', 'HashToolController@index')->name('generate.hash');
    Route::post('/generate-hash', 'HashToolController@generateHash')->name('generate.hash.post');
     Route::get('/match-hash', 'HashToolController@matchHashPage')->name('match.hash');
    Route::post('/match-hash', 'HashToolController@matchHash')->name('match.hash.post');
  
  //Route::get('downloads','HomeController@downloads')->name('downloads');
  
  Route::get('downloads/{category:slug?}', 'HomeController@downloads')->name('downloads');
  Route::get('/uploads/{filename}', [DownloadController::class, 'viewDownload'])->name('viewDownload');
  
Route::get('/IPv4-calculator', 'SubnetCalculatorController@showForm')->name('subnet.form');
Route::post('/calculate-IPv4subnet', 'SubnetCalculatorController@calculateSubnet')->name('calculate.subnet');

Route::get('/passwordgenerator', 'PasswordGeneratorController@generate')->name('password.generator'); 
Route::post('/passwordgenerator/generate', 'PasswordGeneratorController@generate')->name('password.generate'); 

  // ----dynamic Pages------>
  Route::get('{slug}', 'HomeController@dynamicPages')->name('getPages');


   Route::get('share-resource/{slug}', [SocialShareController::class, 'shareResource'])->name('shareResource');
  


 // Route::get('/sitemap', function () {
  //   $exitCode = Artisan::call('sitemap:generate');
  // return 'Sitemap.xml successfully Created';
   //}); 



});

