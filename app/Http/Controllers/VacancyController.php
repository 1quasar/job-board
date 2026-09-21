<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vacancy;
use App\Http\Requests\VacancyRequest;

class VacancyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vacancy = Vacancy::latest()->get();
        $openVacancies = $vacancy->where('is_open', true);
        $closedVacancies = $vacancy->where('is_open', false);

        return view('vacancies.index', compact('openVacancies', 'closedVacancies'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(VacancyRequest $request)
    {
        $request->validate([
            'title' => 'required',
            'company' => 'required',
            'type' => 'required',
            'requirements' => 'required',
        ]);

        Vacancy::create($request->all());

        return redirect()->route('vacancies.index')
            ->with('success', 'Vaga criada com sucesso.');
    }

    /**
     * Display the specified resource.
     */
    public function toggle(Vacancy $vacancy)
    {
        $vacancy->is_open = !$vacancy->is_open;
        $vacancy->save();

        return redirect()->route('vacancies.index')
            ->with('success', 'Status da vaga atualizado com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vacancy $vacancy)
    {
        $vacancy->delete();

        return redirect()->route('vacancies.index')
            ->with('success', 'Vaga excluída com sucesso.');
    }
}
