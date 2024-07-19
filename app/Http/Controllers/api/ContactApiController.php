<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Web\Controller;
use App\Http\Requests\ContactRequest;
use App\Mail\ContactMessage;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactApiController extends Controller
{
    public function message(ContactRequest $request){

        $admins = User::all();
        $name = $request->input('name');
        $email = $request->input('email');
        $messageContent = $request->input('message');
        foreach ($admins as $admin) {
        Mail::to($admin->email)->send(new ContactMessage($name, $email, $messageContent));
        }
        return response()->json(['message' => 'Mensaje enviado correctamente'], 200);
    }
}
