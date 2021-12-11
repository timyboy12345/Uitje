<?php

namespace App\Http\Controllers\Dashboard\Content;

use App\Http\Controllers\Controller;
use App\Models\FrequentlyAskedQuestion;
use App\Models\ReservationType;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class FrequentlyAskedQuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request): Response
    {
        $query = FrequentlyAskedQuestion::query();
        $query->where('title', 'like', "%{$request->get('search')}%");
        $faqs = $query->paginate();

        return response()->view('dashboard.content.frequently-asked-questions.index', [
            'faqs' => $faqs,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(): Response
    {
        $selectOptions = $this->getSelectOptions();

        return response()->view('dashboard.content.frequently-asked-questions.create', [
            'selectOptions' => $selectOptions,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'subject' => 'nullable|string',
        ]);

        $faq = new FrequentlyAskedQuestion();
        $faq->id = Str::uuid()->toString();
        $faq->fill($request->only($faq->getFillable()));
        $faq->subject = $request->filled('subject') ? $request->get('subject') : 'general';
        $faq->organization_id = Auth::user()->organization_id;

        $faq->save();

        return response()->redirectToRoute('dashboard.content.frequently-asked-questions.show', $faq->id);
    }

    /**
     * Display the specified resource.
     *
     * @param FrequentlyAskedQuestion $frequentlyAskedQuestion
     * @return Response
     */
    public function show(FrequentlyAskedQuestion $frequentlyAskedQuestion): Response
    {
        return response()->view('dashboard.content.frequently-asked-questions.show', [
            'faq' => $frequentlyAskedQuestion,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param FrequentlyAskedQuestion $frequentlyAskedQuestion
     * @return Response
     */
    public function edit(FrequentlyAskedQuestion $frequentlyAskedQuestion): Response
    {
        $selectOptions = $this->getSelectOptions();

        return response()->view('dashboard.content.frequently-asked-questions.edit', [
            'faq' => $frequentlyAskedQuestion,
            'selectOptions' => $selectOptions,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param FrequentlyAskedQuestion $frequentlyAskedQuestion
     * @return RedirectResponse
     */
    public function update(Request $request, FrequentlyAskedQuestion $frequentlyAskedQuestion): RedirectResponse
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'subject' => 'nullable|string',
        ]);

        $frequentlyAskedQuestion->update($request->only($frequentlyAskedQuestion->getFillable()));

        return response()
            ->redirectToRoute('dashboard.content.frequently-asked-questions.show', [
                $frequentlyAskedQuestion->id,
            ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param FrequentlyAskedQuestion $frequentlyAskedQuestion
     * @return RedirectResponse
     */
    public function destroy(FrequentlyAskedQuestion $frequentlyAskedQuestion): RedirectResponse
    {
        $frequentlyAskedQuestion->delete();
        return response()->redirectToRoute('dashboard.content.frequently-asked-questions.index');
    }

    /**
     * @return ReservationType[]
     */
    public function getSelectOptions(): array
    {
        $subjects = ReservationType::all()->map(function ($question) {
            return [
                'value' => $question->id,
                'title' => $question->title,
            ];
        })->toArray();

        $subjects[] = [
            'value' => 'general',
            'title' => 'Generiek',
        ];

        return $subjects;
    }
}
