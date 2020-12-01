<?php

namespace Tests\Feature\Api\Auth;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Model\Venue;
use App\Model\User;

class VenuesTest extends TestCase {
    use RefreshDatabase;

   

    /** @test */
    public function loading_venues_should_redirect_to_unauth_page() {

        $res = $this->call('post', '/api/venues', array_merge($this->test_data(), ['api_token' => ''] ));

        $res->assertRedirect('admin/login');
        $this->assertCount(0, Venue::all());

    }

    /** @test */
    public function auth_user_can_add_a_venue() {
        $this->withoutExceptionHandling();
        
        $this->post('/api/venues', $this->test_data());
        $venue = Venue::firstOrFail();

        dd($venue);

        $this->assertCount(1, [$venue]);

        $this->assertEquals('Venue A', $venue->name);
        $this->assertEquals('Some text for Venue A', $venue->description);
        $this->assertEquals(100, $venue->min_people);
        $this->assertEquals(120, $venue->max_people);
   }


    //Variables
    protected $user;

    //Methods
    protected function setUp(): void {
        parent::setUp();
 
        $this->user = factory(User::class)->create();
 
    }

    private function test_data() {
        return  [
            'name' => 'Venue A', 
            'description' => 'Some text for Venue A', 
            'min_people' => 100,
            'max_people' => 120,
            'api_token' => $this->user->api_token,
            'user_id' => $this->user->id
        ];
    }

    private function handle_assert($data, $key) {
        
       $this->call('post', '/api/venues', array_merge(
           $data, 
           [$key => null])
        )->assertSessionHasErrors($key);

        $this->assertCount(0, Venue::all());
    }
    
}
