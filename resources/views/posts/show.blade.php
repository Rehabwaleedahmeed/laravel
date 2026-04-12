<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $post['title'] }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-slate-100 text-slate-900">
    <div class="mx-auto max-w-3xl px-4 py-10 sm:px-6 lg:px-8">
        @if (session('success'))
            <div class="mb-6 rounded-lg border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm text-emerald-700">
                {{ session('success') }}
            </div>
        @endif

        <div class="overflow-hidden rounded-xl border border-slate-200 bg-white shadow-sm">
            <div class="border-b border-slate-200 px-6 py-5">
                <p class="text-sm text-slate-500">Post #{{ $post['id'] }}</p>
                <p class="text-sm text-slate-500">By: {{ $post->user->name ?? 'Unknown user' }}</p>
                <h1 class="mt-1 text-2xl font-bold">{{ $post['title'] }}</h1>
            </div>

            <div class="px-6 py-5">
                <p class="whitespace-pre-line leading-7 text-slate-700">{{ $post['content'] }}</p>
            </div>

            <div class="flex flex-wrap items-center gap-3 border-t border-slate-200 px-6 py-4">
                <a href="{{ route('posts.edit', $post['id']) }}" class="rounded-lg border border-slate-300 px-4 py-2 text-sm font-medium text-slate-700 hover:bg-slate-50">
                    Edit Post
                </a>

                <form action="{{ route('posts.destroy', $post['id']) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this post?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="rounded-lg border border-rose-300 bg-rose-50 px-4 py-2 text-sm font-medium text-rose-700 hover:bg-rose-100">
                        Delete Post
                    </button>
                </form>

                <a href="{{ route('posts.index') }}" class="rounded-lg border border-slate-300 px-4 py-2 text-sm font-medium text-slate-700 hover:bg-slate-50">
                    Back to All Posts
                </a>
            </div>
        </div>
    </div>
</body>
</html>