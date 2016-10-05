<?php

namespace App\Jobs;

use App\Jobs\Job;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;


class cacheAuthUser implements ShouldQueue
{
//    use InteractsWithQueue, SerializesModels;
    use InteractsWithQueue, Queueable, SerializesModels;
    protected $user;

    /**
     * Create a new job instance.
     *
     * @return boolean
     */
    public function __construct($user)
    {

        $this->user = $user;
    }

    /**
     * @return void
     * Execute the job.
     *
     */
    public function handle()
    {

        if (!Cache::has('perms.' . $this->user->id) && !Cache::has('modules.' . $this->user->id) && !Cache::has('role.' . $this->user->id)) {

            // role + permissions + modules

            $role = $this->user->roles()->first();

            $allPermissions = $role->perms()->where('module', 0)->pluck('name');

            $allModules = $role->perms()->where('module', 1)->pluck('name');

            Cache::forever('role.' . $this->user->id, $role->name);

            Cache::forever('perms.' . $this->user->id, $allPermissions);

            Cache::forever('modules.' . $this->user->id, $allModules);

            try {

                Cache::has('role.' . $this->user->id);

                Cache::has('perms.' . $this->user->id);

                Cache::has('modules.' . $this->user->id);


            } catch (\Exception $e) {

                throw new \Exception(' cache is not available');

            }

        }
    }


}
