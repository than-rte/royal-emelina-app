<?php

namespace Tests\Feature\Api;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Model\Venue;

class VenuesTest extends TestCase
{

    use RefreshDatabase;

    /** @test */
    public function all_venue_fields_must_be_required() {

        $fields = ['name', 'description', 'min_people', 'max_people'];

        collect($fields)->each(function($field) {

            $this->handle_assert($this->test_data, $field);
        });
    }

     /** @test */
    public function venue_name_must_be_required() {

        $this->handle_assert($this->test_data, 'name');
    }

    /** @test */
    public function venue_description_must_be_required() {

        $this->handle_assert($this->test_data, 'description');

    }

    /** @test */
    public function venue_min_people_must_be_required() {

        $this->handle_assert($this->test_data, 'min_people');

    }

     /** @test */
    public function venue_max_people_must_be_required() {

        $this->handle_assert($this->test_data, 'max_people');

    }

    /** @test */
    public function single_venue_must_be_fetch() {

        $venue = factory(Venue::class)->create();
        
        $res = $this->call('get', 'api/venues/' . $venue->id)
            ->assertJson([
                'name' => $venue->name,
                'description' => $venue->description,
                'min_people' => $venue->min_people,
                'max_people' => $venue->max_people
            ]);

    }

   /** @test */
   public function venue_should_be_added() {
       $this->withoutExceptionHandling();

        $this->call('post', '/api/venues',  $this->test_data);

        $venue = Venue::firstOrFail();

        $this->assertCount(1, [$venue]);

        $this->assertEquals('Venue A', $venue->name);
        $this->assertEquals('Some text for Venue A', $venue->description);
        $this->assertEquals(100, $venue->min_people);
        $this->assertEquals(120, $venue->max_people);
   }

    /** @test */
    public function venue_must_be_updated() {

        $this->withoutExceptionHandling();

        $venue = factory(Venue::class)->create();
        
        $this->call('patch', '/api/venues/' . $venue->id, [
            'name' => 'Venue A',
            'description' => $venue->description,
            'min_people' => $venue->min_people,
            'max_people' => $venue->max_people
        ]);

        $venue = $venue->fresh();

        $this->assertEquals('Venue A', $venue->name);

    }

    /** @test */
    public function venue_should_be_hard_deleted() {
        $venue = factory(Venue::class)->create();

        $res = $this->call('delete', '/api/venues/' . $venue->id);

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
    private function handle_assert($data, $key) {
        
       $this->call('post', '/api/venues', array_merge(
           $data, 
           [$key => null])
        )->assertSessionHasErrors($key);

        $this->assertCount(0, Venue::all());
    }
}
