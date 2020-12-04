<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class MessageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $items = Message::all();
        $status = Status::where('user_id', Auth::user()->id)->get();

        return view('home', [
            'items' => $items,
            'status' => $status
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'key' => 'required',
            'message' => 'required'
        ]);
        $plain_text = str_split($request->message);
        $n = count($plain_text);
        $key = str_split($request->key);
        $m = count($key);

        $encrypted_text = '';

        for ($i = 0; $i < $n; $i++) {
            $encrypted_text .= chr(((ord($plain_text[$i]) - 65 + ord($key[$i % $m]) - 65) % 26) + 65);
        }

        $encrypted = str_split($encrypted_text);
        $n = count($encrypted);
        $key = str_split($request->key);
        $m = count($key);
        $decrypted_text = '';

        for ($i = 0; $i < $n; $i++) {

            $decrypted_text .= chr(((26 + ord($encrypted[$i]) - 65 - ord($key[$i % $m]) + 65) % 26) + 65);
        }

        $user = Auth::user();
        $message = $user->messages()->create([
            'message' => $request->message,
            'key' => $request->key,
            'encrypted' => $encrypted_text,
            'decrypted' => $decrypted_text
        ]);

        Status::with(['user', 'message'])->create([
            'message_id' => $message->id,
            'user_id' => Auth::user()->id,
            'status' => 'NOT',
        ]);

        return redirect()->route('home');
    }

    public function show($id)
    {
        $items = Message::where('id', $id)->get();
        return view('decode', [
            'items' => $items
        ]);
    }

    public function decode(Request $request, $id)
    {
        $key = Message::where('id', $id)->value('key');
        Status::where('message_id', $id)->get();
        $request->validate([
            'key' => 'required',
        ]);
        $items = [
            'status' => 'DONE'
        ];
        if ($request->input('key') == $key) {
            Status::where('message_id', $id)->update($items);
        }
        return redirect()->route('home');
    }


    public function rot13(Request $request)
    {
        $plain_text = $request->message;
        $encrypt = str_rot13($plain_text);
        $decrypt = str_rot13($encrypt);
        $user = Auth::user();

        $message = $user->messages()->create([
            'message' => $request->message,
            'encrypted' => $encrypt,
            'decrypted' => $decrypt
        ]);

        Status::with(['user', 'message'])->create([
            'message_id' => $message->id,
            'user_id' => Auth::user()->id,
            'status' => 'NOT',
        ]);
        return redirect()->route('home');
    }
}
