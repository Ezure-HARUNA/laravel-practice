<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ContactForm>
 */
class ContactFormFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  //factory→ダミーデータのテストデータなどを入れるときに役に立つ
  public function definition()
  {
    return [
      //MEMO: faker: それっぽいダミーデータを自動生成してくれる
      'name' => $this->faker->name(20),
      'title' => $this->faker->realText(50),
      'email' => $this->faker->email(),
      'url' => $this->faker->url(),
      'gender' => $this->faker->boolean(),
      'age' => $this->faker->numberBetween(1, 6),
      'contact' => $this->faker->realText(200),
    ];
  }
}
