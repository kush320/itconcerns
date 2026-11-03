<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schema;

use App\Models\Customers;
use App\Models\Projects;
use App\Models\Resource;
use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Testimonial;
use App\Models\Page;
use App\Models\Service;
use App\Models\Client;
use App\Models\Teams;
use App\Models\Leader;
use App\Models\FAQ;
use App\Models\ContactUs;
use App\Mail\SendEmail;
use App\Mail\ContactEmail;
use App\Mail\CareerEmail;
use App\Mail\TrainingEmail;
use App\Mail\SendThankYouEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Share;
use App\Models\RequestQuote;

use App\Rules\ReCaptchaV3;
use App\Models\Career;
use App\Models\CareerDetail;
use App\Models\Products;
use App\Models\Partners;
use App\Models\Training;
use App\Models\Trainer;
use App\Models\TrainingDetail;
use App\Models\Download;
use App\Models\DownloadCategory;
use App\Models\MicrosoftSolution;
use App\Models\MicrosoftSolutionEnquiry;
use App\Models\GoogleCloudSolution;
use App\Models\GoogleCloudSolutionEnquiry;


class HomeController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $data['sliders'] = Slider::where('published', 1)->orderBy('updated_at', 'desc')->get();
    $data['services'] = Service::where('published', 1)->orderBy('updated_at', 'desc')->get();
    $data['testimonials'] = Testimonial::where('published', 1)->orderBy('updated_at', 'desc')->take(5)->get();
    $data['resources'] = Resource::where('published', 1)->orderBy('updated_at', 'desc')->paginate(6);
    $data['clients'] = Client::where('published', 1)->orderBy('updated_at', 'desc')->take(4)->get();
    $data['requestQuotes'] = RequestQuote::get();
    $data['projects'] = Projects::where('published', 1)->orderBy('updated_at', 'desc')->get();
    $data['customers'] = Customers::where('published', 1)->orderBy('updated_at', 'desc')->take(4)->get();
    return view('frontend.index', $data);
  }
  public function sitemap()
  {
      $services = Service::where('published', 1)->orderBy('updated_at', 'desc')->get(); 
      $resources = Resource::where('published', 1)->orderBy('updated_at', 'desc')->get();
      $careers = Career::where('published', 1)->orderBy('updated_at', 'desc')->get(); 
      $partners = Partners::where('published', 1)->orderBy('updated_at', 'desc')->get();
      $trainings = Training::where('published', 1)->orderBy('updated_at', 'desc')->get();
      $downloads = Download::where('published', 1)->orderBy('updated_at', 'desc')->get();;
      $products = Products::where('published', 1)->orderBy('updated_at', 'desc')->get();
    
      return view('frontend.pages.sitemap', compact('services',  'resources', 'careers','partners','trainings','downloads','products'));
  }
  
  public function teams()
  {
    $teams = Teams::where('published', 1)->orderBy('updated_at', 'desc')->get();
    return view('frontend.teams', compact('teams'));
  }
  public function tools()
  {
      return view('frontend.pages.tools');
   }

  public function emsisoft()
  {
      return view('frontend.pages.emsisoft');
  }
  
  public function downloads(DownloadCategory $category = null)
    {
        // Get all published categories
        $download_categories = DownloadCategory::published()->get();

        // If a category is provided, select that; otherwise, use the first category
        $selectedCategory = $category ?? $download_categories->first();

        return view('frontend.pages.download', compact('download_categories', 'selectedCategory'));
    }

  public function testimonials()
  {
    $testimonials = Testimonial::where('published', 1)->orderBy('updated_at', 'desc')->get();
    return view('frontend.testimonial', compact('testimonials'));
  }
  public function faq()
  {
    $faqs = FAQ::where('published', 1)->orderBy('created_at', 'question')->get();
    return view('frontend.pages.faq', compact('faqs'));
  }
  
  public function serviceList()
  {
    try {
      $serviceImage = Service::where('published', 1)->inRandomOrder()->first();
      return view('frontend.service.list', compact('serviceImage', ));

    } catch (\Exception $e) {
      abort('404');
    }
  }
  public function serviceDetails($slug)
  {
      try {
          $details = Service::published()->where('slug', $slug)->firstOrFail();
          $relatedService = Service::where('published', 1)->where('id', '!=', $details->id)->orderBy('updated_at','desc')->get();
          $recentServices = Service::where('published', 1)->where('id', '!=', $details->id)->orderBy('updated_at', 'desc')->get();
         $service_id = $details->title;         
          return view('frontend.service.details', compact('details', 'relatedService', 'recentServices', 'service_id'));
      } catch (\Exception $e) {
          abort(404);
      }
  }

  public function partnerList()
{
    try {
        $details = Partners::where('published', 1)->orderBy('updated_at', 'desc')->get();
        $partnerImage = Partners::where('published', 1)->orderBy('updated_at','desc')->first();
        return view('frontend.pages.partners', compact('partnerImage','details' ));
    } catch (\Exception $e) {
        abort('404');
    }
}
  
  public function productList()
  {
    try {
      $details = Products::where('published', 1)->orderBy('position', 'asc')->get();
      $productImage = Products::where('published', 1)->orderBy('position', 'asc')->first();
      return view('frontend.products', compact('productImage','details' ));

    } catch (\Exception $e) {
      abort('404');
    }
  }

  public function microsoftSolutions()
  {
    try {
      $details = MicrosoftSolution::where('published', 1)->orderBy('position', 'asc')->get();
      return view('frontend.microsoft-solutions', compact('details'));
    } catch (\Exception $e) {
      abort('404');
    }
  }

  public function saveMicrosoftEnquiry(Request $request)
  {
    $request->validate([
      'full_name' => 'required|string|max:255',
      'business_email' => 'required|email|max:255',
      'organization_name' => 'required|string|max:255',
      'organization_size' => 'required|string',
      'microsoft_service' => 'required|string',
      'industry' => 'required|string',
      'domain_name' => 'required|string|max:255',
      'country' => 'required|string',
      'zip_code' => 'required|string|max:20',
      'phone_number' => 'required|string|max:20',
      'privacy_agreed' => 'required|accepted',
    ]);

    MicrosoftSolutionEnquiry::create([
      'full_name' => $request->full_name,
      'business_email' => $request->business_email,
      'organization_name' => $request->organization_name,
      'organization_size' => $request->organization_size,
      'microsoft_service' => $request->microsoft_service,
      'industry' => $request->industry,
      'domain_name' => $request->domain_name,
      'country' => $request->country,
      'zip_code' => $request->zip_code,
      'phone_number' => $request->phone_number,
      'privacy_agreed' => 1,
    ]);

    return response()->json(['success' => true, 'message' => 'Thank you for your enquiry! We will get back to you within 2-48 working hours.']);
  }

  public function googleCloudServices()
  {
    try {
      $details = GoogleCloudSolution::where('published', 1)->orderBy('position', 'asc')->get();
      return view('frontend.google-cloud-services', compact('details'));
    } catch (\Exception $e) {
      abort('404');
    }
  }

  public function saveGoogleCloudEnquiry(Request $request)
  {
    $request->validate([
      'full_name' => 'required|string|max:255',
      'business_email' => 'required|email|max:255',
      'organization_name' => 'required|string|max:255',
      'organization_size' => 'required|string',
      'google_cloud_service' => 'required|string',
      'industry' => 'required|string',
      'domain_name' => 'required|string|max:255',
      'country' => 'required|string',
      'zip_code' => 'required|string|max:20',
      'phone_number' => 'required|string|max:20',
      'privacy_agreed' => 'required|accepted',
    ]);

    GoogleCloudSolutionEnquiry::create([
      'full_name' => $request->full_name,
      'business_email' => $request->business_email,
      'organization_name' => $request->organization_name,
      'organization_size' => $request->organization_size,
      'google_cloud_service' => $request->google_cloud_service,
      'industry' => $request->industry,
      'domain_name' => $request->domain_name,
      'country' => $request->country,
      'zip_code' => $request->zip_code,
      'phone_number' => $request->phone_number,
      'privacy_agreed' => 1,
    ]);

    return response()->json(['success' => true, 'message' => 'Thank you for your enquiry! We will get back to you within 2-48 working hours.']);
  }
  
  public function trainingList()
  {
    try {
      $details = Training::where('published', 1)->orderBy('updated_at', 'desc')->get();

      if (is_null($details)) {
        abort('404');
      } else {


        return view('frontend.training.list', compact('details'));
      }
    } catch (\Exception $e) {
      abort('404');
    }
  }


  public function trainingDetails($slug)
  {
    try {
      $details = Training::published()->where('slug', $slug)->firstOrFail();
      $relatedTraining = Training::where('published', 1)->where('id', '!=', $details->id)->inRandomOrder()->take(5)->get();
      $recentTraining = Training::where('published', 1)->where('id', '!=', $details->id)->orderBy('updated_at', 'desc')->get();
      $training_id = $details->course_title;
      return view('frontend.training.details', compact('details', 'relatedTraining', 'recentTraining', 'training_id'));
    } catch (\Exception $e) {
      abort(404);
    }
  }
  
 public function careerList()
  {
    try {
      $details = Career::where('published', 1)->orderBy('updated_at', 'desc')->get();

      if (is_null($details)) {
        abort('404');
      } else {

        
        return view('frontend.career.list', compact('details'));
      }
    } catch (\Exception $e) {
      abort('404');
    }
  }
  
  public function careerDetails($slug)
  {
      try {
          $details = Career::published()->where('slug', $slug)->firstOrFail();
          $relatedCareer = Career::where('published', 1)->where('id', '!=', $details->id)->inRandomOrder()->take(5)->get();
          $recentCareer = Career::where('published', 1)->where('id', '!=', $details->id)->orderBy('updated_at', 'desc')->get();
          $career_id = $details->title;    
          return view('frontend.career.details', compact('details', 'relatedCareer','recentCareer','career_id'));
      } catch (\Exception $e) {
          abort(404);
      }
  }

  public function projectList()
  {
    try {
      $details = Projects::where('published', 1)->orderBy('updated_at', 'desc')->paginate(6);
      $projectImage = Projects::where('published', 1)->inRandomOrder()->first();

      $projects = Projects::where('published', 1)->get();

      if (is_null($details) || is_null($projectImage)) {
        abort('404');
      } else {
        return view('frontend.projects.list', compact('details', 'projectImage', 'projects'));
      }
    } catch (\Exception $e) {
      abort('404');
    }
  }




