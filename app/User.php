<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    const LAB_SCIENTIST = 'lab_scientist';
    const ADMIN = 'admin';
    const DOCTOR = 'doctor';
    const NURSE = 'nurse';
    const PHARMACIST = 'pharmacist';
    const RECORD_OFFICER = 'record_officer';

    use Notifiable;
    // public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name','surname', 'email', 'status', 'password', 
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 
    ];
}
