<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Post</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-slate-100 text-slate-900">
    <div class="mx-auto max-w-3xl px-4 py-10 sm:px-6 lg:px-8">
        <div class="overflow-hidden rounded-xl border border-slate-200 bg-white shadow-sm">
            <div class="border-b border-slate-200 px-6 py-5">
                <h1 class="text-2xl font-bold">Create a New Post</h1>
            </div>

            <form action="{{ route('posts.store') }}" method="POST" class="space-y-5 px-6 py-5">
                @csrf

                @if ($errors->any())
                    <div class="rounded-lg border border-rose-200 bg-rose-50 px-4 py-3 text-sm text-rose-700">
                        <ul class="list-disc space-y-1 pl-5">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div>
                    <label for="title" class="mb-1 block text-sm font-medium text-slate-700">Title</label>
                    <input type="text" id="title" name="title" value="{{ old('title') }}" placeholder="Enter post title"
                        class="w-full rounded-lg border border-slate-300 px-3 py-2 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-200">
                </div>

                <div>
                    <label for="content" class="mb-1 block text-sm font-medium text-slate-700">Content</label>
                    <textarea id="content" name="content" rows="6" placeholder="Write your post content"
                        class="w-full rounded-lg border border-slate-300 px-3 py-2 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-200">{{ old('content') }}</textarea>
                </div>

                <div class="flex items-center gap-3 pt-2">
                    <button type="submit" class="rounded-lg bg-indigo-600 px-4 py-2 text-sm font-semibold text-white shadow hover:bg-indigo-500">
                        Save Post
                    </button>
                    <a href="{{ route('posts.index') }}" class="rounded-lg border border-slate-300 px-4 py-2 text-sm font-medium text-slate-700 hover:bg-slate-50">
                        Back to All Posts
                    </a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>