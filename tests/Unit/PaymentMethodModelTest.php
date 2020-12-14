<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\PaymentMethod;
use App\Models\User;

class PaymentMethodModelTest extends TestCase
{
    use RefreshDatabase;

    /**
     * User relationship
     *
     * @return void
     */
    public function testUserRelationship()
    {
        $user = User::factory()->create();
        $payment_method = PaymentMethod::factory(['user_id' => $user->id])->create();

        $this->assertInstanceOf(User::class, $payment_method->user);

        $this->assertEquals(1, $payment_method->user->count());
    }
}
