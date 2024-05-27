<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index($username)
    {
        $user = User::where("username", $username)->first();
        $tags = Tag::where('user_id', $user->id)->get();

        // // $language = (strtolower($Country) == 'germany') ? 'de' : 'en';
        // // session(['language' => 'en']);
        // // Session::set('language', 'en');
        // // $language = Session::get('language');
        // if (session_status() === PHP_SESSION_NONE) {
        //     session_start();
        // }

        // $isQueryParam = false;
        // if (isset($_GET['language']) && trim($_GET['language']) != '') {
        //     $language = trim($_GET['language']);
        //     $isQueryParam = true;
        // } else {
        //     $language = $_SESSION['language'] = 'de'; //session('language');
        //     // $language =isset($_SESSION['language']) ? $_SESSION['language'] : 'de'; //session('language');
        // }
        // // pre_print($language);

        // // $viewData = Cache::remember('profile-' . $request->username, 1, function () use ($request, $language) {

        // $no_record_found = false;
        // $brand_name = '';
        // $user = $Obj = User::where('username', $request->username);
        // if ($user->count() == 0) {
        //     // die('Error: Invalid username');
        //     $str_code = $request->username;
        //     $code = $UniqueCode = UniqueCode::where('str_code', $str_code);
        //     if ($code->count() == 0) {
        //         // die('Error: Invalid request.');
        //         $no_record_found = true;
        //     }

        //     if ($no_record_found == false) {

        //         $code = $code->first();

        //         if (date('Y-m-d', strtotime($code->expires_on)) == date('Y-m-d')) {
        //             $code->activated = 0;
        //             $code->user_id = 0;
        //             $code->updated_by = -1;
        //             $code->save();
        //         }

        //         if ($code->user_id == 0) {
        //             // die('Error: Invalid request.');
        //             $no_record_found = true;
        //         }

        //         if ($code->status == 0) {
        //             // die('Error: Invalid request.');
        //             $no_record_found = true;
        //         }

        //         $Obj = User::where('id', $code->user_id);
        //         if ($Obj->count() == 0) {
        //             // die('Error: Invalid request.');
        //             $no_record_found = true;
        //         } else {
        //             $brand_name = $code->brand;
        //         }
        //     }
        // }

        // $user = $Obj = $Obj->first();
        // $user_group_id = 0;
        // if (isset($user->status) && $user->status == 0) {
        //     $no_record_found = true;
        //     $user_group_id = $user->user_group_id;
        // }

        // if ($no_record_found) {
        //     if (strtolower(config("app.name", "")) == 'addmee') {
        //         if ((isset($UniqueCode) && $UniqueCode->count() != 0 && $code->device != '' && in_array($code->device, ['c', 'cc'])) || $user_group_id == 3) {
        //             $username = 'addmeebusiness';
        //             //
        //         } else {
        //             $username = 'addmee';
        //         }
        //     } else {
        //         $username = 'tapmee';
        //     }

        //     $user = $Obj = User::where('username', $username);

        //     if ($user->count() == 0) {
        //         die('Invalid Request.');
        //     } else {
        //         return redirect()->away(main_url() . '/' . $username);
        //         // return ['hasRedirect' => true, 'redirectURL' => main_url() . '/' . $username];
        //     }
        // }

        // // user change here
        // $template = anyTemplateAssigned($user->id);
        // //  $template = anyTemplateAssignedProfile($user->id);
        // $user = UserObj($user, 0, $template);

        // $is_business = $user->profile_view == 'business' ? 1 : 0;
        // $ContactCard = ContactCard::where('user_id', $user->id)->where('is_business', $is_business)->where('customer_profile_ids', '!=', '0')->count();
        // $BusinessInfo = BusinessInfo::where('user_id', $user->id)->first();

        // $BusinessUser = BusinessUser::where('user_id', $user->id);
        // if ($BusinessUser->count() > 0) {
        //     $BusinessUser = $BusinessUser->first();
        //     $parent_id = $BusinessUser->parent_id;
        //     if ($parent_id != 0) {
        //         $parentUser = User::where('id', $parent_id);
        //         if ($parentUser->count() > 0) {
        //             $parentUser = $parentUser->first();
        //             if ($parentUser->status == 0) {
        //                 return redirect()->away(main_url() . '/addmeebusiness');
        //                 // return ['hasRedirect' => true, 'redirectURL' => main_url() . '/addmeebusiness'];
        //             }
        //         }
        //     }
        // }

        // $language = ($language == '') ? 'en' : $language;
        // $language = !in_array($language, ['de', 'en']) ? 'en' : $language;
        // $profiles = $this->meta($request, $Obj, '', $language);
        // $brand_profiles = $brand_name != '' ? $this->meta($request, $Obj, $brand_name, $language) : [];
        // $brand = [];
        // if ($brand_name != '') {
        //     $brand = User::where('username', $brand_name)->first();
        //     if (!empty($brand)) {
        //         $brand_name = isset($brand->company_name) ? $brand->company_name : '';
        //         $brand_name = trim($brand_name) == '' ? $brand->first_name . ' ' . $brand->last_name : $brand_name;
        //         $brand_name = trim($brand_name) == '' ? $brand->name : $brand_name;
        //         $brand_name = trim($brand_name) == '' ? $brand->username : $brand_name;
        //     }
        // }
        // //  pre_print($profiles);



        // $blur = 'blurOn';
        // if (!empty($Obj) && $Obj->is_public == 2) {
        //     $blur = 'blurOff';
        // } else if (!empty($Obj) && $Obj->is_public == 0 && $Obj->profile_view == 'personal') {
        //     $blur = 'blurOff';
        // } else if (!empty($BusinessInfo) && $BusinessInfo->is_public == 0 && $Obj->profile_view == 'business') {
        //     $blur = 'blurOff';
        // }

        // if ($blur != 'blurOff') {
        //     // pre_print($profiles);
        //     // if (!empty($profiles) && isset($profiles[0]->open_direct) && $profiles[0]->open_direct == 1) {
        //     if (!empty($profiles) && $user->open_direct == 1) {
        //         return redirect()->away($profiles[0]->profile_link);
        //         // return ['hasRedirect' => true, 'redirectURL' => $profiles[0]->profile_link];
        //     }
        // }

        // // pre_print($user);
        // $has_subscription = chk_subscription($Obj);
        // if ($has_subscription['success'] == false) {
        //     unset($user->company_address);
        // }

        // $full_name = $user->first_name == '' && $user->last_name == '' ? $user->name : $user->first_name . ' ' . $user->last_name;
        // $this->page_title = $full_name . ' | ' . ucwords(config('app.name', 'AddMee'));
        // // $UserSettings = UserSettings::where('user_id', $user->id)->first();
        // $UserSettings = userSettingsObj_Old($user->id, $template);
        // //pre_print($UserSettings);
        // if (count($UserSettings) > 0) {
        //     $UserSettings = (object) $UserSettings;
        //     $settings = [
        //         'bg_color' => notEmpty($UserSettings->bg_color) ? $UserSettings->bg_color : 'rgba(255, 255, 255, 1)',
        //         'bg_image' => notEmpty($UserSettings->bg_image) ? icon_url() . $UserSettings->bg_image : NULL,
        //         'btn_color' => notEmpty($UserSettings->btn_color) ? $UserSettings->btn_color : 'rgba(0, 0, 0, 1)',
        //         'text_color' => notEmpty($UserSettings->text_color) ? $UserSettings->text_color : 'rgba(17, 24, 3, 1)',
        //         'color_link_icons' => notEmpty($UserSettings->color_link_icons) ? $UserSettings->color_link_icons : 0,
        //         'photo_border_color' => notEmpty($UserSettings->photo_border_color) ? $UserSettings->photo_border_color : 'rgba(255, 255, 255, 1)',
        //         // 'section_color' => notEmpty($UserSettings->section_color) ? $UserSettings->section_color : 'rgba(255, 255, 255, 0)',
        //         'section_color' => notEmpty($UserSettings->section_color) ? $UserSettings->section_color : 'rgba(255, 255, 255, 1)',
        //         'show_contact' => $UserSettings->show_contact,
        //         'show_connect' => $UserSettings->show_connect,
        //         'capture_lead' => $UserSettings->capture_lead,
        //     ];

        //     // if ($settings['bg_color'] != '#fff' && $settings['bg_color'] != '#ffffff') {
        //     // list($r, $g, $b) = sscanf($settings['bg_color'], "#%02x%02x%02x");
        //     // $settings['bg_color'] = "rgba($r, $g, $b, 1)";
        //     // $settings['innser_section_bg_color'] = "rgba($r, $g, $b, 1)";
        //     // }

        //     if (strtolower($settings['section_color']) != '#fff' && strtolower($settings['section_color']) != '#ffffff') {
        //         list($r, $g, $b) = sscanf($settings['section_color'], "#%02x%02x%02x");
        //         // $settings['focused_profile_color'] = "rgba(255,255,255,0.2)";
        //     }

        //     if ($settings['text_color'] == '') {
        //         unset($settings['text_color']);
        //     }
        // } else {
        //     $settings = ['bg_color' => '#f8f8f8', 'btn_color' => '#000000', 'photo_border_color' => '#ffffff', 'section_color' => '#ffffff', 'bg_image' => '', 'show_contact' => 1, 'show_connect' => 1, 'capture_lead' => 0];
        // }

        // $settings['focused_profile'] = isset($settings['section_color']) ? $settings['section_color'] : '#FFFFFF';
        // $settings['focused_profile_bg'] = 'rgba(255, 255, 255, 0.2)';
        // if (strtolower($settings['focused_profile']) == '#ffffff' || strtolower($settings['focused_profile']) == '#fff') {
        //     $settings['focused_profile_bg'] = 'rgb(248, 250, 252)';
        // }

        // if (isset($settings['text_color']) && ($settings['text_color'] == '#000000' || $settings['text_color'] == 'rgba(17, 24, 3, 1)')) {
        //     unset($settings['text_color']);
        // }

        // $settings['full_width_btn'] = 0;
        // if ((isset($settings['show_contact']) && $settings['show_contact'] == 0) || (isset($settings['show_contact']) && $settings['show_connect'] == 0)) {
        //     $settings['full_width_btn'] = 1;
        // }
        // // pre_print($settings);

        // $viewData = ['profiles' => $profiles, 'brand_profiles' => $brand_profiles, 'BusinessInfo' => $BusinessInfo, 'profile' => $user, 'blurOff' => $blur, 'brand_name' => $brand_name, 'brand' => $brand, 'ContactCard' => $ContactCard, 'page_title' => $this->page_title, 'language' => $language, 'settings' => $settings, 'hasRedirect' => false];
        // // return $viewData; //view('profiles', $viewData);
        // // });
        // // pre_print($viewData);
        // // if (isset($viewData['hasRedirect']) && $viewData['hasRedirect'] == true) {
        // //     return redirect()->away($viewData['redirectURL']);;
        // // }

        // $iPod = stripos($_SERVER['HTTP_USER_AGENT'], "iPod");
        // $iPhone = stripos($_SERVER['HTTP_USER_AGENT'], "iPhone");
        // $iPad = stripos($_SERVER['HTTP_USER_AGENT'], "iPad");
        // $webOS = stripos($_SERVER['HTTP_USER_AGENT'], "webOS");
        // $Android = stripos($_SERVER['HTTP_USER_AGENT'], "Android");

        // $isIOS = false;
        // if ($iPod || $iPhone) {
        //     //browser reported as an iPhone/iPod touch -- do something here
        //     $isIOS = true;
        // } else if ($iPad) {
        //     //browser reported as an iPad -- do something here
        //     $isIOS = true;
        // }

        // $viewData['language_text'] = $this->lang($language);
        // $viewData['isIOS'] = $isIOS;
        // $viewData['Android'] = $Android;
        // $viewData['isQueryParam'] = $isQueryParam;
        // //pre_print($viewData);
        return view('public-profile', ['user' => $user, 'tags' => $tags]);
    }
}
