<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;
use Livewire\WithPagination;

#[Title('Latest Articles')]
class ArticleIndex extends AdminComponent
{
    use WithPagination;

    #[Url(as: 'q', except: '')]
    public string $search = '';

    #[Url(as: 'sort', except: 'newest')]
    public string $sort = 'newest';

    #[Url(as: 'filter', except: 'all')]
    public string $filter = 'all';

    #[Url(as: 'per', except: 9)]
    public int $perPage = 9;

    public function updatedSearch(): void
    {
        $this->resetPage();
    }

    public function updatedSort(): void
    {
        $this->resetPage();
    }

    public function updatedFilter(): void
    {
        $this->resetPage();
    }

    public function updatedPerPage(): void
    {
        $this->resetPage();
    }

    public function render()
    {
        $baseQuery = Article::query();

        if ($this->search !== '') {
            $baseQuery->where(function ($query) {
                $query->where('title', 'like', '%' . $this->search . '%')
                    ->orWhere('content', 'like', '%' . $this->search . '%');
            });
        }

        if ($this->filter === 'published') {
            $baseQuery->where('published', true);
        }

        if ($this->filter === 'drafts') {
            $baseQuery->where('published', false);
        }

        $totalArticles = (clone $baseQuery)->count();
        $avgWords = (clone $baseQuery)->get(['content'])->avg(function ($article) {
            return str_word_count($article->content);
        });
        $averageReadTime = $avgWords ? (int) max(1, ceil($avgWords / 200)) : 0;

        $trending = (clone $baseQuery)->latest()->take(6)->get();

        $articles = match ($this->sort) {
            'oldest' => (clone $baseQuery)->orderBy('created_at'),
            'title' => (clone $baseQuery)->orderBy('title'),
            default => (clone $baseQuery)->orderByDesc('created_at'),
        };

        return view('livewire.article-index', [
            'articles' => $articles->paginate($this->perPage),
            'trending' => $trending,
            'totalArticles' => $totalArticles,
            'averageReadTime' => $averageReadTime,
        ]);
    }
}
