<?php

namespace App\Http\Controllers\Dashboard;

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
     * @return Response
     */
    public function index()
    {
        $faqs = Auth::user()->organization->frequentlyAskedQuestions()->paginate();

        return response()->view('dashboard.frequently-asked-questions.index', compact(['faqs']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $selectOptions = $this->getSelectOptions();
        return response()->view('dashboard.frequently-asked-questions.create', compact('selectOptions'));
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
            'subject' => 'nullable|string'
        ]);

        $faq = new FrequentlyAskedQuestion();
        $faq->id = Str::uuid()->toString();
        $faq->fill($request->only($faq->getFillable()));
        $faq->subject = $request->filled('subject') ? $request->get('subject') : 'general';
        $faq->organization_id = Auth::user()->organization_id;

        $faq->save();

        return response()->redirectToRoute('dashboard.frequently-asked-questions.show', $faq->id);
    }

    /**
     * Display the specified resource.
     *
     * @param string $id
     * @return Response
     */
    public function show(string $id): Response
    {
        $faq = FrequentlyAskedQuestion::findOrFail($id);

        return response()->view('dashboard.frequently-asked-questions.show', compact(['faq']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $faq = FrequentlyAskedQuestion::findOrFail($id);
        $selectOptions = $this->getSelectOptions();

        return response()->view('dashboard.frequently-asked-questions.edit', compact(['faq', 'selectOptions']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param string $id
     * @return RedirectResponse
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $faq = FrequentlyAskedQuestion::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'subject' => 'nullable|string'
        ]);

        $faq->update($request->only($faq->getFillable()));

        return response()->redirectToRoute('dashboard.frequently-asked-questions.show', [$faq->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param string $id
     * @return RedirectResponse
     */
    public function destroy(string $id): RedirectResponse
    {
        $faq = FrequentlyAskedQuestion::findOrFail($id);
        $faq->delete();
        return response()->redirectToRoute('dashboard.frequently-asked-questions.index');
    }

    public function getSelectOptions()
    {
        $subjects = ReservationType::all()->map(function ($question) {
            return [
                'value' => $question->id,
                'title' => $question->title
            ];
        });

        $subjects[] = [
            'value' => 'general',
            'title' => 'Generiek'
        ];

        return $subjects;
    }
}
