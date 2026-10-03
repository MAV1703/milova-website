<?php

namespace Tests\Feature\Livewire;

use App\Livewire\NewOrderForm;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class NewOrderFormTest extends TestCase
{
    public function test_renders_successfully()
    {
        Livewire::test(NewOrderForm::class)
            ->assertStatus(200);
    }
}
