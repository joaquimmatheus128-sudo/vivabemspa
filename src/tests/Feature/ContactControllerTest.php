<?php

namespace Tests\Feature;

use Tests\TestCase;

class ContactControllerTest extends TestCase
{
    public function test_contact_page_is_accessible(): void
    {
        $response = $this->get('/contato');

        $response->assertStatus(200);
        $response->assertSee('Contato');
    }

    public function test_contact_form_submits_and_redirects_back_home(): void
    {
        $response = $this->post('/contato', [
            'name' => 'Maria Souza',
            'email' => 'maria@example.com',
            'subject' => 'Orçamento',
            'message' => 'Gostaria de saber mais sobre os serviços.',
        ]);

        $response->assertRedirect(route('home'));
        $response->assertSessionHas('success');
    }
}
