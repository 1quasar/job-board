<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VacancyController;

Route::get('/', function () {
    return redirect()->route('vacancies.index');
});

Route::get('vacancies', [VacancyController::class, 'index'])->name('vacancies.index');

Route::post('vacancies', [VacancyController::class, 'store'])->name('vacancies.store');

Route::patch('vacancies/{vacancy}/vacancies', [VacancyController::class, 'toggle'])->name('vacancies.toggle');

Route::delete('vacancies/{vacancy}/vacancies', [VacancyController::class, 'destroy'])->name('vacancies.destroy');