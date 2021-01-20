<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Model\Venue;

class ApiAuthTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function unauth_page_should_show_if_unauth()
    {

        $res = $this->call('post', '/api/venues', $this->test_data);

        $res->assertRedirect('admin/login');
        $this->assertCount(0, Venue::all());
    }

    //Variables
    private $test_data = [
        'name' => 'Venue A',
        'description' => 'Some text for Venue A',
        'min_people' => 100,
        'max_people' => 120
    ];

    //Methods
    private function handle_assert($data, $key)
    {

        $this->call('post', '/api/venues', array_merge(
            $data,
            [$key => null]
        ))->assertSessionHasErrors($key);

        $this->assertCount(0, Venue::all());
    }
}
