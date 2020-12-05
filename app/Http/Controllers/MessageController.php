<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class MessageController extends Controller
{
    public function __construct()
    {
    }


    public function index()
    {
        return view('home');
    }

    public function rot13_view()
    {
        return view('rot13');
    }

    public function show_vignere($id)
    {
        $lastest = Message::latest()->value('id');
        $items = Message::where($lastest, $$id)->first();
        return view('vignere_result', [
            'items' => $items
        ]);
    }
    public function vignere_encrypt(Request $request)
    {
        $request->validate([
            'key' => 'required',
            'message' => 'required'
        ]);
        $clean = preg_replace('/\s+/', '', $request->message);
        $string = strtoupper($clean);
        $plain_text = str_split($string);
        $n = count($plain_text);
        $k = strtoupper($request->key);
        $key = str_split($k);
        $m = count($key);

        $encrypted_text = '';

        for ($i = 0; $i < $n; $i++) {
            $encrypted_text .= chr(((ord($plain_text[$i]) - 65 + ord($key[$i % $m]) - 65) % 26) + 65);
        }


        $encrypted = str_split($encrypted_text);
        $n = count($encrypted);
        $clean = preg_replace('/\s+/', '', $request->key);
        $k = strtoupper($clean);
        $key = str_split($k);
        $m = count($key);
        $decrypted_text = '';

        for ($i = 0; $i < $n; $i++) {
            $decrypted_text .= chr(((26 + ord($encrypted[$i]) - 65 - ord($key[$i % $m]) + 65) % 26) + 65);
        }
        return redirect()->route('home')->with(
            [
                'encrypted' => $encrypted_text,
                'decrypted' => $decrypted_text,
                'key' => $k,
            ]
        );
    }

    public function vignere_decrypt(Request $request)
    {
        $clean = preg_replace('/\s+/', '', $request->message);
        $string = strtoupper($clean);
        $encrypted = str_split($string);
        $n = count($encrypted);
        $clean = preg_replace('/\s+/', '', $request->key);
        $k = strtoupper($clean);
        $key = str_split($k);
        $m = count($key);
        $decrypted_text = '';

        for ($i = 0; $i < $n; $i++) {
            $decrypted_text .= chr(((26 + ord($encrypted[$i]) - 65 - ord($key[$i % $m]) + 65) % 26) + 65);
        }
        return redirect()->route('home')->with(
            [
                'encrypted' => $string,
                'decrypted' => $decrypted_text,
                'key' => $k,
            ]
        );
    }


    public function rot13(Request $request)
    {
        $request->validate([
            'message' => 'required'
        ]);
        $plain_text = $request->message;
        $encrypt = str_rot13($plain_text);
        $decrypt = str_rot13($encrypt);

        return redirect()->route('rot13_view')->with(
            [
                'encrypted' => $encrypt,
                'decrypted' => $decrypt,
            ]
        );
    }
}