public function resourceList(Request $request)
{
    try {
        $details = Resource::where('published', 1)
            ->orderBy('updated_at', 'desc')
            ->paginate(6); 

        $resourceImage = Resource::where('published', 1)->inRandomOrder()->first();

        if ($request->ajax()) {
            $view = view('frontend.resource.partials.resource-list', compact('details'))->render();
            return response()->json([
                'html' => $view,
                'next_page' => $details->hasMorePages() ? $details->nextPageUrl() : null
            ]);
        }
        return view('frontend.resource.list', compact('details', 'resourceImage'));
    } catch (\Exception $e) {
        abort(404);
    }
}

public function search(Request $request)
{
    $query = $request->input('search');

    if (!$query) {
     
        return response()->json(['html' => '<p>No search term provided.</p>'], 400);
    }

    $resources = Resource::where('title', 'LIKE', "%{$query}%")
                         ->orWhere('description', 'LIKE', "%{$query}%")
                         ->get();

    if ($resources->isEmpty()) {
        return response()->json(['html' => '<p>No results found</p>']);
    }

    $html = view('frontend.resource.partials.resource-list', ['details' => $resources])->render();

    return response()->json(['html' => $html]);
}



public function resourceDetails($slug)
{
    try {
        $details = Resource::published()->where('slug', $slug)->firstOrFail();
        $relatedResources = Resource::where('published', 1)
            ->where('id', '!=', $details->id)
            ->orderBy('updated_at', 'desc')
            ->limit(5)
            ->get();
        $recentResources = Resource::where('published', 1)
            ->where('id', '!=', $details->id)
            ->orderBy('updated_at', 'desc')
            ->get();

        $url = route('resourceDetails', $details->slug);
        $title = $details->title;
        $description = urlencode($details->short_description);
        $image = urlencode(asset('/images/main/' . $details->banner_image));

       
        $facebookLink = 'https://www.facebook.com/sharer/sharer.php?u=' . $url;
        $twitterLink = 'https://twitter.com/intent/tweet?url=' . $url . '&text=' . urlencode($title);
        $linkedinLink = 'https://www.linkedin.com/shareArticle?mini=true&url=' . $url . '&title=' . urlencode($title);
        $telegramLink = 'https://telegram.me/share/url?url=' . $url . '&text=' . urlencode($title);
        $whatsappLink = 'https://api.whatsapp.com/send?text=' . urlencode($title) . '%20' . $url;

        $shareLinks = [
            'facebook' => $facebookLink,
            'twitter' => $twitterLink,
            'linkedin' => $linkedinLink,
            'telegram' => $telegramLink,
            'whatsapp' => $whatsappLink
        ];

        return view('frontend.resource.details', compact('details', 'relatedResources', 'recentResources', 'shareLinks'));
    } catch (\Exception $e) {
        return abort(404);
    }
}

  public function saveEnquiry(Request $request)
  {

    $request->validate([
      'name' => 'required|string',
      'email' => 'required|email',
      'phone' => 'required|int|digits:10',
      'message' => 'required|string',
      'g-recaptcha-response' => 'required',
    ]);

    ContactUs::create($request->all());
    Mail::to($request->input('email'))->send(new SendThankYouEmail());
      $fromAddress = config('mail.from.address');

        Mail::to($fromAddress)->send(new ContactEmail($request->all()));  

    return Redirect::back()->with('message', 'Thank you for contacting us... !!');
  }


  public function requestquote()
  {

    $services = Service::published()->get();
    $testimonials = Testimonial::all();
    $clients = Client::all();
    return view('frontend.request.quote', compact('testimonials', 'clients', 'services'));
  }

  public function saveQuote(Request $request)
    {
   
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|int|digits:10',
            'message' => 'required|string',
            'inquiry' => 'required|string',
            'g-recaptcha-response' => 'required',
        ]);

        RequestQuote::create($request->all());

        Mail::to($request->input('email'))->send(new SendThankYouEmail());
     
  $fromAddress = config('mail.from.address');

        Mail::to($fromAddress)->send(new SendEmail($request->all()));  
        return redirect()->back()->with('message', 'Thank you for Requesting Quote... !!');
    }

  public function saveDetail(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|int|digits:10',
            'message' => 'required|string',
            'address' => 'required|string',
            'cv' => 'required|mimes:pdf,doc,docx|max:2048'
        ]);
    
        if ($request->hasFile('cv')) {
            $uploadedFile = $request->file('cv');
            $fileName = time() . '_' . $uploadedFile->getClientOriginalName();
            $cvPath = public_path('cv');
            $uploadedFile->move($cvPath, $fileName);
            $data['cv'] = $fileName;
        }
    
        CareerDetail::create($data);
    
        Mail::to($data['email'])->send(new SendThankYouEmail());
    
        $fromAddress = config('mail.from.address');

        Mail::to($fromAddress)->send(new CareerEmail($request->all()));  
        return redirect()->back()->with('message', 'Thank you for submitting the form!');
    }
  


