<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}


// app/Http/Controllers/YourController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Exception;

class YourController extends Controller
{
    public function addCustomProperty(Request $request)
    {
        try {
            $check_user = PlatformIntegration::where('platform_id', 1)->where('user_id', 15598)->first();

            if (!$check_user) {
                return response()->json(['error' => 'User not found'], 404);
            }

            $accessToken = $check_user->access_token;

            $propertyName = 'admee_owner_email';
            $propertyLabel = 'Addmee Owner Email';

            $existingCustomProperty = $this->getExistingCustomProperty($accessToken, $propertyName);

            if ($existingCustomProperty !== null) {
                return response()->json(['message' => "Custom property already exists: {$existingCustomProperty}"], 200);
            }

            $this->addCustomPropertyToContacts($accessToken, $propertyLabel, $propertyName);

            return response()->json(['message' => 'Custom property added successfully'], 200);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    private function getExistingCustomProperty($accessToken, $propertyName)
    {
        $endpoint = "https://api.hubapi.com/crm/v3/objects/contacts/properties/{$propertyName}";
        $client = new Client();

        try {
            $response = $client->get($endpoint, [
                'headers' => [
                    'Content-Type' => 'application/json',
                    'Authorization' => 'Bearer ' . $accessToken,
                ],
            ]);

            $statusCode = $response->getStatusCode();
            $responseData = json_decode($response->getBody(), true);

            if ($statusCode === 200 && isset($responseData['name'])) {
                return $responseData['name'];
            }

            return null;
        } catch (Exception $e) {
            return null;
        }
    }

    private function addCustomPropertyToContacts($accessToken, $propertyLabel, $propertyName)
    {
        $endpoint = "https://api.hubapi.com/crm/v3/objects/contacts/properties";
        $client = new Client();

        $data = [
            'name' => $propertyName,
            'label' => $propertyLabel,
            'type' => 'string',
            'default' => null,  // Set the default value to null
        ];

        try {
            $response = $client->post($endpoint, [
                'headers' => [
                    'Content-Type' => 'application/json',
                    'Authorization' => 'Bearer ' . $accessToken,
                ],
                'json' => $data,
            ]);

            $statusCode = $response->getStatusCode();

            if ($statusCode !== 201) {
                throw new Exception('Error adding custom property');
            }
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public function add_user_note(Request $request)
    {
        $validations['first_name'] = 'required';
        $validations['last_name'] = 'required';
        $validations['email'] = 'required|string|email';
        // $validations['phone_no'] = 'required';
        $validator = Validator::make($request->all(), $validations);

        if ($validator->fails()) {
            $messages = json_decode(json_encode($validator->messages()), true);
            $i = 0;
            foreach ($messages as $key => $val) {
                $data['errors'][$i]['error'] = $val[0];
                $data['errors'][$i]['field'] = $key;
                $i++;
            }

            $data['success'] = FALSE;
            $data['message'] = 'Required fields are missing.';
            $data['data'] = (object)[];
            return response($data, 400);
        }
        // start hubspot api

        $findBusinessUser = BusinessUser::where('user_id', $request->user_id)->first();

        if (!empty($findBusinessUser) && $findBusinessUser->parent_id != 0) {
            $user_id = $findBusinessUser->parent_id;
        } elseif (!empty($findBusinessUser) && $findBusinessUser->parent_id == 0) {
            $user_id = $findBusinessUser->user_id;
        } else {
            $user_id = $request->user_id;
        }

        $check_user = PlatformIntegration::where('platform_id', 1)->where('user_id', $user_id)->first();
        $findUser = User::where('id', $request->user_id)->first();

        if ($findUser) {
            $created_name = $findUser->first_name . ' ' . $findUser->last_name;
            $created_name = $created_name ?? ' ';
        }

        if ($check_user) {
            $accessToken = $check_user->access_token;
            $refreshToken = $check_user->refresh_token;
            $currentTime = now();
            $expires_in = $check_user->expires_in;
            $differenceInMinutes = $currentTime->diffInMinutes($expires_in);

            // Check if the token needs to be refreshed
            if ($currentTime > $expires_in) {
                $accessToken = generateAccessTokenWithRefreshToken($refreshToken, $check_user);
            }

            $client = new Client();

            $endpoint = 'https://api.hubapi.com/crm/v3/objects/contacts/search';
            $dataFilter = [
                'filterGroups' => [
                    [
                        'filters' => [
                            [
                                'value' => $request->email,
                                'propertyName' => 'email',
                                'operator' => 'EQ',
                            ],
                        ],
                    ],
                ],
            ];

            $response = $client->post($endpoint, [
                'headers' => [
                    'Authorization' => 'Bearer ' . $accessToken,
                    'Content-Type' => 'application/json',
                ],
                'json' => $dataFilter,
            ]);

            $result = json_decode($response->getBody(), true);

            if (!empty($result['results'])) {
                // Contact already exists, update the contact with new data
                $contactId = $result['results'][0]['id'];
                if ($contactId) {
                    $updateEndpoint = 'https://api.hubapi.com/crm/v3/objects/contacts/' . $contactId;
                    $updateData = [
                        'properties' => [
                            'firstname' => $request->first_name,
                            'lastname' => $request->last_name,
                            'phone' => $request->phone_no,
                           // 'created_by'  => $created_name,
                        ],
                    ];
                    $response = $client->patch($updateEndpoint, [
                        'headers' => [
                            'Authorization' => 'Bearer ' . $accessToken,
                            'Content-Type' => 'application/json',
                        ],
                        'json' => $updateData,
                    ]);
                    $statusCode = $response->getStatusCode();
                    $result = json_decode($response->getBody(), true);
                    if (!empty($result['results'])) {
                        $data['success'] = FALSE;
                        $data['message'] = $result['results'][0];
                        return response($data, 400);
                    }

                    $data['success'] = TRUE;
                    $data['hubspotContactMessage'] = 'Contact Push Into Hubspot successfully';
                    // return response($data, 200);

                }
            } else {

                $endpoint = 'https://api.hubapi.com/crm/v3/objects/contacts';
                // Data for creating/updating contacts
                $dataCreate = [
                    'properties' => [
                        'email' => $request->email,
                        'firstname' => $request->first_name,
                        'lastname' => $request->last_name,
                        'phone' => $request->phone_no,
                        //'created_by'  => $created_name,
                    ],
                ];
                $response = $client->post($endpoint, [
                    'headers' => [
                        'Authorization' => 'Bearer ' . $accessToken,
                        'Content-Type' => 'application/json',
                    ],
                    'json' => $dataCreate,
                ]);

                $statusCode = $response->getStatusCode();
                $result = json_decode($response->getBody(), true);

                if ($statusCode != 201) {
                    // Handle the error response if the creation fails
                    $data['success'] = FALSE;
                    $data['message'] = $result;
                    return response($data, 400);
                }

                // Handle success response or perform additional actions if needed
                $data['success'] = TRUE;
                $data['hubspotContactMessage'] = 'Contact Push Into Hubspot successfully';
                // return response($data, 200);
            }
        }
        //end hubspot api
        $Obj = new UserNote;
        $Obj->first_name = $request->first_name;
        $Obj->last_name = $request->last_name;
        $Obj->name = $request->first_name . ' ' . $request->last_name;
        $Obj->email = $request->email;
        $Obj->phone_no = $request->phone_no;
        $Obj->note = $request->note;
        $Obj->website = $request->has('website') ? $request->website : NULL;
        $Obj->job_tittle = $request->has('job_tittle') ? $request->job_tittle : NULL;
        $Obj->company = $request->has('company') ? $request->company : NULL;
        $Obj->address = $request->has('address') ? $request->address : NULL;
        $Obj->note = $request->note;
        $Obj->user_id = $request->user_id;
        $Obj->created_by = $request->user_id;

        $upload_dir = icon_dir();
        $date = date('Ymd');
        $response = upload_file($request, 'photo', $upload_dir . '/' . $date);
        if ($response['success'] == TRUE && $response['filename'] != '') {
            $Obj->photo = $date . '/' . $response['filename'];
        }

        $Obj->save();

        //send_notification($token, $message);
        $User = User::find($request->user_id);
        $image = $User->banner != '' ? image_url($User->banner) : uploads_url() . 'img/customer.png';
        $name = ($User->first_name == '' && $User->last_name == '') ? $User->name : $User->first_name . ' ' . $User->last_name;

        if (strtolower(config("app.name", "")) != 'addmee') {
            $html = '<p style="font-family: sans-serif; text-align:center;"><img alt="' . config("app.name", "") . '" height="40" src="' . $image . '"><br>' . $name . '<br><br><br>Hi ' . $Obj->name . ',<br><br> This is ' . $name . '`s digital business card: <br><br><a style="padding: 10px 20px; background-color: #E30045; color: #fff; font-size: 16px; text-decoration: none; border-radius: 15px; font-weight: 600; font-family: sans-serif;" href="' . main_url() . '/' . $User->username . '">Click to Open Card</a><br><br><a href="__SITEURL__"><img alt="' . config("app.name", "") . '" height="40" src="' . uploads_url() . 'img/tapmee-logo.png"></a></p>';
            // echo $html;exit;

            $receiver_html = '<p style="font-family: sans-serif; text-align:center;">Hi ' . $name . ', you have a new connection on ' . ucwords(config("app.name", "")) . '! <br><br><img alt="' . config("app.name", "") . '" height="40" src="' . uploads_url() . 'img/customer.png"><br><br>' . $Obj->name . '<br><br>' . $Obj->email . '<br><br>' . $Obj->phone_no;

            if ($request->has('company')) {
                $receiver_html .= '<br><br>' . $Obj->company;
            }
            if ($request->has('job_tittle')) {
                $receiver_html .= '<br><br>' . $Obj->job_tittle;
            }
            if ($request->has('website')) {
                $receiver_html .= '<br><br><a href="' . $Obj->website . '">' . $Obj->website . '</a>';
            }

            $receiver_html .= '<br><br>' . $Obj->note . '<br><br>' . dmy($Obj->created_at) . '<br><br><a href="__SITEURL__"><img alt="' . config("app.name", "") . '" height="40" src="' . uploads_url() . 'img/tapmee-logo.png"></a></p>';
            // <br><br>Reply to this email to start a conversation with '.$Obj->name.'

            //user who tries to connect
            $html = str_replace('__SITEURL__', 'https://tapmee.co/', $html);
            Mail::send([], [], function ($message) use ($html, $name, $Obj) {
                $message
                    ->to($Obj->email)
                    ->subject(config("app.name", "") . ": You connected with " . $name . "")
                    ->from("no-reply@tapmee.co", config("app.name", "") . " Connect")
                    ->setBody($html, 'text/html');
            });

            //user with whom sender is connected
            $receiver_html = str_replace('__SITEURL__', 'https://tapmee.co/', $receiver_html);
            Mail::send([], [], function ($message) use ($receiver_html, $name, $User) {
                $message
                    ->to($User->email)
                    ->subject(config("app.name", "") . ": Connect")
                    ->from("no-reply@tapmee.co", "" . config("app.name", "") . " Connect")
                    ->setBody($receiver_html, 'text/html');
            });
        } else {
            $html = '<p style="font-family: sans-serif; text-align:center;"><img alt="' . config("app.name", "") . '" height="40" src="' . $image . '"><br>' . $name . '<br><br><br>Hi ' . $request->name . ',<br><br> This is ' . $name . '`s digital business card: <br><br><a style="padding: 10px 20px; background-color: #E30045; color: #fff; font-size: 16px; text-decoration: none; border-radius: 15px; font-weight: 600; font-family: sans-serif;" href="' . main_url() . '/' . $User->username . '">Click to Open Card</a><br><br><a href="__SITEURL__"><img alt="' . config("app.name", "") . '" height="40" src="' . uploads_url() . 'img/addmee-logo.png"></a></p>';
            // echo $html;exit;

            $receiver_html = '<p style="font-family: sans-serif; text-align:center;">Hi ' . $name . ', you have a new ' . ucwords(config("app.name", "")) . ' connection! <br><br><img alt="' . config("app.name", "") . '" height="40" src="' . uploads_url() . 'img/customer.png"><br><br>' . $Obj->name . '<br><br>' . $Obj->email . '<br><br>' . $Obj->phone_no;

            if ($request->has('company')) {
                $receiver_html .= '<br><br>' . $Obj->company;
            }
            if ($request->has('job_tittle')) {
                $receiver_html .= '<br><br>' . $Obj->job_tittle;
            }
            if ($request->has('website')) {
                $receiver_html .= '<br><br><a href="' . $Obj->website . '">' . $Obj->website . '</a>';
            }

            $receiver_html .= '<br><br>' . $Obj->note . '<br><br>' . dmy($Obj->created_at) . '<br><br><a href="__SITEURL__"><img alt="' . config("app.name", "") . '" height="40" src="' . uploads_url() . 'img/addmee-logo.png"></a></p>';

            $html = str_replace('__SITEURL__', 'https://addmee.de/', $html);
            //user who tries to connect
            $mj = new \Mailjet\Client('4133c35d76d4c148cad9d63efa8ed0cc', 'c0e0cc12628811dfea4a53ccd3f95f7f', true, ['version' => 'v3.1']);
            $body = [
                'Messages' => [
                    [
                        'From' => ['Email' => "no-reply@addmee.de", 'Name' => "" . config("app.name", "") . " Connect"],
                        'To' => [['Email' => $Obj->email, 'Name' => $Obj->name]],
                        'Subject' => "You connected with " . $name . " ",
                        'TextPart' => "You connected with " . $name . "",
                        'HTMLPart' => $html,
                        'CustomID' => config("app.name", "")
                    ]
                ]
            ];

            $response = $mj->post(Resources::$Email, ['body' => $body]);

            //user with whom sender is connected
            $receiver_html = str_replace('__SITEURL__', 'https://addmee.de/', $receiver_html);
            $mj = new \Mailjet\Client('4133c35d76d4c148cad9d63efa8ed0cc', 'c0e0cc12628811dfea4a53ccd3f95f7f', true, ['version' => 'v3.1']);
            $body = [
                'Messages' => [
                    [
                        'From' => ['Email' => "no-reply@addmee.de", 'Name' => "" . config("app.name", "") . " Connect"],
                        'To' => [['Email' => $User->email, 'Name' => $name]],
                        'Subject' => $request->name . " connected with you",
                        'TextPart' => $request->name . " connected with you",
                        'HTMLPart' => $receiver_html,
                        'CustomID' => config("app.name", "")
                    ]
                ]
            ];

            $response = $mj->post(Resources::$Email, ['body' => $body]);
        }

        $data['success'] = TRUE;
        $data['message'] = 'Added successfully.';
        $data['data'] = array('note' => $Obj);
        return response()->json($data, 201);
    }







}

