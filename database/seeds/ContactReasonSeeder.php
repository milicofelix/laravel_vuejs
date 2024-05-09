<?php

use Illuminate\Database\Seeder;
use App\Models\ContactReason;

class ContactReasonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ContactReason::create(['contact_reason' => 'Dúvida']);
        ContactReason::create(['contact_reason' => 'Elogio']);
        ContactReason::create(['contact_reason' => 'Reclamação']);
    }
}
