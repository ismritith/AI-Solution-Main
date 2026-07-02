<?php

test('chatbot stream route requires a message parameter', function () {
    $response = $this->postJson(route('chatbot.stream'), [
        'message' => '',
    ]);

    $response->assertStatus(422)
        ->assertJsonValidationErrors(['message']);
});

test('chatbot stream route validates message length', function () {
    $response = $this->postJson(route('chatbot.stream'), [
        'message' => str_repeat('a', 1001),
    ]);

    $response->assertStatus(422)
        ->assertJsonValidationErrors(['message']);
});
