<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Posts</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-slate-100 text-slate-900">
    <div class="mx-auto max-w-5xl px-4 py-10 sm:px-6 lg:px-8">
        <div class="mb-8 flex items-center justify-between">
            <h1 class="text-3xl font-bold tracking-tight">All Posts</h1>
            <a href="{{ route('posts.create') }}" class="rounded-lg bg-indigo-600 px-4 py-2 text-sm font-semibold text-white shadow hover:bg-indigo-500">
                Create Post
            </a>
        </div>

        @if (session('success'))
            <div class="mb-6 rounded-lg border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm text-emerald-700">
                {{ session('success') }}
            </div>
        @endif

        <div class="overflow-hidden rounded-xl border border-slate-200 bg-white shadow-sm">
            <ul class="divide-y divide-slate-200">
                @forelse ($posts as $post)
                    <li class="flex flex-col gap-4 px-5 py-4 sm:flex-row sm:items-center sm:justify-between">
                        <div class="flex items-start gap-4">
                            @if ($post->image)
                                <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post['title'] }}" class="h-20 w-28 rounded-lg object-cover">
                            @endif

                            <div>
                            <a href="{{ route('posts.show', $post['id']) }}" class="font-semibold text-slate-800 hover:text-indigo-600">
                                {{ $post['title'] }}
                            </a>
                            <p class="mt-1 text-sm text-slate-500">Post #{{ $post['id'] }}</p>
                            <p class="mt-1 text-sm text-slate-500">By: {{ $post->user->name ?? 'Unknown user' }}</p>
                            </div>
                        </div>

                        <div class="flex items-center gap-2">
                            <a href="{{ route('posts.show', $post['id']) }}" class="rounded-lg border border-indigo-300 bg-indigo-50 px-3 py-1.5 text-sm font-medium text-indigo-700 hover:bg-indigo-100">
                                View
                            </a>
                            <a href="{{ route('posts.edit', $post['id']) }}" class="rounded-lg border border-slate-300 px-3 py-1.5 text-sm font-medium text-slate-700 hover:bg-slate-50">
                                Edit
                            </a>
                            <form action="{{ route('posts.destroy', $post['id']) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this post?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="rounded-lg border border-rose-300 bg-rose-50 px-3 py-1.5 text-sm font-medium text-rose-700 hover:bg-rose-100">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </li>
                @empty
                    <li class="px-5 py-8 text-center text-slate-500">No posts found.</li>
                @endforelse
            </ul>
        </div>
    </div>
</body>
</html>