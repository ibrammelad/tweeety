<?php


namespace App;


trait Followable
{
    public function follow(User $user)
    {
        return $this->followers()->save($user);
    }

    public function unfollow(User $user)
    {
        return $this->followers()->detach($user);
    }

    public function sysFOllow(User $user)
    {
        if ($this->following($user))
            {
              return  $this->unfollow($user);
            }

            return    $this->follow($user);

    }

    public function following(User $user)
    {
        return $this->followers()
                ->where('follow_user_id' , $user->id)
                    ->exists();
    }

    public function followers()
    {
        return $this->belongsToMany(
            User::class,
            'follows',
            'user_id',
            'follow_user_id'
        );
    }
}