public function saveTraining(Request $request)
{
    $request->validate([
    'first_name' => 'required|string',
    'last_name' => 'required|string',
      'email' => 'required|email',
    'phone' => 'required|numeric|digits:10',
    'address' => 'required|string',
    'message' => 'required|string',
    'role' => 'required|string',
    'g-recaptcha-response' => 'required', 
]);

    try {
        TrainingDetail::create($request->all());

        Mail::to($request->email)->send(new SendThankYouEmail());
        $fromAddress = config('mail.from.address');
        Mail::to($fromAddress)->send(new TrainingEmail($request->all()));  

        return response()->json(['message' => 'Thank you for submitting the form!'], 200);
    } catch (\Exception $e) {
        Log::error('Error saving training details: ' . $e->getMessage());
        return response()->json(['message' => 'There was an error processing your request. Please try again later.'], 500);
    }
}





  
  public function dynamicPages($slug)
  {
    //for contact us
    if ($slug == 'contact-us') {
      $detail = Page::where('published', 1)->where('slug', $slug)->first();
      return view('frontend.pages.contactus', compact('detail'));
    }

    //for about us
    if ($slug == 'about-us') {
      try {
        $detail = Page::where('published', 1)->where('slug', $slug)->first();
        if ($detail) {
          $teams = Teams::where('published', 1)->get();
          $leaders = Leader::where('published', 1)->get();
          return view('frontend.pages.aboutus', compact('detail', 'teams', 'leaders'));
        }
      } catch (\Exception $ae) {
        // Continue to check database
      }
    }

    //for email marketing solution
    if ($slug == 'email-marketing-solution') {
      return view('frontend.pages.email-marketing-solution');
    }

    //for call center solution
    if ($slug == 'call-center-solution') {
      return view('frontend.pages.call-center-solution');
    }

    //for email security solution
    if ($slug == 'email-security-solution') {
      return view('frontend.pages.email-security-solution');
    }

    //for firewall as a service
    if ($slug == 'firewall-as-a-service') {
      return view('frontend.pages.firewall-as-a-service');
    }

    // Check if page exists in database
    try {
      $detail = Page::where('published', 1)->where('slug', $slug)->first();
      if ($detail) {
        return view('frontend.pages.dynamic', compact('detail'));
      }
    } catch (\Exception $e) {
      // Continue to 404
    }

    abort(404);
  }

  




}
