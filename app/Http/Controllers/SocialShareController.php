<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Share;
use App\Models\Resource;

class SocialShareController extends Controller
{
    public function shareResource($slug)
    {
        $resource = Resource::where('slug', $slug)->firstOrFail();

        $url = route('resourceDetails', $resource->slug);
        $title = $resource->title;
        $image = urlencode(asset('/images/main/' . $resource->banner_image));
        $description = urlencode($resource->short_description);





        // Customize the share links
       $facebookLink = '<a href="https://www.facebook.com/sharer/sharer.php?u=' . $url . '" target="_blank">Facebook</a>';
$twitterLink = '<a href="https://twitter.com/intent/tweet?url=' . $url . '&text=' . urlencode($title) . '" target="_blank">Twitter</a>';
$linkedinLink = '<a href="https://www.linkedin.com/shareArticle?mini=true&url=' . $url . '&title=' . urlencode($title) . '" target="_blank">LinkedIn</a>';
$telegramLink = '<a href="https://telegram.me/share/url?url=' . $url . '&text=' . urlencode($title) . '" target="_blank">Telegram</a>';
$whatsappLink = '<a href="https://api.whatsapp.com/send?text=' . urlencode($title) . '%20' . $url . '" target="_blank">WhatsApp</a>';

$share = $facebookLink . ' ' . $twitterLink . ' ' . $linkedinLink . ' ' . $telegramLink . ' ' . $whatsappLink;

        // Ensure $resource is passed to the view
        return view('frontend.resource.details', compact('resource', 'share', 'description', 'image'));
    }
}
