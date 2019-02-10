<?php

namespace Tests\Integration;

use App\Models\Discipline;
use Tests\TestCase;

class DisciplineTest extends TestCase
{
    /**
     * structure product const
     */
    protected const STRUCTURE = [
        'name',
    ];

    /**
     * Test to get all resources
     *
     * @return void
     */
    public function testGetAllDisciplines()
    {
        $response = $this->get('/api/disciplines');

        $response->assertStatus(200);
        $response->assertJsonStructure([self::STRUCTURE]);
    }

    /**
     * Test to get only one resources
     *
     * @return void
     */
    public function testGetDisciplineById()
    {
        $resource = factory(Discipline::class)->create();
        $response = $this->get('/api/disciplines/'.$resource->id);

        $response->assertStatus(200);
        $response->assertJson($resource->toArray());
    }

    /**
     * Test to store resources
     *
     * @return void
     */
    public function testStoreDiscipline()
    {
        $data = [
            'name' => "New Discipline",
        ];

        $response = $this->post('/api/disciplines/', $data);
        $response->assertStatus(200);
        $response->assertJsonStructure(self::STRUCTURE);
        $response->assertJsonFragment($data);
    }

    /**
     * Test to update resources
     *
     * @return void
     */
    public function testUpdateDisciplines()
    {
        $resource = factory(Discipline::class)->create();
        $data = [
            'name' => "New Name",
        ];

        $response = $this->put('/api/disciplines/'.$resource->id, $data);
        $response->assertStatus(200);
        $response->assertJsonStructure(self::STRUCTURE);
        $response->assertJsonFragment($data);
    }

    /**
     * Test to delete resource
     *
     * @return void
     */
    public function testDeleteDiscipline()
    {
        $resource = factory(Discipline::class)->create();
        $response = $this->delete('/api/disciplines/'.$resource->id);

        $response->assertStatus(200);
    }
}
