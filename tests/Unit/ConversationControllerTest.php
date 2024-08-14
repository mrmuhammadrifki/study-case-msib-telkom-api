<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Conversation;

class ConversationControllerTest extends TestCase
{
    use RefreshDatabase; // Menggunakan trait ini untuk memastikan database direset di setiap test

    /**
     * Test get all conversations.
     *
     * @return void
     */
    public function test_can_get_all_conversations()
    {
        // Membuat beberapa dummy data
        Conversation::factory()->count(3)->create();

        // Panggil endpoint GET /api/conversations
        $response = $this->getJson('/api/conversations');

        // Periksa status response
        $response->assertStatus(200);

        // Periksa struktur dan jumlah data yang dikembalikan
        $response->assertJsonStructure([
            'success',
            'message',
            'data' => [
                '*' => ['id', 'message', 'direction', 'sender', 'created_at', 'updated_at'],
            ],
        ]);
    }

    /**
     * Test create a new conversation.
     *
     * @return void
     */
    public function test_can_create_conversation()
    {
        // Data request
        $data = [
            'message' => 'Bagaimana cara sukses membangun startup?',
            'direction' => 'outgoing',
            'sender' => 'user',
        ];

        // Panggil endpoint POST /api/conversations
        $response = $this->postJson('/api/conversations', $data);

        // Periksa status response
        $response->assertStatus(201);

        // Periksa struktur dan data response
        $response->assertJson([
            'success' => true,
            'message' => 'Data Conversation Berhasil Ditambahkan!',
            'data' => [
                'message' => 'Bagaimana cara sukses membangun startup?',
                'direction' => 'outgoing',
                'sender' => 'user',
            ],
        ]);

        // Periksa apakah data tersimpan di database
        $this->assertDatabaseHas('conversations', $data);
    }

    /**
     * Test validation error when creating a conversation.
     *
     * @return void
     */
    public function test_validation_error_when_creating_conversation()
    {
        // Data request tanpa 'message'
        $data = [
            'direction' => 'outgoing',
            'sender' => 'user',
        ];

        // Panggil endpoint POST /api/conversations
        $response = $this->postJson('/api/conversations', $data);

        // Periksa status response
        $response->assertStatus(422);

        // Memeriksa kesalahan validasi untuk 'message'
        $response->assertJson([
            'message' => [
                'The message field is required.'
            ]
        ]);
    }
}
