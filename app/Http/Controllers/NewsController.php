<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Actions\News\CreateNews;
use App\Actions\News\GetNews;
use App\Actions\News\UpdateNews;
use App\DTO\News\CreateNewsDTO;
use App\DTO\News\UpdateNewsDTO;
use App\Http\Requests\StoreNewsRequest;
use App\Models\News;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $news = app(GetNews::class)->execute();
        return view('news.index', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('news.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreNewsRequest $request): RedirectResponse
    {
        app(CreateNews::class)->execute(
            new CreateNewsDTO(
                htmlspecialchars($request->input('title')),
                htmlspecialchars($request->input('short_description')),
                htmlspecialchars($request->input('content'))
            )
        );
        return redirect()->route('news.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(News $news): View
    {
        return view('news.show', compact('news'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(News $news): View
    {
        return view('news.edit', compact('news'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreNewsRequest $request, News $news): RedirectResponse
    {
        app(UpdateNews::class)->execute(
            new UpdateNewsDTO(
                htmlspecialchars($request->input('title')),
                htmlspecialchars($request->input('short_description')),
                htmlspecialchars($request->input('content'))
            ),
            $news
        );
        return redirect()->route('news.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(News $news): RedirectResponse
    {
        $news->delete();
        return redirect()->route('news.index');
    }
}
