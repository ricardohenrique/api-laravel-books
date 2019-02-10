<?php

namespace Tests\Integration;

use App\Models\Level;
use Tests\TestCase;

class LevelTest extends TestCase
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
    public function testGetAllLevels()
    {
        $response = $this->get('/api/levels');

        $response->assertStatus(200);
        $response->assertJsonStructure([self::STRUCTURE]);
    }

    /**
     * Test to get only one resources
     *
     * @return void
     */
    public function testGetLevelById()
    {
        $resource = factory(Level::class)->create();
        $response = $this->get('/api/levels/'.$resource->id);

        $response->assertStatus(200);
        $response->assertJson($resource->toArray());
    }

    /**
     * Test to store resources
     *
     * @return void
     */
    public function testStoreLevel()
    {
        $data = [
            'name' => "New Level",
        ];

        $response = $this->post('/api/levels/', $data);
        $response->assertStatus(200);
        $response->assertJsonStructure(self::STRUCTURE);
        $response->assertJsonFragment($data);
    }

    /**
     * Test to update resources
     *
     * @return void
     */
    public function testUpdateLevel()
    {
        $resource = factory(Level::class)->create();
        $data = [
            'name' => "New Name",
        ];

        $response = $this->put('/api/levels/'.$resource->id, $data);
        $response->assertStatus(200);
        $response->assertJsonStructure(self::STRUCTURE);
        $response->assertJsonFragment($data);
    }

    /**
     * Test to delete resource
     *
     * @return void
     */
    public function testDeleteLevel()
    {
        $resource = factory(Level::class)->create();
        $response = $this->delete('/api/levels/'.$resource->id);

        $response->assertStatus(200);
    }
}
