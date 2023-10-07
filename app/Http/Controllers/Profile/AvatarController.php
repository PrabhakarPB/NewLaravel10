<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateAvatarRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use OpenAI\Laravel\Facades\OpenAI;
use Illuminate\Support\Str;

class AvatarController extends Controller
{
    //
    public function update(UpdateAvatarRequest $request)
    {

        // dd($request->file('avatar'));
        // return back()->with('message', 'Avatar is changed');

        $path = Storage::disk('public')->put('avatars', $request->file('avatar'));
        if ($oldAvatar = $request->user()->avatar) {

            Storage::disk('public')->delete($oldAvatar);
        }
        auth()->user()->update(['avatar' => $path]);
        // dd(auth()->user()->fresh());
        return redirect(route('profile.edit'))->with('message', 'Avatar is updated');
    }

    public function generate(Request $request)
    {


        $result = OpenAI::images()->create([
            "prompt" => "create single user animated avatar for user profile",
            "n" => 1,
            "size" => "256x256",
        ]);


        $contents = file_get_contents($result->data[0]->url);


        $filename = Str::random(20);

        if ($oldAvatar = $request->user()->avatar) {

            Storage::disk('public')->delete($oldAvatar);
        }

        Storage::disk('public')->put('avatars/' . $filename . ".jpg", $contents);

        auth()->user()->update(['avatar' => 'avatars/' . $filename . ".jpg"]);
        return redirect(route('profile.edit'))->with('message', 'Avatar is updated');
    }
}
