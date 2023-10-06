<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateAvatarRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
}
