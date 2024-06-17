<?php

use App\Models\crud;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

Artisan::command('command:io', function () {
    // $name=$this->ask('what is your email?');
    // $this->comment('your email is '.$name);

    // $pass = $this->secret('enter password');
    // $this ->comment('password is :'.$pass);

$head = ['first name','last name'];
$cruds=crud::all(['first_name','last_name'])->toArray();
$this->table($head,$cruds);
});