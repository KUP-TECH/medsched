<?php

return [

    'dashboard' => [
        'name'      => 'dashboard',
        'title'     => 'Dashboard',
        'icon'      => 'bi bi-grid-1x2',
        'route'     => 'dashboard',
        'access'    => 'staff',
    ],


    'patients' => [
        'name'      => 'patients',
        'title'     => 'Patients',
        'icon'      => 'fa-solid fa-people-line',
        'route'     => 'patient.view',
        'access'    => 'staff',
    ],

    'appointments_staff' => [
        'name'      => 'appointments',
        'title'     => 'Appointments',
        'icon'      => 'bi bi-journals',
        'route'     => 'staff_view',
        'access'    => 'staff'
    ],

    'services' => [
        'name'      => 'services',
        'title'     => 'Services',
        'icon'      => 'bi bi-person-workspace',
        'route'     => 'clinic_services',
        'access'    => 'staff'
    ],


    'staff' => [
        'name'      => 'staff',
        'title'     => 'Staff',
        'icon'      => 'bi bi-person-workspace',
        'route'     => 'staff',
        'access'    => 'staff'
    ],

    'medical_records' => [
        'name'      => 'medical_records',
        'title'     => 'Medical Records',
        'icon'      => 'bi bi-clipboard-data-fill',
        'route'     => 'medical_records',
        'access'    => 'staff'
    ],

    'appointments' => [
        'name'      => 'appointments',
        'title'     => 'Appointments',
        'icon'      => 'bi bi-journals',
        'route'     => 'patient_view',
        'access'    => 'patient'
    ],

    
    
    
];