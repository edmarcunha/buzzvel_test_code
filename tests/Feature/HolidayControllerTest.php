<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Holiday;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class HolidayControllerTest extends TestCase
{
    use RefreshDatabase;

    private $user;
    private $token;

    protected function setUp(): void
    {
        parent::setUp();
        
        // Cria um usuário para autenticação
        $this->user = User::factory()->create([
            'password' => Hash::make('password123'),
        ]);

        // Faz login para obter o token
        $response = $this->post('/api/login', [
            'email' => $this->user->email,
            'password' => 'password123',
        ]);

        // Verifica se o login foi bem-sucedido
        $response->assertStatus(200);

        // Salva o token para uso em outras requisições
        $this->token = $response->json('token');
    }

    /**
     * Test creating a holiday.
     *
     * @return void
     */
    public function test_create_holiday()
    {
        $response = $this->post('/api/holidays', [
            'title' => 'Holiday Title',
            'description' => 'Holiday Description',
            'date' => '2024-08-08',
            'location' => 'Holiday Location',
            'participants' => ['John Doe', 'Jane Doe'],
        ], [
            'Authorization' => 'Bearer ' . $this->token,
        ]);

        $response->assertStatus(201);
        $response->assertJsonStructure([
            'id',
            'title',
            'description',
            'date',
            'location',
            'participants',
        ]);
    }

    /**
     * Test getting a list of holidays.
     *
     * @return void
     */
    public function test_get_holidays()
    {
        Holiday::factory()->count(3)->create();

        $response = $this->get('/api/holidays', [
            'Authorization' => 'Bearer ' . $this->token,
        ]);

        $response->assertStatus(200);
    }

    /**
     * Test showing a specific holiday.
     *
     * @return void
     */
    public function test_show_holiday()
    {
        $holiday = Holiday::factory()->create();

        $response = $this->get('/api/holidays/' . $holiday->id, [
            'Authorization' => 'Bearer ' . $this->token,
        ]);

        $response->assertStatus(200);
    }

    /**
     * Test updating a holiday.
     *
     * @return void
     */
    public function test_update_holiday()
    {
        $holiday = Holiday::factory()->create();

        $response = $this->put('/api/holidays/' . $holiday->id, [
            'title' => 'Updated Title',
            'description' => 'Updated Description',
            'date' => '2024-08-09',
            'location' => 'Updated Location',
            'participants' => ['John Doe', 'Jane Doe'],
        ], [
            'Authorization' => 'Bearer ' . $this->token,
        ]);

        $response->assertStatus(200);
    }

    /**
     * Test deleting a holiday.
     *
     * @return void
     */
    public function test_delete_holiday()
    {
        $holiday = Holiday::factory()->create();

        $response = $this->delete('/api/holidays/' . $holiday->id, [], [
            'Authorization' => 'Bearer ' . $this->token,
        ]);

        $response->assertStatus(200);
    }


}
