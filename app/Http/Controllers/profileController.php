<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use League\CommonMark\Inline\Element\Image;

class profileController extends Controller
{
    public  function show(User $user)
    {
        return view('profiles.show',[
            'user'=> $user,
            'tweets'=> $user->tweets()
                ->withLikes()
                ->paginate(50)
        ]);
    }

    public function edit(User $user)
    {
        //abort_if($user->isNot(Current_user()),404);
        $this->authorize('edit' ,$user);
        return view('profiles.edit',compact('user'));
    }
    public  function update(User $user)
    {
        $attributes = \request()->validate([
            'username' => [
                'string',
                'required',
                'max:255',
                'alpha_dash',
                Rule::unique('users')->ignore($user),
            ],
            'name' => ['string', 'required', 'max:255'],
            'avatar' => ['file'],
            'email' => [
                'string',
                'required',
                'email',
                'max:255',
                Rule::unique('users')->ignore($user),
            ],
            'password' => [
                'string',
                'required',
                'min:8',
                'max:255',
                'confirmed',
            ],
        ]);

       // $imagePath = $request->file('avatar')->store('avatars');
        if (\request('avatar')) {
            $attributes['avatar'] = \request('avatar')->store('avatars');
        }
        $user->update($attributes);

        return redirect($user->path());
    }

}
