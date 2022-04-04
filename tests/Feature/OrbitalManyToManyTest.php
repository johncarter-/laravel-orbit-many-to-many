<?php

namespace Tests\Feature;

use App\Models\Role;
use App\Models\RoleUser;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\File;
use Tests\TestCase;

class OrbitalManyToManyTest extends TestCase
{
    /** @test */
    function it_can_get_and_set_many_to_many_relationships()
    {
        $user = User::factory()->createOne();
        $role = Role::factory()->createOne();
        $role2 = Role::factory()->createOne();

        $user->roles()->saveMany([$role, $role2]);

        $this->assertSame($user->roles->first()->name, $role->name);
        $this->assertSame($user->roles->last()->name, $role2->name);
    }

    /** @test */
    function it_can_handle_empty_many_to_many_relationships()
    {
        $user = User::factory()->createOne();

        // Failing
        $this->assertEquals($user->roles->count(), 0);
    }

    /** @test */
    function it_can_handle_many_to_many_relationships_when_a_role_user_has_one_entry()
    {
        RoleUser::create([
            'user_id' => 99999999999999999,
            'role_id' => 99999999999999999,
        ]);

        $user = User::factory()->createOne();

        // Passing
        $this->assertEquals($user->roles->count(), 0);
    }
}
