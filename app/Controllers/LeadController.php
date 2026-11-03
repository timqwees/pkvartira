<?php

namespace App\Controllers;

class LeadController
{
    public function onSubmit()
    {
        // Lead submission logic
        header('Content-Type: application/json');
        echo json_encode(['status' => 'success', 'message' => 'Lead submitted']);
    }
}
