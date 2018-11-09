<?php

namespace App\Http\Controllers\Apis;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Validator;

class PushNotificationsController extends Controller
{
    public function index(Request $request)
    {
        $validate = Validator::make($request->all(), [

            'token'   => 'required',
        ]);

        if ($validate->fails()) {
            return response()->json([

                'success' => 'false',
                'status' => '401',
                'message' => 'Please Review All Fields',
                'errors' => $validate->errors()
            ]);
        }

        DB::table('push_notifications_tokens')->insert([

            'token'         => $request->token,
            'created_at'    => date('Y-m-d H:i:s'),
            'updated_at'    => date('Y-m-d H:i:s'),
       ]);

        return response()->json([

            'success' => 'true',
            'status' => '200',
            'message' => 'token inserted successfully',
        ]);
    }

    public function send_notification()
    {
        $new_tokens = DB::table('push_notifications_tokens')->get();

        $tokens=array();

        foreach($new_tokens as $new_token)
        {
            $tokens[] = $new_token->token;
        }

        $message = array(
                            "title"   => "First Notifiaction",
                            "message" => "This is simple Notification from App Server"
                        );

        $url='https://fcm.googleapis.com/fcm/send';
	    $server_key='AAAA-i61uFs:APA91bF6rN4u2ywAr_LQrI3DWoZOXLorEEmi__Z-C4oaSNKxkK65VeovDiAc9lo9daRFZq7KV43Yj9GWI7dHY_mS9umGMhxsM2tnk1sOoCAQvMUbYMb2jWZlY7MI6WvGKC0UY4kWIjJ8';  // put your own server key

		$header=array('Authorization:key='.$server_key,'Content-Type:application/json');

		$field=array('registration_ids'=>$tokens,'data'=>$message);
        $payload=json_encode($field);
	   
	   $ch = curl_init();
       curl_setopt($ch, CURLOPT_URL, $url);
       curl_setopt($ch, CURLOPT_POST, true);
       curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
       curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
       curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, 0);  
       curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
       curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
       $result = curl_exec($ch);           
       
       if ($result === FALSE) {
           die('Curl failed: ' . curl_error($ch));
       }
       curl_close($ch);
       echo $result;
    }
}
